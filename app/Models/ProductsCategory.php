<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategory extends Model
{
    protected $table = 'products_categories';
    protected $primaryKey = 'products_category_id';
    protected $fillable = [
        'slug',
        'category_name_vi',
        'category_name_en',
        'category_name_ko',
        'description_vi',
        'description_en',
        'description_ko',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'products_category_id', 'products_category_id');
    }
}
