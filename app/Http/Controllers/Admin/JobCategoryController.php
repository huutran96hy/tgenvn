<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Lọc theo tên danh mục công việc
        $query = JobCategory::query();

        if ($request->filled('search')) {
            $query->where('category_name', 'like', "%" . $request->search . "%");
        }

        $categories = $query->paginate(10);

        return view('Admin.pages.job_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.pages.job_categories.add_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:job_categories,category_name|max:255',
            'description' => 'nullable|max:500',
        ]);

        JobCategory::create($validated);

        return redirect()->route('admin.job-categories.index')->with('success', 'Thêm danh mục công việc thành công');
    }

    public function edit(JobCategory $jobCategory)
    {
        return view('Admin.pages.job_categories.add_edit', compact('jobCategory'));
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:job_categories,category_name,' . $jobCategory->category_id . ',category_id|max:255',
            'description' => 'nullable|max:500',
        ]);

        $jobCategory->update($validated);

        return redirect()->route('admin.job-categories.index')->with('success', 'Cập nhật danh mục công việc thành công');
    }


    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return back()->with('success', 'Xóa danh mục công việc thành công');
    }
}
