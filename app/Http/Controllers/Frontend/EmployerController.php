<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerResource;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the employers.
     */
    public function index(Request $request)
    {
        $query = Employer::query()->withCount('jobs');

        // Tìm kiếm theo từ khóa
        if ($request->has('keyword') && !empty($request->keyword)) {
            $query->where('company_name', 'like', '%' . $request->keyword . '%');
        }

        // // Lọc theo ngành nghề
        // if ($request->has('industry') && $request->industry != 0) {
        //     $query->where('industry_id', $request->industry);
        // }

        // // Lọc theo tỉnh/thành phố
        // if ($request->has('province') && !empty($request->province)) {
        //     $query->where('province', $request->province);
        // }

        $sort = $request->input('sort', 'newest');
        if ($sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'rating') {
            $query->orderByDesc('rating');
        } else {
            $query->orderByDesc('created_at');
        }
        $perPage = $request->input('per_page', 12);

        $employers = $query->paginate($perPage)->appends($request->query());

        return view('Frontend.pages.employer_list', compact('employers'));
    }

    /**
     * Store a newly created employer in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'user_id' => 'required|exists:users,id',
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
        $latestJobs = $employer->jobs()->latest()->paginate(2);

        return view('Frontend.pages.employer_detail', compact('employer', 'latestJobs'));
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
