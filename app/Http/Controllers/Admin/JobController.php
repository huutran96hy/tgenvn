<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Employer;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();
        $categories = JobCategory::all();
        $employers = Employer::all();

        // Tìm kiếm theo tiêu đề công việc
        if ($request->filled('search')) {
            $query->where('job_title', 'like', "%{$request->search}%");
        }

        // Lọc theo danh mục
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo nhà tuyển dụng
        if ($request->filled('employer_id')) {
            $query->where('employer_id', $request->employer_id);
        }

        // Lọc theo vị trí
        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $jobs = $query->paginate(10);

        return view('Admin.pages.jobs.index', compact('jobs', 'categories', 'employers'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        $employers = Employer::all();
        return view('Admin.pages.jobs.add_edit', compact('categories', 'employers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:job_categories,category_id',
            'employer_id' => 'required|exists:employers,employer_id',
            'posted_date' => 'required|date',
            'expiry_date' => 'required|date|after:posted_date',
        ]);

        Job::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Công việc đã được tạo thành công.');
    }

    public function edit(Job $job)
    {
        $categories = JobCategory::all();
        $employers = Employer::all();
        return view('Admin.pages.jobs.add_edit', compact('job', 'categories', 'employers'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:job_categories,category_id',
            'employer_id' => 'required|exists:employers,employer_id',
            'posted_date' => 'required|date',
            'expiry_date' => 'required|date|after:posted_date',
        ]);

        $job->update($validated);
        return back()->with('success', 'Công việc đã được cập nhật.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('success', 'Công việc đã bị xóa.');
    }
}
