<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

// For check admin name under the store
use Auth;

// For slug===>
use Illuminate\Support\Str;

// For image ===>
use Image;

//For yajra datatables===>
use DataTables;

//For join jhutu model er vetor ace
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }


    //Product create page ===>ekhane join kora ace product modal e ===+>
    public function create(){
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $pickup_point = DB::table('pickup_points')->get();
        $warehouse = DB::table('warehouses')->get();


        return view('admin.product.create',compact('category','brand','pickup_point','warehouse'));

    }

    // Get Child category =====>etar maddhome ami subcategory select krle ajax er maddhome child category ashbe
    public function getChildcategory($id){ //sub category id ==oi somosto id jegular ta sub child e same
        $data = DB::table('childcategories')->where('subcategory_id', $id)->get();

        return response()->json($data);
    }
    
    
    
    
        // Store product ===>
        public function store(Request $request){
            // dd($request->all());
            $validated = $request->validate([
                'name' => 'required',
                'code' => 'required|unique:products',
                'subcategory_id' => 'required',
                'brand_id' => 'required',
                'unit' => 'required',
                'selling_price' => 'required',
                'color' => 'required',
                'description' => 'required',

            ]);
            // Subcategory call for category id =====>
            $subcategory = DB::table('subcategories')->where('id',$request->subcategory_id)->first();
            //$subcategory->category_id; nice ace


            $data = array();
            $data['name'] = $request->name;
            $data['slug'] = Str::of($request->name)->slug('-');
            $data['code'] = $request->code;

            $data['category_id'] = $subcategory->category_id; // opr theke ana
            $data['subcategory_id'] = $request->subcategory_id;
            $data['childcategory_id'] = $request->childcategory_id;
            $data['brand_id'] = $request->brand_id;
            $data['pickup_point_id'] = $request->pickup_point_id;


            $data['unit'] = $request->unit;
            $data['tags'] = $request->tags;
            $data['purchase_price'] = $request->purchase_price;
            $data['selling_price'] = $request->selling_price;
            $data['discount_price'] = $request->discount_price;
            $data['warehouse'] = $request->warehouse;
            $data['stock_quantity'] = $request->stock_quantity;
            $data['color'] = $request->color;
            $data['size'] = $request->size;
            $data['description'] = $request->description;
            $data['video'] = $request->video;

            $data['fratured'] = $request->fratured;
            $data['today_deal'] = $request->today_deal;
            $data['status'] = $request->status;
            $data['admin_id'] = Auth::id();
            $data['date'] = date('d-m-Y');
            $data['month'] = date('F');


            // For img ===>
            $slug = Str::of($request->name)->slug('-');

            // For Single thumbnail====>
            if($request->thumbnail){
            // For store image---->
            $thumbnail =$request->thumbnail;
            $photoname = $slug.'.'.$thumbnail->getClientOriginalExtension();
            // $thumbnail->move('public/files/product/',$photoname); //without image intervention
            Image::make($thumbnail)->resize(600,600)->save('public/files/product/'.$photoname); // image intervention===>>
            // sudhu data base e name ta save krtac ====> ager code brandcontroller e ace
            $data['thumbnail'] = $photoname;
            }


            // For Multiple images====>
            $images = array();
            if($request->hasFile('images')){
                foreach($request->file('images') as $key => $image) {
                 $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                 Image::make($image)->resize(600,600)->save('public/files/product/'.$imageName); 
                //  $upload_image = 'public/files/product/'.$imageName;

                // Sudhu path er jonne==+>2 line beshi code
                // $upload_image = $imageName;
                //  array_push($images, $upload_image);

                array_push($images, $imageName);
                }
                $data['images'] = json_encode($images);
        }
        DB::table('products')->insert($data);
        return redirect()->back()->with('success' , 'Success to add a Product');
  }

  // For show Product =====> { Model link use kora ace }
  public function index(Request $request){
    if($request->ajax()){
        // For image pass ===>db te sudhu name pass korar karone eta insert jkhne kora img sekhene==+>tar jonne db te sudhu path ace
        $imgurl = 'public/files/product';

        // nicer ei vabe get krte hobe=quesry bldr dea krle hobe na karon join kora orm dea =>
        $data = Product::latest()->get();        
        return DataTables::of($data)
        ->addIndexColumn()
        // jodi join kori ---> product model er vetor join kora ace {jeta func er age dibo ota rawcolumns er vetor dite hobe}$row->category etar nam model er function theke astac
        ->editColumn('category_name',function($row){
            return $row->category->category_name;
        })
        ->editColumn('subcategory_name',function($row){
            return $row->subcategory->subcategory_name;
        })
        ->editColumn('brand_name',function($row){
            return $row->brand->brand_name;
        })
        // thumb nail er jonne opr er var er jonne use ($imgurl)
        ->editColumn('thumbnail',function($row) use ($imgurl) {
            return '<img src="'.$imgurl.'/'.$row->thumbnail.'" height="30" width="30">';
        })

        ->editColumn('fratured',function($row){
            if($row->fratured == 1){
                return "Yes";
            }else{
                return "No";
            }
        })
        ->addColumn('action', function($row){
            $actionbtn= '
            <a href="#" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
            <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action','category_name','subcategory_name','brand_name','thumbnail','fratured'])
        ->make(true);

    }
    return view('admin.product.index');
  }


}

