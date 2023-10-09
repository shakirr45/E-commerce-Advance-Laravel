<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

class WarehouseController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // For view page =====>
    public function index(Request $request){

        
        if ($request->ajax()) {
            $data = DB::table('warehouses')->get();
    
        // yajra data tables pass ====> 
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'"><i class="fas fa-edit"></i></a>
            <a href="'.route('warehouse.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    
        }
    
        return view('admin.category.warehouse.index');
    }

    // For store warehouse =====>
    public function store(Request $request){

        $validated = $request->validate([
            'warehouse_name' => 'required|unique:warehouses',

        ]);

        $data = array();
        $data['warehouse_name'] = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone'] = $request->warehouse_phone;
        DB::table('warehouses')->insert($data);

        return redirect()->back()->with('success' , 'Success to Add Warehouse');

    }

    // For delete warehose ===>
    public function destroy($id){
        DB::table('warehouses')->where('id' , $id)->delete();
        return redirect()->back()->with('success' , 'Success to Delete Warehouse');
    }

    // For warehouse Edit ====>
    public function edit($id){
        $data = DB::table('warehouses')->where('id' , $id)->first();
        return view('admin.category.warehouse.edit',compact('data'));

    }

    // For update warehouse ====>
    public function update(Request $request){
        $data = array();
        $data['warehouse_name'] = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone'] = $request->warehouse_phone;
        DB::table('warehouses')->where('id' , $request->id)->update($data);

        return redirect()->back()->with('success' , 'Success to Update Warehouse');

    }


}


