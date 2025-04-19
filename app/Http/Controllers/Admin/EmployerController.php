<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\SlugCheck;
use Carbon\Carbon;
use App\Http\Requests\StoreEmployerRequest;

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

    public function store(StoreEmployerRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = $this->getStorySlugExist(
            $validated['slug'],
            Employer::class,
            'slug',
            'employer_id'
        );

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

    public function update(StoreEmployerRequest $request, Employer $employer)
    {
        $validated = $request->validated();

        $validated['slug'] = $this->getStorySlugExist(
            $validated['slug'],
            Employer::class,
            'slug',
            'employer_id',
            $employer->employer_id
        );

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
        $employer->delete();
        return back()->with('success', 'Xóa công ty thành công');
    }
}
