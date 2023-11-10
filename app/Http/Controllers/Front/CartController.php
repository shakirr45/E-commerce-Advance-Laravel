<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use Cart;
use App\Models\Product;

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


    public function AllCart(){
        $data = array();
        $data['cart_qty'] = Cart::count();
        $data['cart_total'] = Cart::total();
        return response()->json($data);

    }
}

