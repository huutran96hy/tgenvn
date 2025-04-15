<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\SlugCheck;
use Carbon\Carbon;

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
            'logo' => 'nullable',
            'background_img' => 'nullable',
            'images' => 'nullable',
            'company_description' => 'nullable',
            'employer_benefit' => 'nullable',
            'website' => 'nullable|url|max:200',
            'contact_phone' => 'required|regex:/^[0-9]{10,11}$/',
            'address' => 'required|max:255',
            'email' => 'nullable|max:50',
            'founded_at' => 'nullable',
            'about' => 'nullable|max:200',
            'company_type' => 'nullable|max:600',
            'map_url' => 'nullable|string',
            'is_hot' => 'nullable|in:yes,no',
        ], [
            'contact_phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập từ 10 đến 11 chữ số.',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Employer::class, 'slug', 'employer_id');
        $validated['slug'] = $slug;

        // Xử lý ngày
        $validated['founded_at'] = Carbon::createFromFormat(
            'd-m-Y',
            $request->input('founded_at')
        )->format('Y-m-d');

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
            'logo' => 'nullable',
            'background_img' => 'nullable',
            'images' => 'nullable',
            'company_description' => 'nullable',
            'employer_benefit' => 'nullable',
            'website' => 'nullable|url',
            'contact_phone' => 'required|regex:/^[0-9]{10,11}$/',
            'address' => 'required|max:255',
            'email' => 'nullable',
            'founded_at' => 'nullable',
            'about' => 'nullable',
            'company_type' => 'nullable|max:600',
            'map_url' => 'nullable|string',
            'is_hot' => 'nullable|in:yes,no',
        ], [
            'contact_phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập từ 10 đến 11 chữ số.',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Employer::class, 'slug', 'employer_id', $employer->employer_id);
        $validated['slug'] = $slug;

        // Xử lý ngày
        $validated['founded_at'] = Carbon::createFromFormat(
            'd-m-Y',
            $request->input('founded_at')
        )->format('Y-m-d');

        $employer->update($validated);
        return back()->with('success', 'Cập nhật công ty thành công');
    }

    public function destroy(Employer $employer)
    {
        // Xóa logo
        // if ($employer->logo) {
        //     Storage::disk('public')->delete($employer->logo);
        // }

        // Xóa bgr-img
        // if ($employer->background_img) {
        //     Storage::disk('public')->delete($employer->background_img);
        // }

        $employer->delete();
        return back()->with('success', 'Xóa công ty thành công');
    }
}
