<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\User;

// for pass check hash for make===>
use Hash;


class ProfileController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }


    // For user profile setting view page=====>
    public function setting(){
        return view('user.setting');
    }

    // For Password Change ====>
    public function PasswordChange(Request $request){
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
            return redirect()->to('/')->with('success' , ' Password Updated Successfully');


        }else{
        return redirect()->back()->with('error' , 'Old Password Not Matched');

        }
    }

}
