<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () { // age eta then controller dea lkaj
//     // return view('welcome');
    // return view('layouts.app');
//     // return view('frontend.index');


// });

Auth::routes();

Route::get('/login',function(){
    return redirect()->to('/');
})->name('login');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// For customer logout ====================>
Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');


// Route::get('frontend/product', function () {
//     return view('frontend.product_details');
// });



// Frontend All routes here =======>
Route::group(['namespace' => 'App\Http\Controllers\Front'], function(){

    // for view home page---->
    Route::get('/', 'IndexController@index');
    Route::get('/product-details/{slug}', 'IndexController@productDetails')->name('product.details');

    // For quickview show with ajax request ===========>
    Route::get('/product-quick-view/{id}', 'IndexController@ProductQuickview');



    
    // For Add to cart form quickview store method ===========>
    //Cart::total(); Cart::count() ..etc. eta dea chek krte hoy add hoice kina ... front page e dwa ace
    Route::post('/addtocart', 'CartController@AddToCartQV')->name('add.to.cart.quickview');

    // jkhn cart e add kora hobe tkhn price r koto gula add hoice ajax er maddhome barbe{app.blade.php}
    Route::get('/all-cart', 'CartController@AllCart')->name('all.cart'); // ajax request for sub total

    // for cart page=====>
    Route::get('/my-cart', 'CartController@MyCart')->name('cart'); // ajax request for sub total

    // for cart empty =====>
    Route::get('/cart/empty', 'CartController@EmptyCart')->name('cart.empty'); 

    // for single cart remove=====>
    Route::get('/cartproduct/remove/{rowId}', 'CartController@RemoveProduct'); 

    // for update product by quantity/qty=====>
    Route::get('cartproduct/updateqty/{rowId}/{qty}', 'CartController@updateQty'); 
    // for update product by color =====>
    Route::get('cartproduct/updatecolor/{rowId}/{color}', 'CartController@updateColor'); 
    // for update product by size =====>
    Route::get('cartproduct/updatesize/{rowId}/{size}', 'CartController@updateSize'); 



    // For store wishlist =====>
    Route::get('/add/wishlist/{id}', 'CartController@AddWishlist')->name('add.wishlist');

    // for wish list ====>
    Route::get('/wishlist', 'CartController@wishlist')->name('wishlist'); 

    // for wish list ====>
    Route::get('/clear/wishlist', 'CartController@Clearwishlist')->name('clear.wishlist'); 

    // for delete single product from wishlist ====>
    Route::get('/wishlist/product/delete/{id}', 'CartController@WishlistProductDelete')->name('wishlistproduct.delete'); 
    
    
    
    

    // For store review =====>
    Route::post('/store/review', 'ReviewController@store')->name('store.review');


});

// For remove cart data ====>
// Route::get('/cart/destroy', function (){
//     Cart::destroy();
// });


// For check cart data ====>
Route::get('/cart/check', function (){
   return response()->json(Cart::content());
});

