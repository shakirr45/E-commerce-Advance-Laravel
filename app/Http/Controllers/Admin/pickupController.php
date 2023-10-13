<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

use App\Models\PickupPoint;

class pickupController extends Controller
{
    //

    public function __construct()
    {
    $this->middleware('auth');
    }


    public function index(Request $request){

        
        if ($request->ajax()) {
         $data = DB::table('pickup_points')->get();
        // yajra data tables pass ====> 
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){

            $actionbtn= '<a href="#" class="btn btn-info btn-sm view_pickup" data-toggle="modal" data-target="#editModal"   data-id="'.$row->id.'"  data-name="'.$row->pickup_point_name.'"  data-address="'.$row->pickup_point_address.'"   data-phone="'.$row->pickup_point_phone.'" data-phone_two="'.$row->pickup_point_phone_two.'"><i class="fas fa-edit"></i></a>

            <a href="" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete_pickup" ><i class="fas fa-trash"></i></a>';
                    
            return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    
        }
        return view('admin.pickup_point.index');
    
    }

        // For store Pickup ====>
        public function store(Request $request){

           $product = new PickupPoint();
           $product->pickup_point_name=$request->pickup_point_name;
           $product->pickup_point_address=$request->pickup_point_address;
           $product->pickup_point_phone=$request->pickup_point_phone;
           $product->pickup_point_phone_two=$request->pickup_point_phone_two;
    
           $product->save();
           return response()->json([
            'status' => 'success',
           ]);
        }

     
     // For update Pickup =====>
     public function update(Request $request) {
        $id=$request->up_id;
        $product = PickupPoint::find($id);
        $product->pickup_point_name=$request->up_name;
        $product->pickup_point_address=$request->up_address;
        $product->pickup_point_phone=$request->up_phone;
        $product->pickup_point_phone_two=$request->up_phone_two;
        $product->save();

        return response()->json([
         'status' => 'success',
        ]);

    }


             // For delete Pickup ====>
             public function delete( Request $request ){
                $id=$request->pickup_id;
                $data=PickupPoint::find($id);
                $data->delete();
                return response()->json([
                    'status' => 'success',
                ]);
         
             }
}
