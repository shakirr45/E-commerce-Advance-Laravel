<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

use Illuminate\Support\Str;


class Childcategorycontroller extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // For Show Child category index ====>with yajra data tables---user request===>
    public function index(Request $request){

        if($request->ajax()) {
            $data = DB::table('childcategories')->leftJoin('categories' , 'childcategories.category_id', 'categories.id')->leftJoin('subcategories'  , 'childcategories.subcategory_id' , 'subcategories.id')->select('categories.category_name' , 'subcategories.subcategory_name', 'childcategories.*' )->get();

        // yajra data tables pass ====> 
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'"><i class="fas fa-edit"></i></a>
            <a href="'.route('childcategory.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);

        }
        $category=DB::table('categories')->get();

        return view('admin.category.childcategory.index',compact('category'));

    }

    // For child category store ====>
    public function store(Request $request){
        // dd($request->all());

        //er madhhome categoryr id pailam karon sub category tables e category id ta ace==+>
        $cat = DB::table('subcategories')->where('id', $request->subcategory_id)->first();


        $data=array();
        $data['category_id'] = $cat->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;
        $data['childcategory_slug'] = Str::of($request->childcategory_name)->slug('-');
        // dd($data);

        DB::table('childcategories')->insert($data);
        return redirect()->back()->with('success' , 'Success to Add Child Category');

    }

    // Delete Child category ====>
    public function destroy($id){
        DB::table('childcategories')->where('id', $id)->delete();
        return redirect()->back()->with('success' , 'Success to Delete Child Category');

    }

    // For edit child category ====>
    public function edit($id){
    
        $category=DB::table('categories')->get();
        $data=DB::table('childcategories')->where('id',$id)->first();
        return view('admin.category.childcategory.edit',compact('category','data'));
    }

    // for child category update ====>
    public function update(Request $request){
        // dd($request->all());

        //er madhhome categoryr id pailam karon sub category tables e category id ta ace==+>
        $cat = DB::table('subcategories')->where('id', $request->subcategory_id)->first();


        $data=array();
        $data['category_id'] = $cat->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;
        $data['childcategory_slug'] = Str::of($request->childcategory_name)->slug('-');
        // dd($data);
        DB::table('childcategories')->where('id',$request->id)->update($data);

        return redirect()->back()->with('success' , 'Success to Update Child Category');

    }

}
	