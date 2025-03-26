<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the applications.
     */
    public function index()
    {
        $applications = Application::with(['candidate', 'job'])->get();
        return response()->json([
            'success' => true,
            'message' => 'Application list retrieved successfully',
            'data' => ApplicationResource::collection($applications),
        ]);
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidate_id' => 'required|exists:candidates,candidate_id',
            'job_id' => 'required|exists:jobs,job_id',
            'status' => 'nullable|string|in:pending,interviewed,rejected,hired',
        ]);

        $validated['application_date'] = now();

        $application = Application::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Application created successfully',
            'data' => new ApplicationResource($application),
        ], 201);
    }


    /**
     * Display the specified application.
     */
    public function show(Application $application)
    {
        return response()->json([
            'success' => true,
            'message' => 'Application retrieved successfully',
            'data' => new ApplicationResource($application),
        ]);
    }

    /**
     * Update the specified application in storage.
     */
    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,interviewed,rejected,hired',
        ]);

        $application->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully',
            'data' => new ApplicationResource($application),
        ]);
    }

    /**
     * Remove the specified application from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully',
            'data' => null,
        ]);
    }
}
