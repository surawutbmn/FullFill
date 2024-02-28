<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_name',
        'product_name_th',
        'product_category', // Adjust the column name based on your migration
        'product_price',
        'product_img',
        'product_detail',
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    // public function category()
    // {
    //     return $this->belongsTo(Products_cat::class, 'product_category');
    // }
}
