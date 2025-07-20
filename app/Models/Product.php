<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'products_id';
    protected $fillable = [
        'products_category_id',
        'slug',
        'product_name_vi',
        'product_name_en',
        'product_name_ko',
        'description_vi',
        'description_en',
        'description_ko',
        'image',
        'content',
    ];

    public function category()
    {
        return $this->belongsTo(ProductsCategory::class, 'products_category_id', 'products_category_id');
    }
}
