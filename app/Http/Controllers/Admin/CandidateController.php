<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Hiển thị danh sách ứng viên.
     */
    public function index()
    {
        $candidates = Candidate::with('user')->latest()->paginate(10);
        return view('Admin.pages.candidates.index', compact('candidates'));
    }

    /**
     * Hiển thị form tạo ứng viên mới.
     */
    public function create()
    {
        return view('Admin.pages.candidates.add_edit');
    }

    /**
     * Lưu ứng viên mới vào database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone'     => 'required|string|max:15',
            'address'   => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'education' => 'nullable|string',
        ]);

        // Lưu CV
        if ($request->hasFile('resume')) {
            $validated['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        Candidate::create($validated + ['user_id' => Auth::id()]);

        return redirect()->route('admin.candidates.index')->with('success', 'Ứng viên đã được thêm thành công.');
    }
    /**
     * Hiển thị form chỉnh sửa ứng viên.
     */
    public function edit(Candidate $candidate)
    {
        return view('Admin.pages.candidates.add_edit', compact('candidate'));
    }

    /**
     * Cập nhật thông tin ứng viên.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone'     => 'required|string|max:15',
            'address'   => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',

            'education' => 'nullable|string',
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

        return back()->with('success', 'Ứng viên đã được cập nhật.');
    }

    /**
     * Xóa ứng viên khỏi hệ thống.
     */
    public function destroy(Candidate $candidate)
    {
        // Xóa CV
        if ($candidate->resume) {
            Storage::disk('public')->delete($candidate->resume);
        }

        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Ứng viên đã được xóa.');
    }
}
