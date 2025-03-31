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

    public function update(Request $request, Config $config)
    {
        $validated = $request->validate([
            'value' => 'sometimes|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banners.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Nếu là logo, cập nhật file vào value
        if ($config->key === 'logo' && $request->hasFile('logo')) {
            // Xóa logo cũ nếu có
            if ($config->value) {
                Storage::disk('public')->delete($config->value);
            }

            // Lưu logo mới
            $logoPath = $request->file('logo')->store('logos', 'public');
            $config->update(['value' => $logoPath]);
        }

        // Nếu là banners, cập nhật dưới dạng JSON
        elseif ($config->key === 'banners' && $request->hasFile('banners')) {
            $uploadedBanners = [];
            foreach ($request->file('banners') as $file) {
                $uploadedBanners[] = $file->store('banners', 'public');
            }

            $existingBanners = json_decode($config->value ?? '[]', true);
            $allBanners = array_merge($existingBanners, $uploadedBanners);

            $config->update(['value' => json_encode($allBanners)]);
        } elseif ($request->filled('value')) {
            $config->update(['value' => $request->input('value')]);
        }

        return back()->with('success', 'Cấu hình đã được cập nhật.');
    }

    public function edit(Config $config)
    {
        return view('Admin.pages.configs.add_edit', compact('config'));
    }

    public function destroy(Config $config)
    {
        if ($config) {
            // Xóa file trong storage nếu là logo hoặc banners
            if ($config->key === 'logo') {
                Storage::disk('public')->delete($config->value);
            } elseif ($config->key === 'banners') {
                $banners = json_decode($config->value ?? '[]', true);
                foreach ($banners as $banner) {
                    Storage::disk('public')->delete($banner);
                }
            }
            $config->delete();
        }

        return back()->with('success', 'Cấu hình đã được xóa.');
    }

    public function deleteBanner(Request $request)
    {
        $banner = $request->input('banner');

        if ($banner && Storage::disk('public')->exists($banner)) {
            // Xóa ảnh khỏi storage
            Storage::disk('public')->delete($banner);

            // Cập nhật cơ sở dữ liệu (giả sử bạn đang lưu đường dẫn ảnh trong bảng configs)
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
