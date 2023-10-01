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

    // Category Route-----.
    Route::group(['prefix' => 'category'],function(){
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');

    });

});




