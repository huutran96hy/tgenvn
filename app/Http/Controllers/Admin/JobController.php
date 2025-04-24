<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Services\JobService;
use App\Traits\SlugCheck;

class JobController extends Controller
{
    use SlugCheck;

    protected JobService $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index(Request $request)
    {
        $jobs = $this->jobService->searchJobs($request);
        $categories = $this->jobService->getCategories();
        $employers = $this->jobService->getEmployers();

        return view('Admin.pages.jobs.index', compact('jobs', 'categories', 'employers'));
    }

    public function create()
    {
        return view('Admin.pages.jobs.add_edit', $this->jobService->getFormData());
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

        $this->jobService->createJob($validated, $request->skills);

        return redirect()->route('admin.jobs.index')->with('success', 'Công việc đã được tạo thành công.');
    }

    public function edit(Job $job)
    {
        return view('Admin.pages.jobs.add_edit', array_merge(
            $this->jobService->getFormData(),
            ['job' => $job]
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
            $job->job_id
        );

        $this->jobService->updateJob($job, $validated, $request->skills);

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
    public function bulkUpdate(Request $request)
    {
        $ids = $request->input('ids', []);
        $status = $request->input('status');
        $selectAll = $request->boolean('select_all');

        if ($status && ($selectAll || count($ids))) {
            $this->jobService->bulkUpdateStatus($ids, $status, $selectAll);
            return $this->jsonSuccess('Cập nhật trạng thái thành công!');
        }

        return $this->jsonError('Có lỗi xảy ra khi cập nhật trạng thái.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        $selectAll = $request->boolean('select_all');

        if ($selectAll || count($ids)) {
            $this->jobService->bulkDelete($ids, $selectAll);
            return $this->jsonSuccess('Xóa công việc thành công!');
        }

        return $this->jsonError('Có lỗi xảy ra khi xóa công việc.');
    }

    private function jsonSuccess(string $message)
    {
        return response()->json(['success' => true, 'message' => $message]);
    }

    private function jsonError(string $message)
    {
        return response()->json(['success' => false, 'message' => $message]);
    }
}
