<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class ProductController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }


    //Product create page ===>ekhane join kora ace product modal e ===+>
    public function create(){
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $pickup_point = DB::table('pickup_points')->get();
        $warehouse = DB::table('warehouses')->get();


        return view('admin.product.create',compact('category','brand','pickup_point','warehouse'));


    }

    // Store product ===>
    public function store(Request $request){

        dd($request->all());
    }


}
