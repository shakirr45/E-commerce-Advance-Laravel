<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CouponController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/check', function () {
//     return view('admin.home');
// });

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('admin.login');


// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' =>'is_admin'], function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

    // For Change pass as admin =====>
    Route::get('/admin/password/change', 'AdminController@PasswordChange')->name('admin.password.change');
    Route::post('/admin/password/update', 'AdminController@PasswordUpdate')->name('admin.password.update');

    


    

    // Category Route-----.
    Route::group(['prefix' => 'category'],function(){
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update', 'CategoryController@update')->name('category.update');
    });

    // Global Route ==============================>
    Route::get('/get_child_category/{id}', 'ProductController@getChildcategory');


        // Sub Category Route-----.
        Route::group(['prefix' => 'subcategory'],function(){
            Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
            Route::post('/store', 'SubcategoryController@store')->name('subcategory.store');
            Route::get('/delete/{id}', 'SubcategoryController@destroy')->name('subcategory.delete');
            Route::get('/edit/{id}', 'SubcategoryController@edit');
            Route::post('/update', 'SubcategoryController@update')->name('subcategory.update');
        });

        // Child Category Route-----.
        Route::group(['prefix' => 'childcategory'],function(){
            Route::get('/', 'ChildcategoryController@index')->name('childcategory.index');
            Route::post('/store', 'ChildcategoryController@store')->name('childcategory.store');
            Route::get('/delete/{id}', 'ChildcategoryController@destroy')->name('childcategory.delete');
            Route::get('/edit/{id}', 'ChildcategoryController@edit');
            Route::post('/update', 'ChildcategoryController@update')->name('childcategory.update');
        });

        // Brand Route-----.
        Route::group(['prefix' => 'brand'],function(){
            Route::get('/', 'Brandcontroller@index')->name('brand.index');
            Route::post('/store', 'Brandcontroller@store')->name('brand.store');
            Route::get('/delete/{id}', 'Brandcontroller@destroy')->name('brand.delete');
            Route::get('/edit/{id}', 'Brandcontroller@edit');
            Route::post('/update', 'Brandcontroller@update')->name('brand.update');
        });

        // product Route--with ajax---.===================
        Route::group(['prefix' => 'product'],function(){
            Route::get('/', 'ProductController@create')->name('product.create');
            Route::post('/store', 'ProductController@store')->name('brand.store');
            // Route::get('/edit/{id}', 'ProductController@edit');
            // Route::post('/update', 'ProductController@update')->name('product.update');
        });


        

        // coupon Route--- with ajax--.
        Route::group(['prefix' => 'coupon'],function(){
            Route::get('/', 'CouponController@index')->name('coupon.index');
            Route::post('/store', 'CouponController@store')->name('coupon.store');
            Route::delete('/delete', 'CouponController@destroy')->name('delete.coupon');
            Route::post('/update', 'CouponController@update')->name('coupon.update');
        });

        // Warehouse Route-----.
        Route::group(['prefix' => 'warehouse'],function(){
            Route::get('/', 'WarehouseController@index')->name('warehouse.index');
            Route::post('/store', 'WarehouseController@store')->name('warehouse.store');
            Route::get('/delete/{id}', 'WarehouseController@destroy')->name('warehouse.delete');
            Route::get('/edit/{id}', 'WarehouseController@edit');
            Route::post('/update', 'WarehouseController@update')->name('warehouse.update');
        });

        // Setting  Route-----.
        Route::group(['prefix' => 'setting'],function(){

        // SEO Setting-----.
        Route::group(['prefix' => 'seo'],function(){
            Route::get('/', 'SettingController@smtp')->name('seo.setting');
            Route::post('/update', 'SettingController@seoUpdate')->name('seo.setting.update');
        });

        // smtp Setting-----.
        Route::group(['prefix' => 'smtp'],function(){
            Route::get('/', 'SettingController@seo')->name('smtp.setting');
            Route::post('/update/{id}', 'SettingController@smtpUpdate')->name('smtp.setting.update');
        });

        // website Setting-----.
        Route::group(['prefix' => 'website'],function(){
            Route::get('/', 'SettingController@websitesetting')->name('website.setting');
            Route::post('/update/{id}', 'SettingController@websiteUpdate')->name('website.setting.update');
        });

        // page Setting-----.
        Route::group(['prefix' => 'page'],function(){
            Route::get('/', 'PageController@index')->name('page.index');
            Route::get('/create/page', 'PageController@create')->name('create.page');
            Route::post('/store', 'PageController@store')->name('page.store');
            Route::get('/delete/{id}', 'PageController@delete')->name('page.delete');
            Route::get('/edit/{id}', 'PageController@edit')->name('page.edit');
            Route::post('/update/{id}', 'PageController@update')->name('page.update');
            
        });


        // pickuppoint -----.with ajax--.
        Route::group(['prefix' => 'pickuppoint'],function(){
            Route::get('/', 'pickupController@index')->name('pickuppoint.index');
            Route::post('/store', 'pickupController@store')->name('pickuppoint.store');
            Route::post('/update', 'pickupController@update')->name('pickuppoint.update');
            Route::delete('/delete', 'pickupController@delete')->name('pickuppoint.delete');
            
        });




        });

        

});









