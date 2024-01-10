<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
// for str slug ====>
use Illuminate\Support\Str;
 
// For image ===>
use Image;

// For delete image ===>
use File;

class BlogController extends Controller
{
    //

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index(){

            $data = DB::table('blog_category_tables')->get();
            return view('admin.blog.category',compact('data'));
    }

     //Store Blog Category ====>
     public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|max:55',

        ]);

        // query builder---->
        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=Str::of($request->category_name)->slug('-');

        DB::table('blog_category_tables')->insert($data);

        return redirect()->back()->with('success' , 'Success to Add Blog category');

    }

            // For delete Blog Category ====>
            public function destroy($id){
                //query builder---->
                DB::table('blog_category_tables')->where('id',$id)->delete();

                return redirect()->back()->with('success' , 'Success to Delete Blog category');
            }


        // For edit Blog category ====>
        public function edit($id){

            $data = DB::table('blog_category_tables')->where('id',$id)->first();
            return response()->json($data);

        }


                // For Update Blog Category ====>
                public function update(Request $request){
                    $id=$request->id;
                    $data = array();
                    $data['category_name']=$request->category_name;
                    $data['category_slug']=Str::of($request->category_name)->slug('-');
        

        
                DB::table('blog_category_tables')->where('id',$request->id)->update($data);
                return redirect()->back()->with('success' , 'Success to Update Blog Category');
         
        
        
        
        
                }
}
