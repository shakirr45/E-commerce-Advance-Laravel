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

    Route::get('/all-cart', 'CartController@AllCart')->name('all.cart');

    
    


    // For store review =====>
    Route::post('/store/review', 'ReviewController@store')->name('store.review');
    // For store wishlist =====>
    Route::get('/add/wishlist/{id}', 'ReviewController@AddWishlist')->name('add.wishlist');

});


