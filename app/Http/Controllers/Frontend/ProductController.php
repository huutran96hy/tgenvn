<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $productCategory = ProductsCategory::find($product->products_category_id);
        $productCategories = ProductsCategory::all();
        $relatedProducts = Product::where('products_category_id', $product->products_category_id)
            ->where('slug', '!=', $slug)
            ->take(4)
            ->get();
        return view('frontend.product-detail', [
            'activePage' => $productCategory->slug,
            'product' => $product,
            'productCategories' => $productCategories,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
