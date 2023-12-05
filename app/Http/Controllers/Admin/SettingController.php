<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use Image;

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

    // Website Setting ====>
    public function websitesetting(){
        $setting =DB::table('settings')->first();
        return view('admin.setting.website_setting',compact('setting'));
    }


    // For update website ====>
    public function websiteUpdate(Request $request, $id){

        $data = array();
        $data['currency'] = $request->currency;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;

    if($request->logo){  // if new logo dei taile ==>

     // For store image---->
     $logo =$request->logo;
     $logoname = uniqid().'.'.$logo->getClientOriginalExtension();
     // $logo->move('public/files/setting/',$logoname); //without image intervention
     Image::make($logo)->resize(320,120)->save('public/files/setting/'.$logoname); // image intervention===>>
     $data['logo'] = 'public/files/setting/'.$logoname;
    }else{
        $data['logo'] = $request->old_logo;
    }


    if($request->favicon){  // if new logo dei taile ==>

        // For store image---->
        $favicon =$request->favicon;
        $faviconname = uniqid().'.'.$favicon->getClientOriginalExtension();
        // $logo->move('public/files/setting/',$logoname); //without image intervention
        Image::make($favicon)->resize(32,32)->save('public/files/setting/'.$faviconname); // image intervention===>>
        $data['favicon'] = 'public/files/setting/'.$faviconname;
       }else{
           $data['favicon'] = $request->old_favicon;
       }

       DB::table('settings')->where('id' , $id)->update($data);
       return redirect()->back()->with('success' , 'Success to Update Settings');
    }

    // For payment getway ====>
    public function PaymentGetway(){
        $aamarpay = DB::table('payment_getway_bds')->first();
        $surjapay = DB::table('payment_getway_bds')->skip(1)->first();
        $ssl = DB::table('payment_getway_bds')->skip(2)->first();

        return view('admin.bdpayment_getway.edit', compact('aamarpay','surjapay','ssl'));

    }


}
