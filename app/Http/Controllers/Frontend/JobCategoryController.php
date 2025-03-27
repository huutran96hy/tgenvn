<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobCategoryResource;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the job categories.
     */
    public function index()
    {
        $job_categories = JobCategory::all();
        return response()->json([
            'success' => true,
            'message' => 'Job categories retrieved successfully',
            'data' => JobCategoryResource::collection($job_categories),
        ]);
    }

    /**
     * Store a newly created job category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|unique:job_categories,category_name',
            'description' => 'nullable|string',
        ]);

        $job_category = JobCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Job category created successfully',
            'data' => new JobCategoryResource($job_category),
        ], 201);
    }

    /**
     * Display the specified job category.
     */
    public function show(JobCategory $jobCategory)
    {
        return response()->json([
            'success' => true,
            'message' => 'Job category retrieved successfully',
            'data' => new JobCategoryResource($jobCategory),
        ]);
    }

    /**
     * Update the specified job category in storage.
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
        $validated = $request->validate([
            'category_name' => 'sometimes|string|unique:job_categories,category_name,' . $jobCategory->category_id . ',category_id',
            'description' => 'sometimes|string',
        ]);

        $jobCategory->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Job category updated successfully',
            'data' => new JobCategoryResource($jobCategory),
        ]);
    }

    /**
     * Remove the specified job category from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job category deleted successfully',
            'data' => null,
        ]);
    }
}
