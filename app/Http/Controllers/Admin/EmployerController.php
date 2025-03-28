<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(Request $request)
    {
        // Lọc theo tên công ty
        $query = Employer::query();

        if ($request->filled('search')) {
            $query->where('company_name', 'like', "%" . $request->search . "%");
        }

        $employers = $query->paginate(10);

        return view('Admin.pages.employers.index', compact('employers'));
    }

    public function create()
    {
        $users = User::all();
        return view('Admin.pages.employers.add_edit', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|max:255',
            'company_description' => 'nullable|max:500',
            'website' => 'nullable|url',
            'contact_phone' => 'required|max:15',
            'address' => 'required|max:255',
        ]);

        Employer::create($validated);

        return redirect()->route('admin.employers.index')->with('success', 'Thêm công ty thành công');
    }

    public function edit(Employer $employer)
    {
        $users = User::all();
        return view('Admin.pages.employers.add_edit', compact('employer', 'users'));
    }

    public function update(Request $request, Employer $employer)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|max:255',
            'company_description' => 'nullable|max:500',
            'website' => 'nullable|url',
            'contact_phone' => 'required|max:15',
            'address' => 'required|max:255',
        ]);

        $employer->update($validated);

        return back()->with('success', 'Cập nhật công ty thành công');
    }

    public function destroy(Employer $employer)
    {
        $employer->delete();
        return back()->with('success', 'Xóa công ty thành công');
    }
}
