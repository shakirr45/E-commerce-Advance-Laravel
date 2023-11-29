<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

use Image;

class TicketController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    ////////////// eta bojar code productcontroller e kora ace////////////


    // all tickets/ For index page for ticket =====>
    // For show ticket =====> { Model link use kora ace } {{ ekhane search er code ace with yajra so jeta jeta @@@@@ use hobe oituk oitar code r cmt kora gula search cara (&& use jeta age cilo)}} mane ak kothay ager ta cilo orm r eta query builder
    public function index(Request $request){
    if($request->ajax()){

        // @@@@-----------------
        $ticket = "";
        // @@@@----------------------------- etar maddhome krle niche editcolumn er code lgtac na-------
        $query = DB::table('tickets')->leftJoin('users', 'tickets.user_id', 'users.id');


        if($request->date){
            $query->where('tickets.date', $request->date);
        }


        if($request->type == 'Technical'){
            $query->where('tickets.service', $request->type);
        }
        if($request->type == 'Payment'){
            $query->where('tickets.service', $request->type);
        }
        if($request->type == 'Affiliate'){
            $query->where('tickets.service', $request->type);
        }
        if($request->type == 'Return'){
            $query->where('tickets.service', $request->type);
        }
        if($request->type == 'Refund'){
            $query->where('tickets.service', $request->type);
        }



        if($request->status == 1){
            $query->where('tickets.status', 1);
        }if($request->status == 0){
            $query->where('tickets.status', 0);
        }if($request->status == 2){
            $query->where('tickets.status', 2);
        }

        $ticket= $query->select('tickets.*', 'users.name')->get();

        //@@@@--------------------------------------------
        
        return DataTables::of($ticket)
        //@@@@----------------------------------------------

        
        // return DataTables::of($data) //&&---------------------------------------
        ->addIndexColumn()

        ->editColumn('status',function($row){
            if($row->status == 1){
                // return "Yes";
                return '<span class="badge badge-warning"> Running</span>';

            }elseif($row->status == 2){
                return '<span class="badge badge-muted"> Close</span>';
            }else{
                return '<span class="badge badge-danger" >Panding</span>';
            }
        })

        // Sundor kore dkhanor jonne  editColumn vabe kora kintu ecara baki gula jvabe show hoice oi vabew kora jabe index page
        ->editColumn('date',function($row){
            return date('d F Y', strtotime($row->date));
        })

        ->addColumn('action', function($row){
            $actionbtn= '
            <a href="'.route('admin.ticket.show',[$row->id]).'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

            <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action','status','date'])
        ->make(true);

    }

    return view('admin.ticket.index');
  }

  // For show ticket ======>
  public function show($id){
    $ticket = DB::table('tickets')->leftJoin('users', 'tickets.user_id', 'users.id')->select('tickets.*', 'users.name')->where('tickets.id', $id)->first();

    return view('admin.ticket.view_ticket',compact('ticket'));
  }

  // For store Reply as admin =====>
  public function ReplyTicket(Request $request){
    $validated = $request->validate([
        'message' => 'required',
    ]);


    $data = array();
    $data['message'] = $request->message;
    $data['ticket_id'] = $request->ticket_id;
    // 0 dici karon admin re 0 rkhci
    $data['user_id'] = 0;
    $data['reply_date'] = date('Y-m-d');

    if($request->image){
    // For store image---->
    $photo =$request->image;
    $photoname = uniqid().'.'.$photo->getClientOriginalExtension();
    // $photo->move('public/files/ticket/',$photoname); //without image intervention
    Image::make($photo)->resize(600,350)->save('public/files/ticket/'.$photoname); // image intervention===>>

    $data['image'] = 'public/files/ticket/'.$photoname;
    }

    DB::table('replies')->insert($data);

    return redirect()->back()->with('success' , 'Replied Done!');
  }

}
