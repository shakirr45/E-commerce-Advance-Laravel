<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index(Request $request){

        
        if ($request->ajax()) {
            $data = DB::table('coupons')->get();
    
        // yajra data tables pass ====> 
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'"><i class="fas fa-edit"></i></a>
            <a href="'.route('coupon.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete_coupon" onclick="confirmation(event)"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    
        }
        return view('admin.offer.coupon.index');
    
    }

    // For delete coupon ====>
    public function destroy($id){

        DB::table('coupons')->where('id',$id)->delete();
        Alert::success('Product Added Successfully','We have added product to the Cart');
        return response()->json('Coupon deleted!');
    }




}
