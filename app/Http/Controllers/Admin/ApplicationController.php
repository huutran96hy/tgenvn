<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Job;
use Carbon\Carbon;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $applications = Application::with('candidate', 'job')->latest();

        if ($request->has('status') && $request->status != '') {
            $applications->where('status', $request->status);
        }

        $applications = $applications->paginate(10);

        return view('Admin.pages.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = Candidate::all();
        $jobs = Job::all();
        return view('Admin.pages.applications.add_edit', compact('candidates', 'jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidate_id' => 'required|exists:candidates,candidate_id',
            'job_id' => 'required|exists:jobs,job_id',
            'application_date' => 'required',
            'status' => 'required|in:pending,interviewed,rejected,hired',
        ]);

        // Xử lý ngày
        $validated['application_date'] = Carbon::createFromFormat(
            'd-m-Y',
            $request->input('application_date')
        )->format('Y-m-d');

        Application::create($validated);

        return redirect()->route('admin.applications.index')->with('success', 'Đơn ứng tuyển đã được thêm thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::findOrFail($id);
        $candidates = Candidate::all();
        $jobs = Job::all();
        return view('Admin.pages.applications.add_edit', compact('application', 'candidates', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'candidate_id' => 'required|exists:candidates,candidate_id',
            'job_id' => 'required|exists:jobs,job_id',
            'application_date' => 'required',
            'status' => 'required|in:pending,interviewed,rejected,hired',
        ]);

        // Xử lý ngày
        $validated['application_date'] = Carbon::createFromFormat(
            'd-m-Y',
            $request->input('application_date')
        )->format('Y-m-d');

        $application->update($validated);

        return back()->with('success', 'Đơn ứng tuyển đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return back()->with('success', 'Đơn ứng tuyển đã được xóa.');
    }
}
