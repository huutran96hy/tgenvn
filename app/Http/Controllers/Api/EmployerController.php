<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerResource;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the employers.
     */
    public function index()
    {
        $employers = Employer::with('user', 'jobs')->get();

        return response()->json([
            'success' => true,
            'message' => 'Employer list retrieved successfully',
            'data' => EmployerResource::collection($employers),
        ]);
    }

    /**
     * Store a newly created employer in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'website' => 'nullable|string',
            'contact_phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $employer = Employer::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Employer created successfully',
            'data' => new EmployerResource($employer),
        ], 201);
    }

    /**
     * Display the specified employer.
     */
    public function show(Employer $employer)
    {
        return response()->json([
            'success' => true,
            'message' => 'Employer retrieved successfully',
            'data' => new EmployerResource($employer),
        ]);
    }

    /**
     * Update the specified employer in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        $validated = $request->validate([
            'company_name' => 'sometimes|string',
            'company_description' => 'sometimes|string',
            'website' => 'sometimes|string',
            'contact_phone' => 'sometimes|string',
            'address' => 'sometimes|string',
        ]);

        $employer->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Employer updated successfully',
            'data' => new EmployerResource($employer),
        ]);
    }

    /**
     * Remove the specified employer from storage.
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Employer deleted successfully',
            'data' => [],
        ]);
    }
}
