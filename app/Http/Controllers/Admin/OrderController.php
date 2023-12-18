<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

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
    
                <a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
    
                <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $actionbtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    
        }

        return view('admin.order.index');
    }


}
