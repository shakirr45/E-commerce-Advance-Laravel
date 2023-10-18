<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// for join =====>
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\PickupPoint;





class Product extends Model
{
    use HasFactory;

    // For joining ===>
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'pickup_point_id',
        'name',
        'code',
        'unit',
        'tags',
        'color',
        'size',
        'video',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'warehouse',
        'description',
        'thumbnail',
        'images',
        'featured',
        'today_deal',
        'status',
        'admin_id'
    ];

    // // For join======>go to modal jgula join krte cassci okhne fillable gula use krte hobe
////////////////////
// =====================check heAD===============
/////////////
////////////////////
    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategories::class, 'subcategory_id');
    }

    public function childcategory(){
        return $this->belongsTo(Childcategory::class, 'childcategory_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function pickupPoint(){
        return $this->belongsTo(PickupPoint::class, 'pickup_point_id');
    }
}				



