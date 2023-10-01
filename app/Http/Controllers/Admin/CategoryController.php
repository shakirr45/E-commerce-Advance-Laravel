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
            $data = array();
            $data['category_name']=$request->category_name;
            $data['category_slug']=Str::of($request->category_name)->slug('-');
            // dd($data);
            DB::table('categories')->insert($data);
            return redirect()->back()->with('success' , 'Success to Add');

        }




}
