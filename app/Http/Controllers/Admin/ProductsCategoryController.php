<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class ProductsCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductsCategory::latest();

        if ($request->filled('search')) {
            $query->orWhere('category_name_vi', 'like', "%{$request->search}%");
            $query->orWhere('category_name_en', 'like', "%{$request->search}%");
            $query->orWhere('category_name_ko', 'like', "%{$request->search}%");
        }

        $categories = $query->paginate(10);

        return view('Admin.pages.products_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.pages.products_categories.add_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name_vi' => 'required|string|max:255|unique:products_categories,category_name_vi',
            'category_name_en' => 'required|string|max:255|unique:products_categories,category_name_en',
            'category_name_ko' => 'required|string|max:255|unique:products_categories,category_name_ko',
            'slug' => 'required|string|max:255|unique:products_categories,slug',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string'
        ]);

        ProductsCategory::create($validated);

        return redirect()->route('admin.products-categories.index')->with('success', 'Danh mục sản phẩm tạo thành công.');
    }

    public function edit(ProductsCategory $productsCategory)
    {
        return view('Admin.pages.products_categories.add_edit', compact('productsCategory'));
    }

    public function update(Request $request, ProductsCategory $productsCategory)
    {
        $validated = $request->validate([
            'category_name_vi' => 'required|string|max:255|unique:products_categories,category_name_vi,' . $productsCategory->products_category_id . ',products_category_id',
            'category_name_en' => 'required|string|max:255|unique:products_categories,category_name_en,' . $productsCategory->products_category_id . ',products_category_id',
            'category_name_ko' => 'required|string|max:255|unique:products_categories,category_name_ko,' . $productsCategory->products_category_id . ',products_category_id',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:products_categories,slug,' . $productsCategory->products_category_id . ',products_category_id'
        ]);

        $productsCategory->update($validated);

        return back()->with('success', 'Danh mục sản phẩm cập nhật thành công.');
    }

    public function destroy(ProductsCategory $productsCategory)
    {
        $productsCategory->delete();
        return back()->with('success', 'Danh mục sản phẩm xóa thành công.');
    }
}
