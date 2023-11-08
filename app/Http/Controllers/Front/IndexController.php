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

        //For show brand ---->
        $brand = DB::table('brands')->where('front_page', 1)->limit(24)->get();

        //For show banner ---->
        // $bannerproduct = DB::table('products')->where('product_slider', 1)->latest()->first();
        $bannerproduct = Product::where('status', 1)->where('product_slider', 1)->latest()->first();

        // For show featured product =====>->orderBy('id', 'DESC') use karon nutun gula--->
        $featured = Product::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->limit(16)->get();

        // For get popular product =======>
        $popular_product = Product::where('status', 1)->orderBy('product_views', 'DESC')->limit(16)->get();

        // For get trendy product =======>
        $trendy_product = Product::where('status', 1)->where('trendy',1)->orderBy('id', 'DESC')->limit(8)->get();

        // For Home page Category Show====>
        $home_category = DB::table('categories')->where('home_page',1)->orderBy('category_name', 'ASC')->get();

        // For get random product product =======>
        $random_product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();


        return view('frontend.index',compact('category','bannerproduct','featured','popular_product','trendy_product','home_category','brand','random_product'));
    }

    // singleproduct page calling method =====>
    public function productDetails($slug){
        // $product = DB::table('products')->where('slug',$slug)->first();
        $product = Product::where('slug',$slug)->first();

        // Product view er jonne===>
        Product::where('slug',$slug)->increment('product_views');

	    //  Related Product Show =====> $product ana ei khner opr er line theke ====>
        $related_product = DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
        // dd($related_product);
        // return response()->json($related_product);


        // For get review from db to show into sigle page product ======>etay orm model use kora hoace karon etar join model e kora=====>
        $review = Review::where('product_id', $product->id)->orderBy('id','DESC')->take(6)->get();

        return view('frontend.product.product_details',compact('product','related_product','review'));
    }


    // For product quickview with ajax ====>
    public function ProductQuickview($id){
        $product= Product::where('id',$id)->first();
        
        // return response()->json($product);

        return view('frontend.product.quick_view',compact('product'));
    }
}
