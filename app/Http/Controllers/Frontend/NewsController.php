<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Lấy danh sách tin tức.
     */
    public function index(Request $request)
    {
        $query = News::with(['category', 'author'])->where('status', 'published');

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(6);

        return view('Frontend.pages.news_list', compact('news'));
    }

    /**
     * Hiển thị chi tiết tin tức.
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        $relatedNews = News::where('news_category_id', $news->news_category_id)
            ->where('news_id', '!=', $news->news_id)
            ->where('status', 'published')
            ->limit(3)
            ->get();

        return view('Frontend.pages.news_detail', compact('news', 'relatedNews'));
    }
}
