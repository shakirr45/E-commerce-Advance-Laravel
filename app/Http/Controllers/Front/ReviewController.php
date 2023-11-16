<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use Auth;

class ReviewController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // For store review =====>
    public function store(Request $request){
        $validated = $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);

        // Jodi age review thake taile r insert krbo na ======>
        $check = DB::table('reviews')->where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        if($check){
        return redirect()->back()->with('error' , 'Already you have review with this product');

        }

        $data = array();
        $data['user_id'] = Auth::id();
        $data['product_id'] = $request->product_id;
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;
        $data['review_date'] = date('d-m-y');
        $data['review_month'] = date('F');
        $data['review_year'] = date('Y');

        DB::table('reviews')->insert($data);
        return redirect()->back()->with('success' , 'Thank for your review');
    }

    // Write a review as User for website =====>
    public function write(){
        return view('user.review_write');
    }

    // For store website review as user =======>
    public function storeWebsiteReview(Request $request){

        // jodi review age akbr dei eta check krar jonne
        $check = DB::table('webreviews')->where('user_id', Auth::id())->first();

        if($check){
        return redirect()->back()->with('error' , 'Review already exist !');
        }
        $data = array();
        $data['user_id'] = Auth::id();
        $data['name'] = $request->name;
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;
        $data['review_date'] = date('d , F Y');
        $data['status'] = 0;

        DB::table('webreviews')->insert($data);
        return redirect()->back()->with('success' , 'Thank for your review');

    }


    								
}





