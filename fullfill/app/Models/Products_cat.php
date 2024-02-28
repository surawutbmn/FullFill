<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products_cat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'cat_name',
    ];

    // public function products()
    // {
    //     return $this->hasMany(Products::class, 'product_category');
    // }
}
