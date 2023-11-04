<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

//For yajra datatables===>
use DataTables;

use Illuminate\Support\Str;

// For image ===>
use Image;

// For delete image ===>
use File;

class CampaignController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // For Show Campaign index ====>with yajra data tables---user request===>
    public function index(Request $request){

        if($request->ajax()) {
            $data = DB::table('campaigns')->orderBy('id', 'DESC')->get();

        // yajra data tables pass ====> 
        return DataTables::of($data)
        ->addIndexColumn()
        // Pore ana =====>******************** start
        ->editColumn('status',function($row){
            if($row->status == 1){
                // return "Yes";
                return '<a href="#"> <span class="badge badge-success">Active</span> </a>';

            }else{
                return '<a href="#"> <span class="badge badge-danger">Inactive</span> </a>';
            }
        })
        // Pore ana =====>******************** end

        ->addColumn('action', function($row){
            $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'"><i class="fas fa-edit"></i></a>

            <a href="'.route('campaign.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action','status'])
        ->make(true);

        }
        // $category=DB::table('campaigns')->get();

        return view('admin.offer.campaign.index');

    }

    // for store Campaign ====>
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:campaigns|max:55',
            'start_date' => 'required',
            'image' => 'required',
            'discount' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['status'] = $request->status;
        $data['discount'] = $request->discount;
        $data['month'] = date('F');
        $data['year'] = date('Y');


        // For img ===>check this======================================>
        $slug = Str::of($request->title)->slug('-');

        // For store image---->
        $photo =$request->image;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/campaign/',$photoname); //without image intervention
        Image::make($photo)->resize(468,90)->save('public/files/campaign/'.$photoname); // image intervention===>>

        $data['image'] = 'public/files/campaign/'.$photoname;

        DB::table('campaigns')->insert($data);

        return redirect()->back()->with('success' , 'Campaign Inserted!');

    }

    // For delete Campaign ========>
    public function destroy($id){
        $data = DB::table('campaigns')->where('id',$id)->first();
        $image= $data->image;
        // dd($image);
        if(File::exists($image)){
            unlink($image);
        }
        DB::table('campaigns')->where('id',$id)->delete();
        return redirect()->back()->with('success' , 'Success to delete campaign');
    }

    // for campaign edit ========>
    public function edit($id){
       $data = DB::table('campaigns')->where('id',$id)->first();
       return view('admin.offer.campaign.edit',compact('data'));
    }

    
    // for campaign update ========>
    public function update(Request $request){
        // For img ===>
        $slug = Str::of($request->title)->slug('-');

        $data = array();
        $data['title'] = $request->title;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['status'] = $request->status;
        $data['discount'] = $request->discount;
        // dd($data);

        // for check is there new photo or not ====>
        if($request->image){
            if (File::exists($request->old_image)){
                unlink($request->old_image);
            }

        $photo =$request->image;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/campaign/',$photoname); //without image intervention
        Image::make($photo)->resize(468,90)->save('public/files/campaign/'.$photoname); // image intervention===>>
        $data['image'] = 'public/files/campaign/'.$photoname;
        DB::table('campaigns')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update campaign');


        }else{
        $data['image'] = $request->old_image; 
        DB::table('campaigns')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update campaign');
        }
    }



    
}
