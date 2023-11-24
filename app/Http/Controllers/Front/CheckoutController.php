<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Cart;

use DB;

use Session;

// For send mail ===>
use App\Mail\InvoiceMail;
use Mail;


class CheckoutController extends Controller
{
    //
    // For Checkout Page =====>
    public function Checkout(){
        if(!Auth::check()){
            return redirect()->back()->with('error' , 'At first login your account!');
        }

        $content = Cart::content();
        return view('frontend.cart.checkout',compact('content'));
    }

    // for Apply/store coupon =======>
    public function ApplyCoupon(Request $request){
        $check = DB::table('coupons')->where('coupon_code', $request->coupon)->first();

        if($check){
            // echo "OK";

            // Coupon exist ===> session:put dea session er moddhe store thakbe hishab er jonne coupon jhutu r date check kora hoice er modde time ace kina 
            if (date('Y-m-d', strtotime(date('Y-m-d'))) <= date('Y-m-d', strtotime($check->valid_date))) {
                // echo "done";

            session::put('coupon',[
                'name' => $check->coupon_code,
                'discount' => $check->coupon_amount,
                'after_discount' => Cart::subtotal() - $check->coupon_amount
            ]);
            return redirect()->back()->with('success' , 'Coupon Applied!');

            }else{

                // echo "old date";
            return redirect()->back()->with('error' , 'Expired Coupon Code!');
            }

        }else{
            return redirect()->back()->with('error' , 'Invalid Coupon Code! Try again.');
        }
    } 

    // For remove Coupon ====>
    public function RemoveCoupon(){
        Session::forget('coupon');
        return redirect()->back()->with('success' , 'Coupon removed!');
    }



    // Store order place/store =====>
    public function OrderPlace(Request $request){
        $order = array();
        $order['user_id'] = Auth::id();
        $order['c_name'] = $request->c_name;
        $order['c_phone'] = $request->c_phone;
        $order['c_email'] = $request->c_email;
        $order['c_country'] = $request->c_country;
        $order['c_zipcode'] = $request->c_zipcode;
        $order['c_address'] = $request->c_address;
        $order['c_extra_phone'] = $request->c_extra_phone;
        $order['c_city'] = $request->c_city;

        if(Session::has('coupon')){
                $order['subtotal'] = Cart::subtotal();
                $order['coupon_code'] = Session::get('coupon')['name'];
                $order['coupon_discount'] = Session::get('coupon')['discount'];
                $order['after_discount'] = Session::get('coupon')['after_discount'];
        }else{
                $order['subtotal'] = Cart::subtotal();
        }
        $order['total'] = Cart::total();
        $order['payment_type'] = $request->payment_type;
        $order['tax'] = 0;
        $order['shipping_charge'] = 0;
        $order['order_id'] = rand(1000,90000);
        $order['status'] = 0;
        $order['date'] = date('d-m-Y');
        $order['month'] = date('F');
        $order['year'] = date('Y');

        // dd($order);

        // order table e insert korar por id ta pass kore dwa holo order_id te 
        $order_id = DB::table('orders')->insertGetId($order);


        // For mail send ===>go to app/Mail/InvoiceMail and also have invoice.blade.php // also use Mail And use App\Mail\InvoiceMail;
        Mail::to($request->c_email)->send(new InvoiceMail($order));





        $content = Cart::content();

        $details = array();

        foreach($content as $row){
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['subtotal_price'] = $row->price*$row->qty;

            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        if(Session::has('coupon')) {
            Session::forget('coupon');
        }

        return redirect()->to('/')->with('success' , 'Successfully Order Placed!');

    }
}











