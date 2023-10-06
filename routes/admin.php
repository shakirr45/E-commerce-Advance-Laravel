<?php

use Illuminate\Support\Facades\Route;

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

});






