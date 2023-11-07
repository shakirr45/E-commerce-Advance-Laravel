<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Categories;

// for str slug ====>
use Illuminate\Support\Str;
 
// For image ===>
use Image;

// For delete image ===>
use File;


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
                'icon' => 'required',

            ]);

            // Eloquent ORM ------>
            // Categories::insert([
            //     'category_name' =>$request->category_name,
            //     'category_slug' =>Str::of($request->category_name)->slug('-')
            // ]);


            // query builder---->
            $data = array();
            $data['category_name']=$request->category_name;
            $data['category_slug']=Str::of($request->category_name)->slug('-');
            $data['home_page']=$request->home_page;
            // dd($data);

            // For img ===>
            $slug = Str::of($request->category_name)->slug('-');

            // For store icon---->
            $icon =$request->icon;
            $iconname = $slug.'.'.$icon->getClientOriginalExtension();
            // $icon->move('public/files/category_icon/',$iconname); //without image intervention
            Image::make($icon)->resize(320,320)->save('public/files/category_icon/'.$iconname); // image intervention===>>

            $data['icon'] = 'public/files/category_icon/'.$iconname;

            DB::table('categories')->insert($data);

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

            // // Eloquent ORM ------>
            // $id=$request->id;
            // $category = Categories::where('id', $id)->first();

            // // $category->update([
            // //     'category_name' =>$request->category_name,
            // //     'category_slug' =>Str::of($request->category_name)->slug('-'),
            // //     'home_page' =>$request->home_page,
            // // ]);


            // query builder---->
            $id=$request->id;
            $data = array();
            $data['category_name']=$request->category_name;
            $data['category_slug']=Str::of($request->category_name)->slug('-');
            $data['home_page']=$request->home_page;

            // DB::table('categories')->where('id' , $id)->update($data);

            // return redirect()->back()->with('success' , 'Success to Update');

        // For img ===>
        $slug = Str::of($request->category_name)->slug('-');

        // for check is there new photo or not ====>
        if($request->icon){
            if (File::exists($request->old_icon)){
                unlink($request->old_icon);
            }

        $photo =$request->icon;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/category_icon/',$photoname); //without image intervention
        Image::make($photo)->resize(320,320)->save('public/files/category_icon/'.$photoname); // image intervention===>>
        $data['icon'] = 'public/files/category_icon/'.$photoname;
        DB::table('categories')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update campaign');


        }else{
        $data['icon'] = $request->old_icon; 
        DB::table('categories')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update campaign');
        }            
 




        }




}
