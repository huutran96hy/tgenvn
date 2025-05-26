<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $employers = Employer::orderByRaw("CASE WHEN is_hot = 'yes' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->take(40)
            ->get();

        return view('Frontend.home', compact('employers'));
    }
}
