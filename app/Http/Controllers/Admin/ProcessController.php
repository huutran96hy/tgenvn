<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProcessCategory;
use App\Models\Process;
use App\Models\User;
use App\Traits\SlugCheck;

class ProcessController extends Controller
{
    use SlugCheck;
    public function index(Request $request)
    {
        $query = Process::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('process_name_vi', 'like', "%{$search}%")
                    ->orWhere('process_name_en', 'like', "%{$search}%")
                    ->orWhere('process_name_ko', 'like', "%{$search}%");
            });
        }

        if ($request->filled('process_category_id')) {
            $query->where('process_category_id', $request->process_category_id);
        }

        $processes = $query->paginate(10);

        $categories = ProcessCategory::all();

        return view('Admin.pages.processes.index', compact('processes', 'categories'));
    }

    public function create()
    {
        $categories = ProcessCategory::all();
        $users = User::all();
        return view('Admin.pages.processes.add_edit', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'process_name_vi' => 'required|string|max:255',
            'process_name_en' => 'required|string|max:255',
            'process_name_ko' => 'required|string|max:255',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'content' => 'nullable|string',
            'process_category_id' => 'required|exists:process_categories,process_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Process::class, 'slug', 'process_id');
        $validated['slug'] = $slug;
        Process::create($validated);

        return redirect()->route('admin.processes.index')->with('success', 'Thêm mới thành công.');
    }

    public function edit(Process $process)
    {
        $categories = ProcessCategory::all();
        $users = User::all();
        return view('Admin.pages.processes.add_edit', compact('process', 'categories', 'users'));
    }

    public function update(Request $request, Process $process)
    {
        $validated =  $request->validate([
            'process_name_vi' => 'required|string|max:255',
            'process_name_en' => 'required|string|max:255',
            'process_name_ko' => 'required|string|max:255',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ko' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'content' => 'nullable|string',
            'process_category_id' => 'required|exists:process_categories,process_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, Process::class, 'slug', 'process_id', $process->process_id);
        $validated['slug'] = $slug;

        $process->update($validated);

        return back()->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Process $process)
    {
        $process->delete();
        return back()->with('success', 'Xóa thành công.');
    }
}
