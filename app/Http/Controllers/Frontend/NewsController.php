<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function list(){
        $notices = News::latest()->paginate(10);
        return view('Frontend.support-notices', [
            'notices' => $notices,
        ]);
    }

    public function detail($slug)
    {
        $notice = News::where('slug', $slug)->firstOrFail();
        return view('Frontend.customer-support-detail', [
            'notice' => $notice,
        ]);
    }
}
