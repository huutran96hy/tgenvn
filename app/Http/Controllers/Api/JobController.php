<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index()
    {
        $jobs = Job::all();
        return response()->json([
            'success' => true,
            'message' => 'Job list retrieved successfully',
            'data' => JobResource::collection($jobs),
        ]);
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employer_id' => 'required|exists:employers,employer_id',
            'job_title' => 'required|string',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:job_categories,category_id',
            'posted_date' => 'required|date',
            'expiry_date' => 'required|date',
        ]);

        $job = Job::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Job created successfully',
            'data' => new JobResource($job),
        ], 201);
    }

    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        return response()->json([
            'success' => true,
            'message' => 'Job retrieved successfully',
            'data' => new JobResource($job),
        ]);
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_title' => 'sometimes|string',
            'job_description' => 'sometimes|string',
            'requirements' => 'sometimes|string',
            'salary' => 'sometimes|string',
            'location' => 'sometimes|string',
            'category_id' => 'sometimes|exists:job_categories,category_id',
            'expiry_date' => 'sometimes|date',
        ]);

        $job->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Job updated successfully',
            'data' => new JobResource($job),
        ]);
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully',
            'data' => null,
        ]);
    }
}
