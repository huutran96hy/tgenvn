<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Lấy danh sách kỹ năng cùng với các công việc liên quan.
     */
    public function index()
    {
        $skills = Skill::with('jobs')->get();

        return response()->json([
            'success' => true,
            'message' => 'Skill list retrieved successfully',
            'data' => SkillResource::collection($skills),
        ]);
    }

    /**
     * Tạo mới một kỹ năng.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'skill_name' => 'required|string|unique:skills,skill_name',
        ]);

        $skill = Skill::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Skill created successfully',
            'data' => new SkillResource($skill),
        ], 201);
    }

    /**
     * Hiển thị thông tin chi tiết của một kỹ năng cùng với danh sách công việc liên quan.
     */
    public function show(Skill $skill)
    {
        $skill->load('jobs'); 

        return response()->json([
            'success' => true,
            'message' => 'Skill retrieved successfully',
            'data' => new SkillResource($skill),
        ]);
    }

    /**
     * Cập nhật kỹ năng.
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill_name' => 'required|string|unique:skills,skill_name,' . $skill->skill_id . ',skill_id',
        ]);

        $skill->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Skill updated successfully',
            'data' => new SkillResource($skill),
        ]);
    }

    /**
     * Xóa kỹ năng.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return response()->json([
            'success' => true,
            'message' => 'Skill deleted successfully',
            'data' => null,
        ]);
    }
}
