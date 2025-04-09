<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyPosition;

class CompanyPositionController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanyPosition::latest();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $positions = $query->paginate(10);

        return view('Admin.pages.company_position.index', compact('positions'));
    }

    public function create()
    {
        return view('Admin.pages.company_position.add_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:company_position',
        ]);

        CompanyPosition::create($validated);

        return redirect()->route('admin.company-position.index')->with('success', 'Position created successfully.');
    }

    public function edit(CompanyPosition $companyPosition)
    {
        return view('Admin.pages.company_position.add_edit', compact('companyPosition'));
    }

    public function update(Request $request, CompanyPosition $companyPosition)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:company_position,name,' . $companyPosition->id . ',id',
        ]);

        $companyPosition->update($validated);

        return back()->with('success', 'Position updated successfully.');
    }

    public function destroy(CompanyPosition $companyPosition)
    {
        $companyPosition->delete();
        return back()->with('success', 'Position deleted successfully.');
    }
}
