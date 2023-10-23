<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Categories;

// Etar moddhe join kora ace jonne index e kicu kicu jaygay er kaj kora hoace jamon banner er brand name er khatre
use App\Models\Product;


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
}
