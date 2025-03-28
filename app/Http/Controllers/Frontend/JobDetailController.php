<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;
class JobDetailController extends Controller
{
    public function index($jobId)
    {
        $job = Job::with('employer', 'category', 'skills')->find($jobId);

        $employer = Employer::withCount('jobs')->find($job->employer_id);

        return view('Frontend.pages.job_detail', compact('job', 'employer'));
    }
}
