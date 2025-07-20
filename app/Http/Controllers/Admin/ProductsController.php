<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\SlugCheck;

class ProductsController extends Controller
{
    use SlugCheck;
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('product_name_vi', 'like', "%{$search}%")
                    ->orWhere('product_name_en', 'like', "%{$search}%")
                    ->orWhere('product_name_ko', 'like', "%{$search}%");
            });
        }

        if ($request->filled('products_category_id')) {
            $query->where('products_category_id', $request->products_category_id);
        }

        $products = $query->paginate(10);

        $categories = ProductsCategory::all();

        return view('Admin.pages.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = ProductsCategory::all();
        $users = User::all();
        return view('Admin.pages.products.add_edit', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name_vi' => 'required|string|max:255',
            'product_name_en' => 'required|string|max:255',
            'product_name_ko' => 'required|string|max:255',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'content' => 'nullable|string',
            'products_category_id' => 'required|exists:products_categories,products_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Product::class, 'slug', 'products_id');
        $validated['slug'] = $slug;
        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Thêm mới thành công.');
    }

    public function edit(Product $product)
    {
        $categories = ProductsCategory::all();
        $users = User::all();
        return view('Admin.pages.products.add_edit', compact('product', 'categories', 'users'));
    }

    public function update(Request $request, Product $product)
    {
        $validated =  $request->validate([
            'product_name_vi' => 'required|string|max:255',
            'product_name_en' => 'required|string|max:255',
            'product_name_ko' => 'required|string|max:255',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'content' => 'nullable|string',
            'products_category_id' => 'required|exists:products_categories,products_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Product::class, 'slug', 'products_id', $product->product_id);
        $validated['slug'] = $slug;

        $product->update($validated);

        return back()->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Xóa thành công.');
    }

}
