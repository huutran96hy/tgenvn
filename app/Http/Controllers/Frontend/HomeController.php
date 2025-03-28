<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Employer;  
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $employers = Employer::all(); 

        return view('Frontend.home', compact('employers'));
    }
}
