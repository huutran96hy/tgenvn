<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category', 'author')->latest()->paginate(10);
        $categories = NewsCategory::all();

        return view('Admin.pages.news.index', compact('news','categories'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        $users = User::all();
        return view('Admin.pages.news.add_edit', compact('categories','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'published_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:draft,published',
            'news_category_id' => 'required|exists:news_categories,news_category_id',
        ]);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_date' => $request->published_date,
            'status' => $request->status,
            'author_id' => Auth::id(),
            'news_category_id' => $request->news_category_id,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        $users = User::all();
        return view('Admin.pages.news.add_edit', compact('news', 'categories','users'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'published_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:draft,published',
            'news_category_id' => 'required|exists:news_categories,news_category_id',
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'published_date' => $request->published_date,
            'status' => $request->status,
            'news_category_id' => $request->news_category_id,
            'updated_date' => now(),
        ]);

        return back()->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('success', 'News deleted successfully.');
    }
}
