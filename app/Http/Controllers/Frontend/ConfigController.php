<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConfigResource;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Lấy danh sách config.
     */
    public function index()
    {
        $configs = Config::all();
        return response()->json([
            'success' => true,
            'message' => 'Config list retrieved successfully',
            'data' => ConfigResource::collection($configs),
        ]);
    }

    /**
     * Tạo mới config.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'config_key' => 'required|string|unique:config,config_key',
            'config_value' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $config = Config::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Config created successfully',
            'data' => new ConfigResource($config),
        ], 201);
    }

    /**
     * Hiển thị chi tiết config.
     */
    public function show(Config $config)
    {
        return response()->json([
            'success' => true,
            'message' => 'Config retrieved successfully',
            'data' => new ConfigResource($config),
        ]);
    }

    /**
     * Cập nhật config.
     */
    public function update(Request $request, Config $config)
    {
        $validated = $request->validate([
            'config_value' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $config->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Config updated successfully',
            'data' => new ConfigResource($config),
        ]);
    }

    /**
     * Xóa config.
     */
    public function destroy(Config $config)
    {
        $config->delete();

        return response()->json([
            'success' => true,
            'message' => 'Config deleted successfully',
            'data' => null,
        ]);
    }
}
