<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
        $configs = Config::query();

        if ($request->has('search')) {
            $configs->where('key', 'like', '%' . $request->search . '%');
        }

        $configs = $configs->paginate(10);
        return view('Admin.pages.configs.index', compact('configs'));
    }

    public function create()
    {
        return view('Admin.pages.configs.add_edit');
    }
    public function edit(Config $config)
    {
        return view('Admin.pages.configs.add_edit', compact('config'));
    }
    public function update(Request $request, Config $config)
    {
        $request->validate([
            'value'       => 'nullable',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'banners.*'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $key = $config->key;
        $fileKeys = ['logo' => 'logos', 'icon' => 'icons'];

        // Xử lý file upload (logo/icon)
        if (isset($fileKeys[$key]) && $request->hasFile($key)) {
            Storage::disk('public')->delete($config->value);

            $path = $request->file($key)->store($fileKeys[$key], 'public');
            $config->value = $path;

            if ($key === 'logo') {
                Config::resetLogoCache();
            }
        }

        // Xử lý banners 
        elseif ($key === 'banners' && $request->hasFile('banners')) {
            $uploaded = array_map(
                fn($file) => $file->store('banners', 'public'),
                $request->file('banners')
            );
            $existing = json_decode($config->value ?? '[]', true);
            $config->value = json_encode(array_merge($existing, $uploaded));
        }

        // Xử lý input thường
        elseif ($request->has('value')) {
            $config->value = $request->input('value');
        }

        $config->save();

        return back()->with('success', 'Cấu hình đã được cập nhật.');
    }

    // public function destroy(Config $config)
    // {
    //     if ($config) {
    //         // Danh sách các key cần xóa
    //         $keysToDelete = ['logo', 'icon', 'banners'];

    //         if (in_array($config->key, $keysToDelete)) {
    //             if ($config->key === 'banners') {
    //                 $banners = json_decode($config->value ?? '[]', true);
    //                 foreach ($banners as $banner) {
    //                     Storage::disk('public')->delete($banner);
    //                 }
    //             } else {
    //                 Storage::disk('public')->delete($config->value);
    //             }
    //         }
    //         $config->delete();
    //     }

    //     return back()->with('success', 'Cấu hình đã được xóa.');
    // }

    public function deleteBanner(Request $request)
    {
        $banner = $request->input('banner');

        if ($banner && Storage::disk('public')->exists($banner)) {
            // Xóa ảnh khỏi storage
            Storage::disk('public')->delete($banner);

            $config = Config::where('key', 'banners')->first();

            if ($config) {
                $banners = json_decode($config->value, true);
                // Loại bỏ ảnh khỏi danh sách
                $banners = array_filter($banners, function ($item) use ($banner) {
                    return $item !== $banner;
                });

                $config->value = json_encode(array_values($banners));
                $config->save();
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy ảnh.'], 400);
    }
}
