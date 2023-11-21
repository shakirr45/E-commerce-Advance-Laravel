<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Cart;

use DB;

use Session;

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
}
