<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu chưa login hoặc không phải admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}
