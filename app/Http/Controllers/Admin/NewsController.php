<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\SlugCheck;
use Carbon\Carbon;

class NewsController extends Controller
{
    use SlugCheck;
    public function index(Request $request)
    {
        $query = News::latest();

       if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title_vi', 'like', "%{$search}%")
                    ->orWhere('title_en', 'like', "%{$search}%")
                    ->orWhere('title_ko', 'like', "%{$search}%");
            });
        }
        $news = $query->paginate(10);
        return view('Admin.pages.news.index', compact('news'));
    }

    public function create()
    {
        $users = User::all();
        return view('Admin.pages.news.add_edit', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_vi' => 'required|string|max:255',
            'title_en'=>'required|string|max:255',
            'title_ko'=>'required|string|max:255',
            'content_vi' => 'required',
            'content_en' => 'required',
            'content_ko' => 'required',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, News::class, 'slug', 'news_id');
        $validated['slug'] = $slug;

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Thêm mới thành công.');
    }

    public function edit(News $news)
    {
        $users = User::all();
        return view('Admin.pages.news.add_edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated =  $request->validate([
            'title_vi' => 'required|string|max:255',
            'title_en'=>'required|string|max:255',
            'title_ko'=>'required|string|max:255',
            'slug' => 'required',
            'content_vi' => 'required',
            'content_en' => 'required',
            'content_ko' => 'required',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, News::class, 'slug', 'news_id', $news->news_id);
        $validated['slug'] = $slug;

        $news->update($validated);

        return back()->with('success', 'Cập nhật thành công.');
    }

    public function destroy(News $news)
    {

        $news->delete();
        return back()->with('success', 'Xóa thành công.');
    }
}
