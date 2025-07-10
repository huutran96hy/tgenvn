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
        $job = Job::where('slug', $slug)
            ->where('approval_status', 'approved')
            ->firstOrFail();

        $employer = Employer::withCount(['jobs' => function ($query) {
            $query->where('approval_status', 'approved');
        }])->find($job->employer_id);

        $randomJobs = Job::with([
            'employer:employer_id,logo',
            'province:id,name',
        ])
            ->where('job_id', '!=', $job->job_id)
            ->where('approval_status', 'approved')
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('Frontendpages.job_detail', compact('job', 'employer', 'randomJobs'));
    }
}
