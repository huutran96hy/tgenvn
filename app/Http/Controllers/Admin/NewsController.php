<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\SlugCheck;

class NewsController extends Controller
{
    use SlugCheck;
    public function index()
    {
        $news = News::with('category', 'author')->latest()->paginate(10);
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
        dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'published_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:draft,published',
            'author_id' => 'required|exists:users,id',
            'news_category_id' => 'required|exists:news_categories,news_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, News::class, 'slug', 'news_id');
        $validated['slug'] = $slug;

        // Lưu bgr-img
        if ($request->hasFile('images')) {
            $validated['images'] = $request->file('images')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
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
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'published_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:draft,published',
            'news_category_id' => 'required|exists:news_categories,news_category_id',
        ]);

        $slug = $request->input('slug');

        $slug = $this->getStorySlugExist($slug, News::class, 'slug', 'news_id', $news->news_id);
        $validated['slug'] = $slug;

        if ($request->hasFile('images')) {
            // Xóa images
            if ($news->images) {
                Storage::disk('public')->delete($news->images);
            }
            // Lưu images
            $validated['images'] = $request->file('images')->store('news', 'public');
        }

        $news->update($validated);

        return back()->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        // Xóa iamges
        if ($news->images) {
            Storage::disk('public')->delete($news->images);
        }

        $news->delete();
        return back()->with('success', 'News deleted successfully.');
    }
}
