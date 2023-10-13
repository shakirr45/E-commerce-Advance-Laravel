<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

use App\Models\Coupon;

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

            $actionbtn= '<a href="#" class="btn btn-info btn-sm update_product" data-toggle="modal" data-target="#editModal"   data-id="'.$row->id.'"  data-code="'.$row->coupon_code.'"  data-type="'.$row->type.'"   data-amount="'.$row->coupon_amount.'" data-date="'.$row->valid_date.'" data-status="'.$row->status.'" ><i class="fas fa-edit"></i></a>

            <a href="" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete_coupon" ><i class="fas fa-trash"></i></a>';
                    
            return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    
        }
        return view('admin.offer.coupon.index');
    
    }

    
    // For store coupon ====>
       public function store(Request $request){
        // $data = array(
        //     'coupon_code' => $request->coupon_code,
        //     'type' => $request->type,
        //     'coupon_amount' => $request->coupon_amount,
        //     'valid_date' => $request->valid_date,
        //     'status' => $request->status,

       $product = new Coupon();
       $product->coupon_code=$request->coupon_code;
       $product->type=$request->type;
       $product->coupon_amount=$request->coupon_amount;
       $product->valid_date=$request->valid_date;
       $product->status=$request->status;

       $product->save();
       return response()->json([
        'status' => 'success',
       ]);
    }

    // For delete coupon ====>
    public function destroy( Request $request ){
        $id=$request->coupon_id;
        $data=Coupon::find($id);
        $data->delete();
        return response()->json([
         'status' => 'success',
        ]);
 
     }
     
     // For update coupon =====>
     public function update(Request $request) {
        $id=$request->up_id;
        $product = Coupon::find($id);
        $product->coupon_code=$request->up_code;
        $product->type=$request->up_type;
        $product->coupon_amount=$request->up_amount;
        $product->valid_date=$request->up_date;
        $product->status=$request->up_status;
        $product->save();

        return response()->json([
         'status' => 'success',
        ]);

    }


}
