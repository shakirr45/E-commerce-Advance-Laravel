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
        // $category = Categories::all(); {{->orderBy('category_name','ASC') eta dile A-z borabor ashbe like abcdef }}
        $category = DB::table('categories')->orderBy('category_name','ASC')->get();

        //For show brand ---->
        $brand = DB::table('brands')->where('front_page', 1)->limit(24)->get();

        //For show banner ---->
        // $bannerproduct = DB::table('products')->where('product_slider', 1)->latest()->first();
        $bannerproduct = Product::where('status', 1)->where('product_slider', 1)->latest()->first();

        // For show featured product =====>->orderBy('id', 'DESC') use karon nutun gula--->
        $featured = Product::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->limit(16)->get();

        // For show teday deal product =====>
        $todaydeal = Product::where('status', 1)->where('today_deal', 1)->orderBy('id', 'DESC')->limit(6)->get();

        // For get popular product =======>
        $popular_product = Product::where('status', 1)->orderBy('product_views', 'DESC')->limit(16)->get();

        // For get trendy product =======>
        $trendy_product = Product::where('status', 1)->where('trendy',1)->orderBy('id', 'DESC')->limit(8)->get();

        // For Home page Category Show====>
        $home_category = DB::table('categories')->where('home_page',1)->orderBy('category_name', 'ASC')->get();

        // For Home page campaign Show====>
        $campaign = DB::table('campaigns')->where('status',1)->orderBy('id', 'DESC')->first();

        // For get random product product =======>
        $random_product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();

        // For get review for website =======>
        $review = DB::table('webreviews')->where('status', 1)->orderBy('id', 'DESC')->limit(12)->get();


        return view('frontend.index',compact('category','bannerproduct','featured','popular_product','trendy_product','home_category','brand','random_product','todaydeal','review','campaign'));
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


    // Category Wise Product ====>
    public function categoryWiseProduct($id){
        // echo "$id";

        $category = DB::table('categories')->where('id', $id)->first();
        $subcategory = DB::table('subcategories')->where('category_id', $id)->get();
        $brand = DB::table('brands')->get();
        $products = DB::table('products')->where('category_id', $id)->paginate(60);
        $random_product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();

        
        return view('frontend.product.category_products',compact('subcategory','brand','products','random_product','category'));
    }


    // Sub Category Wise product ======>
    public function SubcategoryWiseProduct($id){
        // echo "$id";

        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $childcategory = DB::table('childcategories')->where('subcategory_id', $id)->get();
        $brand = DB::table('brands')->get();
        $products = DB::table('products')->where('subcategory_id', $id)->paginate(60);
        $random_product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();

        
        return view('frontend.product.subcategory_products',compact('subcategory','childcategory','brand','products','random_product'));
    }


        // Child Category Wise product ======>
        public function ChildcategoryWiseProduct($id){
            // echo "$id";
    
            $childcategory = DB::table('childcategories')->where('id', $id)->first();
            $category = DB::table('categories')->get();
            $brand = DB::table('brands')->get();
            $products = DB::table('products')->where('childcategory_id', $id)->paginate(60);
            $random_product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();
    
            
            return view('frontend.product.childcategory_products',compact('childcategory','category','brand','products','random_product'));
        }


        // BrandWise product ======>
        public function brandWiseProduct($id){
            // echo "$id";
    
            $brand = DB::table('brands')->where('id', $id)->first();
            $category = DB::table('categories')->get();
            $brands = DB::table('brands')->get();
            $products = DB::table('products')->where('brand_id', $id)->paginate(60);
            $random_product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();
    
            
            return view('frontend.product.brandwise_products',compact('brand','category','brands','products','random_product'));
        }


        // page view Method =====>
        public function ViewPage($page_slug){
            $page = DB::table('pages')->where('page_slug', $page_slug)->first();
            return view('frontend.page',compact('page'));
        }


        // For store Newsletter =====>
        public function storeNewsletter(Request $request){
            // return "OK";
            $email = $request->email;
            $check = DB::table('newsletters')->where('email', $email)->first();

            if($check) {
                return response()->json('Email already Exist! ');
            }
            else{
                $data = array();
                $data['email'] = $request->email;
                DB::table('newsletters')->insert($data);
                return response()->json('Thanks for subscribe us! ');

            }
        }

    
        // For Order Tracking ======>
        public function OrderTracking(){
            return view('frontend.order_tracking');
        }

        // For check/search order =====>
        public function CheckOrder(Request $request){
            $check = DB::table('orders')->where('order_id', $request->order_id)->first();

            if($check){

                $order = DB::table('orders')->where('order_id', $request->order_id)->first();
                $order_details = DB::table('order_details')->where('order_id', $order->id)->get(); // ekhner id ta opr er line er theke $request->order_id likhlaw kaj kore

                return view('frontend.order_details',compact('order','order_details'));

            }else{
              return redirect()->back()->with('error' , 'Invalid orderID! Try again!');

            }
        }


        // For contact ===========>
        public function contact(){
            return view('frontend.contact');
        }

        // For blog ===========>
        public function blog(){
            return view('frontend.blog');
        }


        

        

}
