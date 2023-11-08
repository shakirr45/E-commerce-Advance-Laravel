<?php

namespace App\Http\Controllers\admin;

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

class Brandcontroller extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    // For Show brand page =====>====>with yajra data tables---user request===>
    public function index(Request $request){
        if($request->ajax()){

            $data = DB::table('brands')->get();
            
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('front_page',function($row){
                if($row->front_page == 1){
                    // return "Yes";
                    return ' <span class="badge badge-success">Home Page</span> ';
    
                }
            })
            ->addColumn('action', function($row){
                $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'"><i class="fas fa-edit"></i></a>
                <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $actionbtn;
            })
            ->rawColumns(['action','front_page'])
            ->make(true);

        }
        return view('admin.category.brand.index');
    }

    // for store brand ====>
    public function store(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);

        // For img ===>
        $slug = Str::of($request->brand_name)->slug('-');

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::of($request->brand_name)->slug('-');
        $data['front_page'] = $request->front_page;
        

        // For store image---->
        $photo =$request->brand_logo;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/brand/',$photoname); //without image intervention
        Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname); // image intervention===>>


        $data['brand_logo'] = 'public/files/brand/'.$photoname;



        DB::table('brands')->insert($data);

        return redirect()->back()->with('success' , 'Success to add a Brand');


    }

    // For delete brand ====>

    public function destroy($id){
        $data = DB::table('brands')->where('id',$id)->first();
        $image= $data->brand_logo;
        // dd($image);
        if(File::exists($image)){
            unlink($image);
        }
        DB::table('brands')->where('id',$id)->delete();
        return redirect()->back()->with('success' , 'Success to delete Brand');

    }

    // For Brand edit =====>
    public function edit($id){
        $data=DB::table('brands')->where('id',$id)->first();
            return view('admin.category.brand.edit',compact('data'));
    }

    // For update brand ====>

    public function update(Request $request){
        
        // For img ===>
        $slug = Str::of($request->brand_name)->slug('-');

        $data=array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::of($request->brand_name)->slug('-');
        $data['front_page'] = $request->front_page;

        // dd($data);

        // for check is there new photo or not ====>  
        if($request->brand_logo){
            if(File::exists($request->old_logo)){
                unlink($request->old_logo);
            }

        $photo =$request->brand_logo;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/brand/',$photoname); //without image intervention
        Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname); // image intervention===>>
        $data['brand_logo'] = 'public/files/brand/'.$photoname;
        DB::table('brands')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update Brand');


        }else{
        $data['brand_logo'] = $request->old_logo; 
        DB::table('brands')->where('id',$request->id)->update($data);
        return redirect()->back()->with('success' , 'Success to Update Brand');
        }

    }
}
