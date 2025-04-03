<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with(['user', 'applications'])->get();
        return response()->json([
            'success' => true,
            'message' => 'Candidate list retrieved successfully',
            'data' => CandidateResource::collection($candidates),
        ]);
    }

    public function store(Request $request)
    {
        // if (!auth()->check()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Bạn cần đăng nhập để ứng tuyển!',
        //     ], 401);
        // }

        $validated = $request->validate([
            // 'full_name' => 'required|string',
            // 'phone' => 'required|string',
            // 'address' => 'required|string',
            // 'education' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'job_id' => 'required|exists:jobs,job_id',
        ]);

        // $validated['user_id'] = auth()->id();

        // Lưu file CV 
        if ($request->hasFile('resume')) {
            $validated['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        $candidate = Candidate::create($validated);

        $candidate->applications()->create([
            'job_id' => $validated['job_id'],
            'application_date' => now(),
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ứng tuyển thành công!',
        ], 201);
    }
    public function show(Candidate $candidate)
    {
        $candidate->load(['user', 'applications']);

        return response()->json([
            'success' => true,
            'message' => 'Candidate retrieved successfully',
            'data' => new CandidateResource($candidate),
        ]);
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            // 'full_name' => 'sometimes|string',
            // 'phone' => 'sometimes|string',
            // 'address' => 'sometimes|string',
            // 'education' => 'sometimes|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            // Xóa CV cũ 
            if ($candidate->resume) {
                Storage::disk('public')->delete($candidate->resume);
            }

            // Lưu CV mới
            $validated['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        $candidate->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Candidate updated successfully',
            'data' => new CandidateResource($candidate),
        ]);
    }

    public function destroy(Candidate $candidate)
    {
        // Xóa CV
        if ($candidate->resume) {
            Storage::disk('public')->delete($candidate->resume);
        }

        $candidate->delete();

        return response()->json([
            'success' => true,
            'message' => 'Candidate deleted successfully',
            'data' => [],
        ]);
    }
}
