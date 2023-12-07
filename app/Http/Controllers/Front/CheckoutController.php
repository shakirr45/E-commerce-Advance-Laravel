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

        // payment jodi hand cash e hoy taile
        if($request->payment_type == "Hand Cash"){
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

        // nicha  aamarpay payment getway (ssl commerez)
        }elseif($request->payment_type == "Aamarpay"){
            // echo "Aamarpay";
            $tran_id = "test".rand(1111111,9999999);//unique transection id for every transection 

            $currency= "BDT"; //aamarPay support Two type of currency USD & BDT  
    
            $amount = "10";   //10 taka is the minimum amount for show card option in aamarPay payment gateway
            
            //For live Store Id & Signature Key please mail to support@aamarpay.com
            $store_id = "aamarpaytest"; 
    
            $signature_key = "dbb74894e82415a2f7ff0ec3a97e4183"; 

// ============================================== ekhne kaj ==================== ??????????????
            $aamarpay = Db::table('payment_getway_bds')->first();

            if($aamarpay->store_id == NULL){
            return redirect()->to('/')->with('error' , 'Please Setting your payment getway!');
            }else{
                //ekanew kaj =======================>>
                if($aamarpay->status == 1){
                    $url = "https://secure.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"

                }else{
                $url = "https://​sandbox​.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"

                }
    
                    $curl = curl_init();
            
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{ 
                        "store_id": "'.$store_id.'", 
                        "tran_id": "'.$tran_id.'",
                        "success_url": "'.route('success').'",
                        "fail_url": "'.route('fail').'",
                        "cancel_url": "'.route('cancel').'",
                        "amount": "'.$amount.'",
                        "currency": "'.$currency.'",
                        "signature_key": "'.$signature_key.'",
                        "desc": "Merchant Registration Payment",
                        "cus_name": "Name",
                        "cus_email": "payer@merchantcusomter.com",
                        "cus_add1": "House B-158 Road 22",
                        "cus_add2": "Mohakhali DOHS",
                        "cus_city": "Dhaka",
                        "cus_state": "Dhaka",
                        "cus_postcode": "1206",
                        "cus_country": "Bangladesh",
                        "cus_phone": "+8801704",
                        "type": "json"
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                    ));
            
                    $response = curl_exec($curl);
            
                    curl_close($curl);
                    // dd($response);
                    
                    $responseObj = json_decode($response);
            
                    if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {
            
                        $paymentUrl = $responseObj->payment_url;
                        // dd($paymentUrl);
                        return redirect()->away($paymentUrl);
            
                    }else{
                        echo $response;
                    }
            }
    
            
        }
        
    }

    // paymentgetway extra method ====> jar maddhome amra success naki fail dkhte prbe
    public function fail(Request $request){
        return $request;
    }

    public function cancel(){
        return 'Canceled';
    } 
}











