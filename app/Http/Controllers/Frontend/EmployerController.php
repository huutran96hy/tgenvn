<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerResource;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Hiển thị danh sách nhà tuyển dụng.
     */
    public function index(Request $request)
    {
        return $this->getEmployerList($request);
    }

    /**
     * Hiển thị danh sách công ty hàng đầu.
     */
    public function top(Request $request)
    {
        return $this->getEmployerList($request, 'yes');
    }

    /**
     * Hiển thị danh sách công ty đề xuất.
     */
    public function suggested(Request $request)
    {
        return $this->getEmployerList($request, 'no');
    }
    private function getEmployerList(Request $request, $isHot = null)
    {
        $query = Employer::query()->withCount(['jobs' => function ($query) {
            $query->where('approval_status', 'approved');
        }]);

        if ($request->filled('keyword')) {
            $query->where('company_name', 'like', '%' . $request->keyword . '%');
        }

        $sort = $request->input('sort', 'newest');
        $query = match ($sort) {
            'oldest' => $query->orderBy('created_at', 'asc'),
            'rating' => $query->orderByDesc('rating'),
            default => $query->orderByDesc('created_at'),
        };

        // Lọc theo 'is_hot' nếu có
        if ($isHot !== null) {
            $query->where('is_hot', $isHot);
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
    public function show($slug)
    {
        $employer = Employer::where('slug', $slug)->firstOrFail();
        $latestJobs = $employer->jobs()->where('approval_status', 'approved')->latest('created_at')->paginate(2);

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
