<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class SettingController extends Controller
{
    //

    public function __construct()
    {
    $this->middleware('auth');
    }

    // Seo page show ====>
    public function seo(){

        $data = DB::table('seos')->first();
        return view('admin.setting.seo',compact('data'));
    }

    // For Seo settiong update ====>
    public function seoUpdate(Request $request){
        $data= array();
        $data['meta_title'] =$request->meta_title;
        $data['meta_author'] =$request->meta_author;
        $data['meta_tag'] =$request->meta_tag;
        $data['meta_keyword'] =$request->meta_keyword;
        $data['meta_description'] =$request->meta_description;
        $data['goolge_verification'] =$request->goolge_verification;
        $data['alexa_verification'] =$request->alexa_verification;
        $data['google_analytics'] =$request->google_analytics;
        $data['google_adsense'] =$request->google_adsense;
        // dd($data);
        DB::table('seos')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update Seo Settings');

    }

    // Smtp Setting =====>
    public function smtp(){
        $smtp = DB::table('smtps')->first();
        return view('admin.setting.smtp',compact('smtp'));
    }

    //Smtp Update =====>
    public function smtpUpdate(Request $request, $id){
        $data = array();
        $data['mailer'] =$request->mailer;
        $data['host'] =$request->host;
        $data['port'] =$request->port;
        $data['user_name'] =$request->user_name;
        $data['password'] =$request->password;

        // dd($data);
        DB::table('smtps')->where('id', $id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update Smtp Settings');

    }
}

