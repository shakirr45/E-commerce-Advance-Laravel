<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

// for str slug ====>
use Illuminate\Support\Str;

class PageController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // all page show page index ====>
    public function index(){
        $page = DB::table('pages')->latest()->get();
        return view('admin.setting.page.index',compact('page'));
    }

    // Create page ====>
    public function create(){
        return view('admin.setting.page.create');
    }
    
    // Page Store ====>				
    public function store(Request $request){
        $data=array();
        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        $data['page_slug'] =Str::of($request->page_name)->slug('-');
        DB::table('pages')->insert($data);
        return redirect()->back()->with('success' , 'Success to Page Create');
    }

    // For Page Delete ====>
    public function delete($id){

        DB::table('pages')->where('id',$id)->delete();
        return redirect()->back()->with('success' , 'Success to Delete Page');
    }

    // For Page Edit ====>
    public function edit($id){
    $page =  DB::table('pages')->where('id',$id)->first();
    return view('admin.setting.page.edit',compact('page'));
    }

    // FOR update Page =====>
    public function update(Request $request,$id){

        $data=array();
        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        $data['page_slug'] =Str::of($request->page_name)->slug('-');
        DB::table('pages')->where('id',$id)->update($data);
        return redirect()->back()->with('success' , 'Success to Page Update');

    }




}
