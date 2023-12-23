<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

// For send mail ===>
use App\Mail\RecievedMail;
use Mail;

class OrderController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // For view Order index ====>          // Product controller e bujay dwa ace ====>
    public function index(Request $request){
        if($request->ajax()){
            $imgurl = 'public/files/product';
    
    
    
            $product = "";

            $query = DB::table('orders')->orderBy('id', 'DESC');



            if($request->payment_type){
                $query->where('payment_type', $request->payment_type);
            }    
    


            
            if($request->date){
                // table e j formet e ace sei frmt e rqst theke atac na jonne nicher code ==>
                $order_date = date('d-m-Y', strtotime($request->date));
                $query->where('date', $order_date);
            }
    


            if($request->status == 0){
                $query->where('status', 0);
            }

            if($request->status == 1){
                $query->where('status', 1);
            }

            if($request->status == 2){
                $query->where('status', 2);
            }

            if($request->status == 3){
                $query->where('status', 3);
            }

            if($request->status == 4){
                $query->where('status', 4);
            }

            if($request->status == 5){
                $query->where('status', 5);
            }
            
    
    
            $product= $query->get();
    
            
            return DataTables::of($product)
    
            
            ->addIndexColumn()
          
            ->editColumn('status',function($row){
                if($row->status == 0){
                    return '<span class="badge badge-danger">Pending</span>';
    
                }elseif($row->status == 1){
                    return '<span class="badge badge-primary">Recieved</span>';
    
                }elseif($row->status == 2){
                    return '<span class="badge badge-info">Shipped</span>';
    
                }elseif($row->status == 3){
                    return '<span class="badge badge-success">Completed</span>';
    
                }elseif($row->status == 4){
                    return '<span class="badge badge-warning">Return</span>';
    
                }elseif($row->status == 5){
                    return '<span class="badge badge-danger">Cancel</span>';
    
                }
            })

            ->addColumn('action', function($row){
                $actionbtn= '
                <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
    
                <a href=""  class="btn btn-info btn-sm edit_order" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'" data-c_name="'.$row->c_name.'"  data-c_email="'.$row->c_email.'" data-c_address="'.$row->c_address.'" data-c_phone="'.$row->c_phone.'" data-status="'.$row->status.'" ><i class="fas fa-edit"></i></a>
                
                <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $actionbtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    
        }



        return view('admin.order.index');
    }

    // // For order edit ====>
    // public function EditOrder($id){
    //     $order = DB::table('orders')->where('id', $id)->first();
    //     return view('admin.order.edit', compact('order'));
    // }

    // // For update order status ======>
    // public function OpdateOrderStatus(Request $request){
    //     $data = array();
    //     $data['c_name'] = $request->c_name;
    //     $data['c_address'] = $request->c_address;
    //     $data['c_phone'] = $request->c_phone;
    //     $data['status'] = $request->status;

    //     DB::table('orders')->where('id', $request->id)->update($data);
    //     return response()->json('Successfully Change Status!');
    //     // return redirect()->back()->with('success' , 'Successfully Change Status');


    // }

   // For update order =====>
   public function updateOrder(Request $request) {

        $data = array();
        $data['c_name'] = $request->up_name;
        $data['c_address'] = $request->up_address;
        $data['c_phone'] = $request->up_phone;
        $data['status'] = $request->up_status;

        DB::table('orders')->where('id', $request->up_id)->update($data);

        if($request->up_status == 1){
        // For mail send ===>go to app/Mail/RecievedMail and also have invoice.blade.php // also use Mail And use App\Mail\RecievedMail;
        Mail::to($request->up_email)->send(new RecievedMail($data));

        }

    return response()->json([
     'status' => 'success',
    ]);

}









}
