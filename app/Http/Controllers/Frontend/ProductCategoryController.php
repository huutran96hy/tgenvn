<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function detail($slug)
    {
       $category = ProductsCategory::where('slug', $slug)->firstOrFail();
       $productCategories = ProductsCategory::all();
       $products = $category->products()->paginate(9);
        return view('Frontend.product-category', [
            'activePage' => $category->slug,
            'products' => $products,
            'productCategories' => $productCategories,
        ]);
    }
}
