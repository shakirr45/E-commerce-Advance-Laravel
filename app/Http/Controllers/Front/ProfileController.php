<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\User;

// for pass check hash for make===>
use Hash;

use Image;


class ProfileController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }


    // For user profile setting view page=====>
    public function setting(){
        return view('user.setting');
    }

    // For Password Change ====>
    public function PasswordChange(Request $request){
        $validated = $request->validate([
            'old_password' => 'required',
            // come from http/auth/register controller ====>
            'password' => 'required|min:6|confirmed',
        ]);

        $current_password = Auth::user()->password; // Login user password check ===>
         
        // for check old pass is correct or not ====>
        $oldpass = $request->old_password;  // old pass get from input field ===>
        $new_password = $request->password;  // new pass get fornew pass ===>

        // for pass check hash for make===>
        if(Hash::check($oldpass, $current_password)){  // Checking old pass and current pass as hash formet ====>

            $user = User::find(Auth::id()); // current user data get ===>
            $user->password = Hash::make($request->password); // current user data hashing ====>
            $user->save();
            Auth::logout(); // logout into admin login ===>
            return redirect()->to('/')->with('success' , ' Password Updated Successfully');


        }else{
        return redirect()->back()->with('error' , 'Old Password Not Matched');

        }
    }


    // For my Order ====>
    public function MyOrder(){
        $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('user.my_order',compact('orders'));
    }

    // For ticket page ====>
    public function ticket(){
        $ticket = DB::table('tickets')->where('user_id', Auth::id())->orderBy('id', 'DESC')->take(10)->get();
        return view('user.ticket',compact('ticket'));
    }

    // For new Ticket =====>
    public function NewTicket(){
        return view('user.new_ticket');
    }

    // For store Ticket =====>
    public function StoreTicket(Request $request){
        $validated = $request->validate([
            'subject' => 'required',
        ]);


        $data = array();
        $data['subject'] = $request->subject;
        $data['service'] = $request->service;
        $data['priority'] = $request->priority;
        $data['message'] = $request->message;
        $data['user_id'] = Auth::id();
        $data['status'] = 0;
        $data['date'] = date('Y-m-d');

        if($request->image){
        // For store image---->
        $photo =$request->image;
        $photoname = uniqid().'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/ticket/',$photoname); //without image intervention
        Image::make($photo)->resize(600,350)->save('public/files/ticket/'.$photoname); // image intervention===>>

        $data['image'] = 'public/files/ticket/'.$photoname;
        }

        DB::table('tickets')->insert($data);

        return redirect()->route('open.ticket')->with('success' , 'Ticket Inserted');
    }

    // For show ticket =======>
    public function ticketShow($id){
        $ticket = DB::table('tickets')->where('id', $id)->first();
        return view('user.show_ticket',compact('ticket'));   
    }

    // For reply Ticket =====>
    public function ReplyTicket(Request $request){
        $validated = $request->validate([
            'message' => 'required',
        ]);
    
    
        $data = array();
        $data['message'] = $request->message;
        $data['ticket_id'] = $request->ticket_id;
        // 0 dici karon admin re 0 rkhci
        $data['user_id'] = Auth::id();
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

        // Status er value 1 korar jonne 
        DB::table('tickets')->where('id', $request->ticket_id)->update(['status'=>0]);
    
        return redirect()->back()->with('success' , 'Replied Done!');
    }

    // customer order view ====>
    public function ViewOrder($id){

        $order = DB::table('orders')->where('id', $id)->first();
        $order_details = DB::table('order_details')->where('order_id', $id)->get();
        
        return view('user.order_details',compact('order_details','order'));   

    }
}
