<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Subcategories;

use App\Models\Categories;

// for str slug ====>
use Illuminate\Support\Str;



class SubcategoryController extends Controller
{
    //

        // For guest not to access as admin =====> 

        public function __construct()
        {
        $this->middleware('auth');
        }

        //index method for read data ====>
        public function index(){

            // query Builder one to one join--->
            // $data = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id' , 'categories.id')->select('subcategories.*' , 'categories.category_name')->get();

            // Eloquent ORM join---go to subcategories model--->
            $data=Subcategories::all();
            $category = Categories::all();

            // Eloquent ORM ------>
            // $category = Categories::all();

            // query Builder --->
            $category = DB::table('categories')->get();

            return view('admin.category.subcategory.index',compact('data','category'));
        }

        // For Store Sub Category ====>
        public function store(Request $request){
            $validated = $request->validate([
                'subcategory_name' => 'required|max:55',
            ]);


            // query Builder --->
            // $data = array();
            // $data['category_id'] =$request->category_id;
            // $data['subcategory_name'] =$request->subcategory_name;
            // $data['subcat_slug'] =Str::of($request->subcategory_name)->slug('-');
            // // dd($data);
            // DB::table('subcategories')->insert($data);

                        
            // Eloquent ORM ------>
            Subcategories::insert([
                'category_id' =>$request->category_id,
                'subcategory_name' =>$request->subcategory_name,
                'subcat_slug' =>Str::of($request->subcategory_name)->slug('-')
            ]);

            return redirect()->back()->with('success' , 'Success to Add Sub Category');
        }

        // For sub Category Delete
        public function destroy($id){

            // query Builder --->
            // DB::table('subcategories')->where('id', $id)->delete();

            // Eloquent ORM ------>
            $data = Subcategories::find($id);
            $data->delete();

            return redirect()->back()->with('success' , 'Success to Delete Sub Category');

        }

        //Edit sub category ====>

        public function edit($id){

            // Eloquent ORM ------>
            // $data = Subcategories::find($id);
            // $category = Categories::all();

            // query Builder --->
            $data = Subcategories::find($id);
            $category = DB::table("categories")->get();

            return view('admin.category.subcategory.edit', compact('data','category'));

        }

        // Sub Category Update ====>
        public function update(Request $request){

            // query builder---->
            // $data = array();
            // $data['category_id']=$request->category_id;
            // $data['subcategory_name']=$request->subcategory_name;
            // $data['subcat_slug']=Str::of($request->subcategory_name)->slug('-');
            // DB::table('subcategories')->where('id' , $request->id)->update($data);

                        // Eloquent ORM ------>
                        $subcategory = Subcategories::where('id', $request->id)->first();
                        $subcategory->update([
                            'category_id' =>$request->category_id,
                            'subcategory_name' =>$request->subcategory_name,
                            'subcat_slug' =>Str::of($request->subcategory_name)->slug('-')
                        ]);

            return redirect()->back()->with('success' , 'Success to Update');

        }




}
