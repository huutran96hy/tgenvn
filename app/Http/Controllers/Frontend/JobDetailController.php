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
        $job = Job::with([
            'employer',
            'category:category_id,category_name',
            'skills:skill_id,skill_name'
        ])
            ->where('slug', $slug)
            ->where('approval_status', 'approved')
            ->firstOrFail();

        $employer = Employer::withCount(['jobs' => function ($query) {
            $query->where('approval_status', 'approved');
        }])->find($job->employer_id);

        $randomJobs = Job::with([
            'employer',
            'category:category_id,category_name',
            'skills:skill_id,skill_name'
        ])
            ->where('job_id', '!=', $job->job_id)
            ->where('approval_status', 'approved')
            ->inRandomOrder()
            ->take(8)
            ->get();

        return view('Frontend.pages.job_detail', compact('job', 'employer', 'randomJobs'));
    }
}
