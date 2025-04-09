<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Models\CompanyPosition;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Employer;
use App\Models\Province;
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
        $provinces = Province::all();
        $positions = CompanyPosition::all();

        return view('Admin.pages.jobs.add_edit', compact(
            'categories',
            'employers',
            'allSkills',
            'provinces',
            'positions'
        ));
    }

    public function store(StoreJobRequest $request)
    {
        $validated = $request->validated();

        $validated['approval_status'] = $validated['approval_status'] ?? 'pending';

        $validated['slug'] = $this->getStorySlugExist(
            $validated['slug'],
            Job::class,
            'slug',
            'job_id'
        );

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
        $provinces = Province::all();
        $positions = CompanyPosition::all();

        return view('Admin.pages.jobs.add_edit', compact(
            'job',
            'categories',
            'employers',
            'allSkills',
            'provinces',
            'positions'
        ));
    }
    public function update(StoreJobRequest $request, Job $job)
    {
        $validated = $request->validated();

        $validated['slug'] = $this->getStorySlugExist(
            $validated['slug'],
            Job::class,
            'slug',
            'job_id',
            $job->job_id // tránh trùng slug chính nó
        );

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
