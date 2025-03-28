<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Job;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::with('candidate', 'job')->latest()->paginate(10);
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
        $request->validate([
            'candidate_id' => 'required|exists:candidates,candidate_id',
            'job_id' => 'required|exists:jobs,job_id',
            'application_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:pending,accepted,rejected',
        ]);


        Application::create($request->all());
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
    public function update(Request $request, string $id)
    {
        $application = Application::findOrFail($id);

        $request->validate([
            'candidate_id' => 'required|exists:candidates,candidate_id',
            'job_id' => 'required|exists:jobs,job_id',
            'application_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $application->update($request->all());
        return back()->with('success', 'Đơn ứng tuyển đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Application::destroy($id);
        return back()->with('success', 'Đơn ứng tuyển đã được xóa.');
    }
}
