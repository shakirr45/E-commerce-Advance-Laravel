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

    
        // For Blog =============>
        public function blogindex(){

            $blog_category = DB::table('blog_category_tables')->get();

            $data = DB::table('blogs_tables')->get();
            return view('admin.blog.blog',compact('data','blog_category'));
    }


         //Store Blog  ====>
         public function blogstore(Request $request){
    
            // query builder---->
            $data = array();

            
            $data['blog_category_id']=$request->blog_category_id;
            $data['title']=$request->title;
            $data['slug']=Str::of($request->title)->slug('-');
            $data['publish_date']=$request->publish_date;
            $data['description']=$request->description;
            $data['tag']=$request->tag;
            $data['status']=$request->status;

        // For img ===>
        $slug = Str::of($request->title)->slug('-');

        // For store image---->
        $photo =$request->blog_logo;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/blog/',$photoname); //without image intervention
        Image::make($photo)->resize(240,120)->save('public/files/blog/'.$photoname); // image intervention===>>


        $data['thumbnail'] = 'public/files/blog/'.$photoname;

    
            DB::table('blogs_tables')->insert($data);
    
            return redirect()->back()->with('success' , 'Success to Add Blog ');
    
        }


        // For edit Blog ====>
        public function Blogedit($id){

            $data = DB::table('blogs_tables')->where('id',$id)->first();
            return response()->json($data);
        
            }

    //     // For blog delete ====>
    //      public function blogdestroy($id){
    //     $data = DB::table('blogs_tables')->where('id',$id)->first();
    //     $image= $data->thumbnail;
    //     // dd($image);
    //     if(File::exists($image)){
    //         unlink($image);
    //     }
    //     DB::table('blogs_tables')->where('id',$id)->delete();
    //     return redirect()->back()->with('success' , 'Success to delete Blog');

    // }


    
        // For blog delete ====>
        public function blogdestroy($id){
            $data = DB::table('blogs_tables')->where('id',$id)->first();
            

            if($image= $data->thumbnail == NULL){
                DB::table('blogs_tables')->where('id',$id)->delete();

            }else{
            if(File::exists($image)){
            unlink($image);
            }
                DB::table('blogs_tables')->where('id',$id)->delete();

            }


            return redirect()->back()->with('success' , 'Success to delete Blog');
    
        }


}




