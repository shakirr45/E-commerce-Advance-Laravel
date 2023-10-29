<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Categories;

// Etar moddhe join kora ace jonne index e kicu kicu jaygay er kaj kora hoace jamon banner er brand name er khatre
use App\Models\Product;

use App\Models\Review;



class IndexController extends Controller
{
    //
    // For view Home Page ====>
    public function index(){

        // Category Pass into frontend ====>
        // $category = Categories::all();
        $category = DB::table('categories')->get();

        //For show banner ---->
        // $bannerproduct = DB::table('products')->where('product_slider', 1)->latest()->first();
        $bannerproduct = Product::where('product_slider', 1)->latest()->first();

        return view('frontend.index',compact('category','bannerproduct'));
    }

    // singleproduct page calling method =====>
    public function productDetails($slug){
        // $product = DB::table('products')->where('slug',$slug)->first();
        $product = Product::where('slug',$slug)->first();


	    //  Related Product Show =====> $product ana ei khner opr er line theke ====>
        $related_product = DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
        // dd($related_product);
        // return response()->json($related_product);


        // For get review from db to show into sigle page product ======>etay orm model use kora hoace karon etar join model e kora=====>
        $review = Review::where('product_id', $product->id)->get();


        // -------------------------------------- 


        


        return view('frontend.product_details',compact('product','related_product','review'));
    }
}
