<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCategoryResource;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Lấy danh sách loại tin tức.
     */
    public function index()
    {
        $categories = NewsCategory::all();
        return response()->json([
            'success' => true,
            'message' => 'News categories retrieved successfully',
            'data' => NewsCategoryResource::collection($categories),
        ]);
    }

    /**
     * Thêm loại tin tức mới.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|unique:news_categories,category_name',
            'description' => 'nullable|string',
        ]);

        $category = NewsCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'News category created successfully',
            'data' => new NewsCategoryResource($category),
        ], 201);
    }

    /**
     * Hiển thị chi tiết loại tin tức.
     */
    public function show(NewsCategory $newsCategory)
    {
        return response()->json([
            'success' => true,
            'message' => 'News category retrieved successfully',
            'data' => new NewsCategoryResource($newsCategory),
        ]);
    }

    /**
     * Cập nhật loại tin tức.
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|unique:news_categories,category_name,' . $newsCategory->news_category_id . ',news_category_id',
            'description' => 'nullable|string',
        ]);

        $newsCategory->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'News category updated successfully',
            'data' => new NewsCategoryResource($newsCategory),
        ]);
    }

    /**
     * Xóa loại tin tức.
     */
    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'News category deleted successfully',
            'data' => null,
        ]);
    }
}
