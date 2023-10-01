<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

// For SweetAlert ====>
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //

    // For guest not to access as admin =====> 

        public function __construct()
        {
        $this->middleware('auth');
        }
        

        // Admin after login ====>
        public function admin(){
            return view('admin.home');
        }

        // Admin Coustome logout ====>
        public function logout(){
            Auth::logout();
            //for sweetalert---->
            Alert::warning('Product Added Successfully','We have added product to the Cart');

            //with message tstor--->
            return redirect()->route('admin.login')->with('success' , 'Success to logout');
        }
}
