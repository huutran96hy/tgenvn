<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\SlugCheck;

class EmployerController extends Controller
{
    use SlugCheck;
    public function index(Request $request)
    {
        $query = Employer::query();

        if ($request->filled('search')) {
            $query->where('company_name', 'like', '%' . $request->search . '%');
        }

        $employers = $query->paginate(10);
        return view('Admin.pages.employers.index', compact('employers'));
    }

    public function create()
    {
        // $users = User::where('role', 'employer')->get();
        $users = User::all();
        return view('Admin.pages.employers.add_edit', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'company_name' => 'required|max:255',
            'slug' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_description' => 'nullable|max:500',
            'website' => 'nullable|url',
            'contact_phone' => 'required|max:15',
            'address' => 'required|max:255',
            'email' => 'nullable',
            'founded_at' => 'nullable',
            'about' => 'nullable',
            'company_type' => 'nullable',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Employer::class, 'slug', 'employer_id');
        $validated['slug'] = $slug;

        // Lưu logo
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('employers/logos', 'public');
        }

        // Lưu bgr-img
        if ($request->hasFile('background_img')) {
            $validated['background_img'] = $request->file('background_img')->store('employers/images', 'public');
        }

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
            // 'user_id' => 'required|exists:users,id',
            'company_name' => 'required|max:255',
            'slug' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_description' => 'nullable|max:500',
            'website' => 'nullable|url',
            'contact_phone' => 'required|max:15',
            'address' => 'required|max:255',
            'email' => 'nullable',
            'founded_at' => 'nullable',
            'about' => 'nullable',
            'company_type' => 'nullable',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Employer::class, 'slug', 'employer_id', $employer->employer_id);
        $validated['slug'] = $slug;

        if ($request->hasFile('logo')) {
            // Xóa logo
            if ($employer->logo) {
                Storage::disk('public')->delete($employer->logo);
            }
            // Lưu logo
            $validated['logo'] = $request->file('logo')->store('employers/logos', 'public');
        }

        if ($request->hasFile('background_img')) {
            // Xóa bgr-img
            if ($employer->background_img) {
                Storage::disk('public')->delete($employer->background_img);
            }
            // Lưu bgr-img
            $validated['background_img'] = $request->file('background_img')->store('employers/images', 'public');
        }

        $employer->update($validated);
        return back()->with('success', 'Cập nhật công ty thành công');
    }

    public function destroy(Employer $employer)
    {
        // Xóa logo
        if ($employer->logo) {
            Storage::disk('public')->delete($employer->logo);
        }

        // Xóa bgr-img
        if ($employer->background_img) {
            Storage::disk('public')->delete($employer->background_img);
        }

        $employer->delete();
        return back()->with('success', 'Xóa công ty thành công');
    }
}
