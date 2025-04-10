<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Kiểm tra nếu chưa login hoặc không phải admin
        if (!$user || !in_array($user->role, [User::ADMIN_ROLE, User::CONTENT_MANAGER_ROLE])) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Bạn không có quyền truy cập!']);
        }

        return $next($request);
    }
}
