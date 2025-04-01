<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;

class JobDetailController extends Controller
{
    public function index($slug)
    {
        $job = Job::with('employer', 'category', 'skills')->where('slug', $slug)->firstOrFail();
        $employer = Employer::withCount('jobs')->find($job->employer_id);

        $randomJobs = Job::with('employer', 'category', 'skills')
            ->where('job_id', '!=', $job->job_id)
            ->inRandomOrder()
            ->take(8)
            ->get();

        return view('Frontend.pages.job_detail', compact('job', 'employer', 'randomJobs'));
    }
}
