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
        $query = News::with('category', 'author')->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        if ($request->filled('news_category_id')) {
            $query->where('news_category_id', $request->news_category_id);
        }

        $news = $query->paginate(10);

        $categories = NewsCategory::all();

        return view('Admin.pages.news.index', compact('news', 'categories'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        $users = User::all();
        return view('Admin.pages.news.add_edit', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'nullable',
            'content' => 'required',
            'published_date' => 'required',
            'status' => 'required|in:draft,published',
            'author_id' => 'required|exists:users,id',
            'news_category_id' => 'required|exists:news_categories,news_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, News::class, 'slug', 'news_id');
        $validated['slug'] = $slug;

        $validated['published_date'] = Carbon::createFromFormat(
            'd-m-Y',
            $request->input('published_date')
        )->format('Y-m-d');

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Thêm mới thành công.');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        $users = User::all();
        return view('Admin.pages.news.add_edit', compact('news', 'categories', 'users'));
    }

    public function update(Request $request, News $news)
    {
        $validated =  $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required',
            'images' => 'nullable',
            'content' => 'required',
            'published_date' => 'required',
            'status' => 'required|in:draft,published',
            'author_id' => 'required|exists:users,id',
            'news_category_id' => 'required|exists:news_categories,news_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, News::class, 'slug', 'news_id', $news->news_id);
        $validated['slug'] = $slug;

        // Xử lý ngày
        $validated['published_date'] = Carbon::createFromFormat(
            'd-m-Y',
            $request->input('published_date')
        )->format('Y-m-d');

        $news->update($validated);

        return back()->with('success', 'Cập nhật thành công.');
    }

    public function destroy(News $news)
    {
        // Xóa iamges
        // if ($news->images) {
        //     Storage::disk('public')->delete($news->images);
        // }

        $news->delete();
        return back()->with('success', 'Xóa thành công.');
    }

    public function updateStatus(Request $request, News $news)
    {
        $request->validate([
            'status' => 'required|in:draft,published'
        ]);

        $news->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }
}
