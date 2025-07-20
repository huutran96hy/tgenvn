<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProcessCategory;

class ProcessCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProcessCategory::latest();

        if ($request->filled('search')) {
            $query->orWhere('category_name_vi', 'like', "%{$request->search}%");
            $query->orWhere('category_name_en', 'like', "%{$request->search}%");
            $query->orWhere('category_name_ko', 'like', "%{$request->search}%");
        }

        $categories = $query->paginate(10);

        return view('Admin.pages.process_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.pages.process_categories.add_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name_vi' => 'required|string|max:255|unique:process_categories,category_name_vi',
            'category_name_en' => 'required|string|max:255|unique:process_categories,category_name_en',
            'category_name_ko' => 'required|string|max:255|unique:process_categories,category_name_ko',
            'slug' => 'required|string|max:255|unique:process_categories,slug',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string'
        ]);

        ProcessCategory::create($validated);

        return redirect()->route('admin.process-categories.index')->with('success', 'Danh mục quy trình tạo thành công.');
    }

    public function edit(ProcessCategory $processCategory)
    {
        return view('Admin.pages.process_categories.add_edit', compact('processCategory'));
    }

    public function update(Request $request, ProcessCategory $processCategory)
    {
        $validated = $request->validate([
            'category_name_vi' => 'required|string|max:255|unique:process_categories,category_name_vi,' . $processCategory->process_category_id . ',process_category_id',
            'category_name_en' => 'required|string|max:255|unique:process_categories,category_name_en,' . $processCategory->process_category_id . ',process_category_id',
            'category_name_ko' => 'required|string|max:255|unique:process_categories,category_name_ko,' . $processCategory->process_category_id . ',process_category_id',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:process_categories,slug,' . $processCategory->process_category_id . ',process_category_id'
        ]);

        $processCategory->update($validated);

        return back()->with('success', 'Danh mục quy trình cập nhật thành công.');
    }

    public function destroy(ProcessCategory $processCategory)
    {
        $processCategory->delete();
        return back()->with('success', 'Danh mục quy trình xóa thành công.');
    }
}
