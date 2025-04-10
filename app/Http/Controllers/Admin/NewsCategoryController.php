<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsCategory::latest();

        if ($request->filled('search')) {
            $query->where('category_name', 'like', "%{$request->search}%");
        }

        $categories = $query->paginate(10);

        return view('Admin.pages.news_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.pages.news_categories.add_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:news_categories',
            'description' => 'nullable|string',
        ]);

        NewsCategory::create($validated);

        return redirect()->route('admin.news-categories.index')->with('success', 'Danh mục tin tức tạo thành công.');
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('Admin.pages.news_categories.add_edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:news_categories,category_name,' . $newsCategory->news_category_id . ',news_category_id',
            'description' => 'nullable|string',
        ]);

        $newsCategory->update($validated);

        return back()->with('success', 'Danh mục tin tức cập nhật thành công.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();
        return back()->with('success', 'Danh mục tin tức xóa thành công.');
    }
}
