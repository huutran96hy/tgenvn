<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('Admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Chỉ cho phép login nếu là admin hoặc content_manager
            if (!in_array($user->role, ['admin', 'content_manager'])) {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['error' => 'Bạn không có quyền truy cập!']);
            }
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors(['error' => 'Sai tài khoản hoặc mật khẩu']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');
    }
}
