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


    // For checkout ======>
    Route::get('/checkout', 'CheckoutController@Checkout')->name('checkout');

    // For apply coupon ======>
    Route::post('/apply/coupon', 'CheckoutController@ApplyCoupon')->name('apply.coupon');
    // For apply coupon ======>
    Route::get('/remove/coupon', 'CheckoutController@RemoveCoupon')->name('coupon.remove');

    // For order Post/store =====>
    Route::post('/order/place', 'CheckoutController@OrderPlace')->name('order.place');

    
    


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



    // Category Wise Product ====>
    Route::get('/category/product/{id}', 'IndexController@categoryWiseProduct')->name('categorywise.product'); 


    // SubCategory Wise Product ====>
    Route::get('/subcategory/product/{id}', 'IndexController@SubcategoryWiseProduct')->name('subcategotywise.product'); 
    

    // ChildCategory Wise Product ====>
    Route::get('/childcategory/product/{id}', 'IndexController@ChildcategoryWiseProduct')->name('childcategotywise.product'); 


    //BrandWise Product ====>
    Route::get('/brandwise/product/{id}', 'IndexController@brandWiseProduct')->name('brandwise.product'); 

    
    // For write review as user for website =====>
    Route::get('/write/review', 'ReviewController@write')->name('write.review');
    // For store review as user for website =====>
    Route::post('/store/website/review', 'ReviewController@storeWebsiteReview')->name('store.website.review');
    

    // for Customer setting =====>
    Route::get('/customer/setting', 'ProfileController@setting')->name('customer.setting');

    // my order =====>
    Route::get('/my/order', 'ProfileController@MyOrder')->name('my.order');
 

    // For user Password Change====>
    Route::post('/home/password/update', 'ProfileController@PasswordChange')->name('customer.password.change');

    
    // Page view =====>
    Route::get('/page/{page_slug}', 'IndexController@ViewPage')->name('view.page');



    // For Store newsletter ====>
    Route::post('/store/newsletter', 'IndexController@storeNewsletter')->name('store.newsletter');


    // For Support Ticket ======>
    Route::get('/open/ticket', 'ProfileController@ticket')->name('open.ticket');
    // For new ticket/ submit ticket =====>
    Route::get('/new/ticket', 'ProfileController@NewTicket')->name('new.ticket');
    // For store ticket ====>
    Route::post('/store/ticket', 'ProfileController@StoreTicket')->name('store.ticket');
    // For show ticket page =====>
    Route::get('/show/ticket/{id}', 'ProfileController@ticketShow')->name('show.ticket');
    // For reply ticket =====>
    Route::post('/reply/ticket', 'ProfileController@ReplyTicket')->name('reply.ticket');



    
    


    



    
    

});

// For remove cart data ====>
// Route::get('/cart/destroy', function (){
//     Cart::destroy();
// });


// For check cart data ====>
Route::get('/cart/check', function (){
   return response()->json(Cart::content());
});

