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


use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Brand;
use App\Models\Warehouse;
use App\Models\PickupPoint;





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

            $data['featured'] = $request->featured;
            $data['today_deal'] = $request->today_deal;
            $data['product_slider'] = $request->product_slider;
            $data['trendy'] = $request->trendy_product;
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

  // For product edit ===================>
  public function edit($id){
    $product = DB::table('products')->where('id',$id)->first();
    //$product = Product::findorfail($id); // etaw use kora jay

    // $category = DB::table('categories')->get();
    $category = Categories::all();
    $brand = Brand::all();
    $warehouse = Warehouse::all();
    $pickup_point = PickupPoint::all();



    return view('admin.product.edit',compact('product','category','brand','warehouse','pickup_point'));
  }



    // For show Product =====> { Model link use kora ace } {{ ekhane search er code ace with yajra so jeta jeta @@@@@ use hobe oituk oitar code r cmt kora gula search cara (&& use jeta age cilo)}} mane ak kothay ager ta cilo orm r eta query builder
         public function index(Request $request){
        if($request->ajax()){
        // For image pass ===>db te sudhu name pass korar karone eta insert jkhne kora img sekhene==+>tar jonne db te sudhu path ace.
        $imgurl = 'public/files/product';

        // nicer ei vabe get krte hobe=quesry bldr dea krle hobe na karon join kora orm dea =>
        $data = Product::latest()->get(); //&&----------------------------


        // @@@@-----------------
        $product = "";
        // @@@@----------------------------- etar maddhome krle niche editcolumn er code lgtac na-------
        $query = DB::table('products')->leftJoin('categories', 'products.category_id', 'categories.id')->leftJoin('subcategories', 'products.subcategory_id', 'subcategories.id')->leftJoin('brands', 'products.brand_id', 'brands.id');



        if($request->category_id){
            $query->where('products.category_id', $request->category_id);
        }

        if($request->brand_id){
            $query->where('products.brand_id', $request->brand_id);
        }

        if($request->warehouse){
            $query->where('products.warehouse', $request->warehouse);
        }

        if($request->status == 1){
            $query->where('products.status', 1);
        }if($request->status == 0){
            $query->where('products.status', 0);

        }
        


        $product= $query->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')->get();

        //@@@@--------------------------------------------
        
        return DataTables::of($product)
        //@@@@----------------------------------------------

        
        // return DataTables::of($data) //&&---------------------------------------
        ->addIndexColumn()
        // jodi join kori ---> product model er vetor join kora ace {jeta func er age dibo ota rawcolumns er vetor dite hobe}$row->category etar nam model er function theke astac.
        //&&---------------------------start==
        // ->editColumn('category_name',function($row){
        //     return $row->category->category_name;
        // })
        // ->editColumn('subcategory_name',function($row){
        //     return $row->subcategory->subcategory_name;
        // })
        // ->editColumn('brand_name',function($row){
        //     return $row->brand->brand_name;
        // })
        //&&---------------------------------end==>
        // thumb nail er jonne opr er var er jonne use ($imgurl).
        ->editColumn('thumbnail',function($row) use ($imgurl) {
            return '<img src="'.$imgurl.'/'.$row->thumbnail.'" height="30" width="30">';
        })

        // jkhn on off kora hobe / active inactive kora hobe eta hobe ajax er maddhome==>
        ->editColumn('featured',function($row){
            if($row->featured == 1){
                // return "Yes";
                return '<a href="#" data-id="'.$row->id.'" class="deactive_featured"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';

            }else{
                return '<a href="#" data-id="'.$row->id.'" class="active_featured"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
            }
        })

        ->editColumn('today_deal',function($row){
            if($row->today_deal == 1){
                // return "Yes";
                return '<a href="#" data-id="'.$row->id.'" class="deactive_deal"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';

            }else{
                return '<a href="#" data-id="'.$row->id.'" class="active_deal"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
            }
        })

        ->editColumn('status',function($row){
            if($row->status == 1){
                // return "Yes";
                return '<a href="#"  data-id="'.$row->id.'" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';

            }else{
                return '<a href="#" data-id="'.$row->id.'" class="active_status"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
            }
        })
        ->addColumn('action', function($row){
            $actionbtn= '
            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

            <a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>

            <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            return $actionbtn;
        })
        ->rawColumns(['action','category_name','subcategory_name','brand_name','thumbnail','featured','today_deal','status'])
        ->make(true);

    }
    //select akare show korarjonne===>for search
    $category = DB::table('categories')->get();
    $brand = DB::table('brands')->get();
    $warehouse = DB::table('warehouses')->get();

    return view('admin.product.index',compact('category','brand','warehouse'));
  }

  // product notfeatured ====>
  public function notfeatured($id){
    DB::table('products')->where('id',$id)->update(['featured'=>0]);
    return response()->json('product Not Featured');
  }
    // product activefeatured ====>
    public function activefeatured($id){
        DB::table('products')->where('id',$id)->update(['featured'=>1]);
        return response()->json('product active Featured');
      }

    // product not deal ====>
  public function notdeal($id){
    DB::table('products')->where('id',$id)->update(['today_deal'=>0]);
    return response()->json('product Not today_deal');
  }
    // product active deal ====>
    public function activedeal($id){
        DB::table('products')->where('id',$id)->update(['today_deal'=>1]);
        return response()->json('product active today_deal');
      }


    // product not status ====>
  public function notstatus($id){
    DB::table('products')->where('id',$id)->update(['status'=>0]);
    return response()->json('product Not status');
  }
    // product active deal ====>
    public function activestatus($id){
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        return response()->json('product active status');
      }



}

