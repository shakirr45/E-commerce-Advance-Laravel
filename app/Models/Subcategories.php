<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categories;

class Subcategories extends Model
{
    use HasFactory;

    public $table = 'subcategories';

    protected $fillable = [
        'subcategory_name',
        'subcat_slug',
        'category_id'

    ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }
}

