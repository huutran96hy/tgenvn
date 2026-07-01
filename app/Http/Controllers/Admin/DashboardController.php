<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard', [
            'stats' => [
                'products' => Product::count(),
                'processes' => Process::count(),
            ],
        ]);
    }
}
