<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Kiểm tra nếu chưa login hoặc không phải admin, content_manager

        if (!$user || !in_array($user->role, [User::ADMIN_ROLE, User::CONTENT_MANAGER_ROLE])) {

            return redirect()->route('admin.login');
        }

        // Nếu là admin,content_manager → Chuyển hướng về dashboard
        return redirect()->route('admin.dashboard');
    }
}
