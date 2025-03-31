<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index(Request $request)
    {
        $categories = JobCategory::all();

        $query = Job::with('employer', 'skills', 'category')->orderByDesc('created_at');

        // if ($request->has('industry') && $request->industry != 0) {
        //     $query->where('category_id', $request->industry);
        // }

        // if ($request->has('province') && !empty($request->province)) {
        //     $query->where('location', 'like', '%' . $request->province . '%');
        // }

        if ($request->has('salary_range') && !empty($request->salary_range)) {
            $range = $request->salary_range;
        
            if ($range == '>100000000') {
                $query->where('salary', '>', 100000000);
            } else {
                [$min, $max] = explode('-', $range);
                $query->whereBetween('salary', [(int) $min, (int) $max]);
            }
        }

        if ($request->has('keyword') && !empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('job_title', 'like', '%' . $request->keyword . '%');
            });
        }

        $perPage = $request->input('show', 12);
        $jobs = $query->paginate($perPage);

        return view('Frontend.pages.job_list', compact('jobs', 'categories'));
    }

    public function create()
    {
        // Nếu cần load dữ liệu cho dropdown (employers, categories) thì thực hiện tại đây
        // Ví dụ:
        // $employers = Employer::all();
        // $categories = Category::all();

        return view('admin.jobs.create'); // compact('employers', 'categories') nếu cần
    }

    /**
     * Lưu một job mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employer_id'     => 'required|integer',
            'job_title'       => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements'    => 'required|string',
            'salary'          => 'required|numeric',
            'location'        => 'required|string|max:255',
            'category_id'     => 'required|integer',
            'posted_date'     => 'required|date',
            'expiry_date'     => 'required|date|after_or_equal:posted_date',
        ]);

        // Tạo job mới
        $job = Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Hiển thị chi tiết của một job.
     */
    public function show($id)
    {
        $job = Job::with(['employer', 'category'])->findOrFail($id);
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Hiển thị form chỉnh sửa job.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        // Nếu cần load thêm dữ liệu cho dropdown (employers, categories) thì thực hiện tại đây
        // $employers = Employer::all();
        // $categories = Category::all();

        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Cập nhật job đã chỉnh sửa vào cơ sở dữ liệu.
     */
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $validatedData = $request->validate([
            'employer_id'     => 'required|integer',
            'job_title'       => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements'    => 'required|string',
            'salary'          => 'required|numeric',
            'location'        => 'required|string|max:255',
            'category_id'     => 'required|integer',
            'posted_date'     => 'required|date',
            'expiry_date'     => 'required|date|after_or_equal:posted_date',
        ]);

        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Xóa một job khỏi cơ sở dữ liệu.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
