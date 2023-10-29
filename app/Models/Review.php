<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



// for join =====>
use App\Models\Product;
use App\Models\User;


class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'review',
        'rating',
        'review_date',
        'review_year'
    ];

    // =====================check heaD===============
        public function user(){
            return $this->belongsTo(User::class, 'user_id');
        }
        public function product(){
            return $this->belongsTo(Product::class, 'product_id');
        }
}




