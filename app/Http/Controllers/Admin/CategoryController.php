<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Categories;

// for str slug ====>
use Illuminate\Support\Str;
 


class CategoryController extends Controller
{

        public function __construct()
        {
        $this->middleware('auth');
        }

        // All category showing method =====>
        public function index(){

            // query Builder --->
            // $data = DB::table('categories')->get();

            // Eloquent ORM ------>
            $data = Categories::all();

            // return response()->json($data);
            return view('admin.category.category.index',compact('data'));
        }

        //Store Category ====>
        public function store(Request $request){
            $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:55',
            ]);

            //query builder---->
            // $data = array();
            // $data['category_name']=$request->category_name;
            // $data['category_slug']=Str::of($request->category_name)->slug('-');
            // // dd($data);
            // DB::table('categories')->insert($data);


            // Eloquent ORM ------>
            Categories::insert([
                'category_name' =>$request->category_name,
                'category_slug' =>Str::of($request->category_name)->slug('-')
            ]);

            return redirect()->back()->with('success' , 'Success to Add');

        }

        // For delete Category ====>
        public function destroy($id){
            //query builder---->
            // DB::table('categories')->where('id',$id)->delete();

            // Eloquent ORM ------>
           $category= Categories::find($id);
           $category->delete();
            return redirect()->back()->with('success' , 'Success to Delete');
        }

        // For edit category ====>
        public function edit($id){

            // $data = DB::table('categories')->where('id',$id)->first();
            // return response()->json($data);


            // Eloquent ORM ------>
            $data = Categories::find($id);
            return response()->json($data);

        }

        // For Update Category ====>
        public function update(Request $request){

            //query builder---->
            // $id=$request->id;
            // $data = array();
            // $data['category_name']=$request->category_name;
            // $data['category_slug']=Str::of($request->category_name)->slug('-');
            // DB::table('categories')->where('id' , $id)->update($data);


            // Eloquent ORM ------>
            $id=$request->id;
            $category = Categories::where('id', $id)->first();
            $category->update([
                'category_name' =>$request->category_name,
                'category_slug' =>Str::of($request->category_name)->slug('-')
            ]);

            return redirect()->back()->with('success' , 'Success to Update');



            

        }




}
