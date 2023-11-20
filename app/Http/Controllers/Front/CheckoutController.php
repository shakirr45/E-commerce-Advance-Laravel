<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Cart;


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
}
