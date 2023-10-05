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
            ->addColumn('action', function($row){
                $actionbtn= '<a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'"><i class="fas fa-edit"></i></a>
                <a href="'.route('childcategory.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
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

        // For store image---->
        $photo =$request->brand_logo;
        $photoname = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('public/files/brand/',$photoname); //without image intervention
        Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname); // image intervention===>>


        $data['brand_logo'] = 'public/files/brand/'.$photoname;



        DB::table('brands')->insert($data);

        return redirect()->back()->with('success' , 'Success to add a Brand');


    }




}
