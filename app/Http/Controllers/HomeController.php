<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// For logout ============>
use Auth;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->take(10)->get();

        // Total order ======>
        $total_order = DB::table('orders')->where('user_id', Auth::id())->count();
        // Complete Order ====>
        $complete_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 3)->count();
        // cancel Order ====>
        $cancel_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 5)->count();
        // return Order ====>
        $return_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 4)->count();        

        // dd($orders);

        return view('homes',compact('orders','total_order','complete_order','cancel_order','return_order'));
    }

    public function logout(){
        Auth::logout();
        //for sweetalert---->
        // Alert::warning('Product Added Successfully','We have added product to the Cart');

        //with message tstor--->
        return redirect()->back();
    }


}
