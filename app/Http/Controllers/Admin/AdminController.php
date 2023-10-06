<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

// For SweetAlert ====>
use RealRashid\SweetAlert\Facades\Alert;

// for pass check hash for make===>
use Hash;

use App\Models\User;

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


         // Admin change password =====>
         public function PasswordChange(){
            return view('admin.profile.password_change');
         }

         // For password Update =====>
         public function PasswordUpdate(Request $request){
            $validated = $request->validate([
                'old_password' => 'required',
                // come from http/auth/register controller ====>
                'password' => 'required|min:6|confirmed',
            ]);

            $current_password = Auth::user()->password; // Login user password check ===>
             
            // for check old pass is correct or not ====>
            $oldpass = $request->old_password;  // old pass get from input field ===>
            $new_password = $request->password;  // new pass get fornew pass ===>

            // for pass check hash for make===>
            if(Hash::check($oldpass, $current_password)){  // Checking old pass and current pass as hash formet ====>

                $user = User::find(Auth::id()); // current user data get ===>
                $user->password = Hash::make($request->password); // current user data hashing ====>
                $user->save();
                Auth::logout(); // logout into admin login ===>
                return redirect()->route('admin.login')->with('success' , ' Password Updated Successfully');


            }else{
            return redirect()->back()->with('success' , 'Old Password Not Matched');

            }

         }
         

}
