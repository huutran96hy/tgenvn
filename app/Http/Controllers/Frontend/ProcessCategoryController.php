<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProcessCategory;
use Illuminate\Http\Request;

class ProcessCategoryController extends Controller
{
     public function detail($slug)
    {
       $category = ProcessCategory::where('slug', $slug)->firstOrFail();
       $processCategories = ProcessCategory::all();
       $processes = $category->processes()->paginate(9);
        return view('Frontend.process', [
            'activePage' => $category->slug,
            'processes' => $processes,
            'processCategories' => $processCategories,
            'pageTitleVi' => $category->category_name_vi,
            'pageTitleEn' => $category->category_name_en,
            'pageTitleKo' => $category->category_name_ko,
            'pageTitle' => $category->category_name_ko, // Default to Vietnamese title
        ]);
    }
}
