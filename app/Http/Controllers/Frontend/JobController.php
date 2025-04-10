<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Province;
use App\Models\CompanyPosition;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index(Request $request)
    {
        $categories = JobCategory::all();
        $provinces = Province::all();
        $positions = CompanyPosition::select('id', 'name')->get();

        $query = Job::with('employer', 'skills', 'category')
            ->where('approval_status', 'approved')
            ->whereDate('expiry_date', '>=', Carbon::today());

        // Xử lý các điều kiện lọc
        $query = $this->searchJobs($request, $query);

        $perPage = $request->input('per_page', 12);

        $jobs = $query->paginate($perPage)->appends($request->query());

        return view('Frontend.pages.job_list', compact(
            'jobs',
            'categories',
            'provinces',
            'positions'
        ));
    }

    public function create()
    {
        return view('admin.jobs.create');
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
    public function searchJobs(Request $request, $query)
    {
        // Phân biệt việc làm tốt nhất và việc làm gợi ý
        if ($request->get('type') === 'best') {
            $query->where('is_hot', 'yes');
        } elseif ($request->get('type') === 'suggested') {
            $query->where('is_hot', 'no');
        }

        // Sắp xếp
        $sort = $request->input('sort', 'newest');
        if ($sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'rating') {
            $query->orderByDesc('rating');
        } else {
            $query->orderByDesc('created_at');
        }

        // Lọc theo mức lương
        if ($request->filled('salary_range')) {
            $range = $request->input('salary_range');
            if ($range === '>100000000') {
                $query->where('salary', '>', 100000000);
            } else {
                [$min, $max] = explode('-', $range);
                $query->whereBetween('salary', [(int)$min, (int)$max]);
            }
        }

        // Lọc theo từ khóa
        if ($request->filled('keyword')) {
            $query->where('job_title', 'like', '%' . $request->input('keyword') . '%');
        }

        // Lọc theo category
        if ($request->filled('job_category')) {
            $query->where('category_id', $request->input('job_category'));
        }

        // Lọc theo location
        if ($request->filled('location')) {
            $query->where('province_id', $request->input('location'));
        }

        // Lọc theo position
        if ($request->filled('position')) {
            $query->where('position_id', $request->input('position'));
        }

        return $query;
    }
}
