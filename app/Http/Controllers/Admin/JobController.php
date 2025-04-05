<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Traits\SlugCheck;
use Carbon\Carbon;

class JobController extends Controller
{
    use SlugCheck;
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

        // Lọc theo trạng thái phê duyệt
        if ($request->filled('approval_status')) {
            $query->where('approval_status', $request->approval_status);
        }

        $jobs = $query->paginate(10);

        return view('Admin.pages.jobs.index', compact('jobs', 'categories', 'employers'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        $employers = Employer::all();
        $allSkills = Skill::all();

        return view('Admin.pages.jobs.add_edit', compact('categories', 'employers', 'allSkills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'slug' => 'required',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:job_categories,category_id',
            'employer_id' => 'required|exists:employers,employer_id',
            'posted_date' => 'required',
            'expiry_date' => 'required|after:posted_date',
            'required_education' => 'nullable|string|max:50',
            'required_exp' => 'nullable|string|max:30',
            'job_type' => 'nullable|string|max:20',
            'approval_status' => 'nullable|in:approved,rejected,pending',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,skill_id',
        ]);

        $validated['approval_status'] = $validated['approval_status'] ?? 'pending';

        $slug = $request->input('slug');
        $slug = $this->getStorySlugExist($slug, Job::class, 'slug', 'job_id');
        $validated['slug'] = $slug;

        // Chuyển đổi ngày
        foreach (['posted_date', 'expiry_date'] as $field) {
            $validated[$field] = Carbon::createFromFormat('d-m-Y', $validated[$field])->format('Y-m-d');
        }

        $job = Job::create($validated);

        if ($request->has('skills')) {
            $job->skills()->sync($request->skills);
        }

        return redirect()->route('admin.jobs.index')->with('success', 'Công việc đã được tạo thành công.');
    }

    public function edit(Job $job)
    {
        $categories = JobCategory::all();
        $employers = Employer::all();
        $allSkills = Skill::all();

        return view('Admin.pages.jobs.add_edit', compact('job', 'categories', 'employers', 'allSkills'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'slug' => 'required',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:job_categories,category_id',
            'employer_id' => 'required|exists:employers,employer_id',
            'posted_date' => 'required',
            'expiry_date' => 'required|after:posted_date',
            'required_education' => 'nullable|string|max:50',
            'required_exp' => 'nullable|string|max:30',
            'job_type' => 'nullable|string|max:20',
            'approval_status' => 'nullable|in:approved,rejected,pending',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,skill_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Job::class, 'slug', 'job_id', $job->job_id);
        $validated['slug'] = $slug;

        // Chuyển đổi ngày
        foreach (['posted_date', 'expiry_date'] as $field) {
            $validated[$field] = Carbon::createFromFormat('d-m-Y', $validated[$field])->format('Y-m-d');
        }

        $job->update($validated);

        if ($request->has('skills')) {
            $job->skills()->sync($request->skills);
        }

        return back()->with('success', 'Công việc đã được cập nhật.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('success', 'Công việc đã bị xóa.');
    }

    public function updateStatus(Request $request, Job $job)
    {
        $request->validate([
            'approval_status' => 'required|in:pending,approved,rejected'
        ]);

        $job->update(['approval_status' => $request->approval_status]);

        return response()->json(['success' => true]);
    }
}
