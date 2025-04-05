<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $query = Skill::orderBy('skill_id', 'asc');

        if ($request->filled('search')) {
            $query->where('skill_name', 'like', "%{$request->search}%");
        }

        $skills = $query->paginate(10);

        return view('Admin.pages.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('Admin.pages.skills.add_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'skill_name' => 'required|string|max:255|unique:skills,skill_name'
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Kỹ năng đã được thêm.');
    }

    public function edit(Skill $skill)
    {
        return view('Admin.pages.skills.add_edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill_name' => 'required|string|max:255|unique:skills,skill_name,' . $skill->skill_id
        ]);

        $skill->update($validated);

        return back()->with('success', 'Kỹ năng đã được cập nhật.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Kỹ năng đã được xóa.');
    }
}
