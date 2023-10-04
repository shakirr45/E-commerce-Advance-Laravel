<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

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
            $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="{{ $row->id }}"><i class="fas fa-edit"></i></a>
            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);

        }
        return view('admin.category.childcategory.index');

    }
}
	