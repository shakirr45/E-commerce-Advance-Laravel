<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use Cart;
use App\Models\Product;
use Auth;

class CartController extends Controller
{
    //

    public function AddToCartQV(Request $request){

        // return "Ok"; //under 3 way
        // $product = Product::where('id', $request->id)->first();
        // $product = DB::table('products')->where('id', $request->id)->first();


        $product = Product::find($request->id);
        
        // return $product;


        // Cart add ====> cart project suru tei install kora cilo {$product->id  or $request->id} evabew hoy [opr er part gula must id name qty price weight weight 1 rkhte hobe]
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' =>  $request->qty,
            'price' =>  $request->price,
            'weight'=> '1',
            'options' => ['size'=> $request->size, 'color'=> $request->color, 'thumbnail'=> $product->thumbnail]

        ]);
        return response()->json("Added!");

        //Cart::total(); Cart::count(); etc,eta dea chek krte hoy add hoice kina ... front page e dwa ace

    }

    // jkhn cart e add kora hobe tkhn price r koto gula add hoice ajax er maddhome barbe{app.blade.php}
    public function AllCart(){
        $data = array();
        $data['cart_qty'] = Cart::count();
        $data['cart_total'] = Cart::total();
        return response()->json($data);

    }

    // for cart page =====>
    public function MyCart(){
        $content = Cart::content();
        // return response()->json($content);

        return view('frontend.cart.cart', compact('content'));

    }

    // for remove single product of cart ======>
    public function RemoveProduct($rowId){
        Cart::remove($rowId);
        return response()->json('Success!');

    }

    // update cart quantity/qty =====>
    public function updateQty($rowId, $qty){
        // return $rowId;
        // return $qty;

        Cart::update($rowId, ['qty' => $qty]); // Will update the name
        return response()->json('Successfully Updated!');

    }

        // update cart color =====>
        public function updateColor($rowId, $color){
            // return $rowId;
            // return $qty;

            $product = Cart::get($rowId);

            $thumbnail= $product->options->thumbnail ;
            $size= $product->options->size ;


            Cart::update($rowId, ['options' => ['color' => $color, 'thumbnail' => $thumbnail , 'size' => $size]]); 
            return response()->json('Successfully Updated!');
    
        }

        // update cart size =====>
        public function updateSize($rowId, $size){
            // return $rowId;
            // return $qty;

            $product = Cart::get($rowId);

            $thumbnail= $product->options->thumbnail ;
            $color= $product->options->color ;


            Cart::update($rowId, ['options' => ['size' => $size, 'thumbnail' => $thumbnail , 'color' => $color]]); 
            return response()->json('Successfully Updated!');
    
        }

        // For empty cart ==========>
        public function EmptyCart(){
            Cart::destroy();
            return redirect()->to('/')->with('success' , 'Cart item clear successfully!');

        }

    // For add Wishlist =======>
    public function AddWishlist($id){
        // echo "$id";

        if(Auth::check()){

            // jodi age theke thake add tahole hobe na =====>
            $check = DB::table('wishlists')->where('product_id', $id)->where('user_id', Auth::id())->first();
            if($check){
            return redirect()->back()->with('error' , 'Already have it on your wishlist');
            }else{
                $data = array();
                $data['product_id'] = $id;
                $data['user_id'] = Auth::id();
                $data['date'] = date('d , F Y');

                DB::table('wishlists')->insert($data);

            return redirect()->back()->with('success' , 'Product added on wishlist');
            }
        }
        return redirect()->back()->with('error' , 'Login Your Account!');


    }


        // for wishlist ==========>
        public function wishlist(){
            if(Auth::check()) {
                $wishlist= DB::table('wishlists')->leftJoin('products', 'wishlists.product_id', 'products.id')->select('products.name', 'products.thumbnail', 'products.slug', 'wishlists.*')->where('wishlists.user_id', Auth::id())->get();

                return view('frontend.cart.wishlist',compact('wishlist'));
            }
            return redirect()->back()->with('error' , 'At first login your account!');

        }

        // For clear Wishlist ====>
        public function Clearwishlist(){

            DB::table('wishlists')->where('user_id', Auth::id())->delete();

            return redirect()->back()->with('success' , 'Wishlist Clear');

        }

        // For clear single Wishlist product ====>
        public function WishlistProductDelete($id){

            DB::table('wishlists')->where('id',$id)->delete();

            return redirect()->back()->with('success' , 'Successfully deleted!');

        }        

        

}

