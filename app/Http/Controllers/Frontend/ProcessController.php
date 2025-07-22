<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\ProcessCategory;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
     public function detail($slug)
    {
        $process = Process::where('slug', $slug)->firstOrFail();
        $processCategory = ProcessCategory::find($process->process_category_id);
        $processCategories = ProcessCategory::all();
        $relatedProcesses = Process::where('process_category_id', $process->process_category_id)
            ->where('slug', '!=', $slug)
            ->take(6)
            ->get();
        return view('Frontend.process-detail', [
            'activePage' => $processCategory->slug,
            'process' => $process,
            'processCategories' => $processCategories,
            'relatedProcesses' => $relatedProcesses,
        ]);
    }
}
