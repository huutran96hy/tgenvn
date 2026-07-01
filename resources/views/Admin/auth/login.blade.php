@extends('Admin.layouts.auth')

@push('styles')
    <style>
        .auth-body {
            margin: 0;
            min-height: 100vh;
            font-family: Inter, system-ui, -apple-system, sans-serif;
            background: #f4f6fb;
        }

        .auth-page {
            min-height: 100vh;
            display: flex;
        }

        .auth-brand {
            flex: 1.05;
            position: relative;
            display: none;
            overflow: hidden;
            color: #fff;
            padding: 3rem;
            background:
                radial-gradient(circle at 20% 20%, rgba(96, 165, 250, 0.35), transparent 45%),
                radial-gradient(circle at 80% 0%, rgba(14, 165, 233, 0.25), transparent 40%),
                linear-gradient(145deg, #0f172a 0%, #1e3a8a 52%, #2563eb 100%);
        }

        .auth-brand::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.45;
        }

        .auth-brand-content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .auth-brand-logo {
            width: 72px;
            height: 72px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.25);
        }

        .auth-brand-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .auth-brand-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 1rem;
        }

        .auth-brand-desc {
            max-width: 420px;
            font-size: 1.05rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.82);
        }

        .auth-brand-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .auth-brand-badge {
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.14);
            font-size: 0.875rem;
            backdrop-filter: blur(6px);
        }

        .auth-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.25rem;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: #fff;
            border-radius: 24px;
            padding: 2.25rem;
            box-shadow:
                0 20px 45px rgba(15, 23, 42, 0.08),
                0 2px 10px rgba(15, 23, 42, 0.04);
            border: 1px solid rgba(148, 163, 184, 0.18);
        }

        .auth-card-header {
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .auth-card-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 0.5rem;
        }

        .auth-card-header p {
            margin: 0;
            color: #64748b;
            font-size: 0.95rem;
        }

        .auth-alert {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.9rem 1rem;
            border-radius: 14px;
            margin-bottom: 1.25rem;
            font-size: 0.925rem;
            line-height: 1.5;
        }

        .auth-alert-danger {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .auth-alert-success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .auth-field {
            margin-bottom: 1.15rem;
        }

        .auth-field label {
            display: block;
            margin-bottom: 0.45rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
        }

        .auth-input-wrap {
            position: relative;
        }

        .auth-input-wrap i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .auth-input {
            width: 100%;
            height: 3rem;
            padding: 0 1rem 0 2.85rem;
            border: 1px solid #dbe3ef;
            border-radius: 14px;
            background: #f8fafc;
            color: #0f172a;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .auth-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
        }

        .auth-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1.25rem 0 1.5rem;
        }

        .auth-remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #475569;
            font-size: 0.9rem;
            cursor: pointer;
            user-select: none;
        }

        .auth-remember input {
            width: 1rem;
            height: 1rem;
            accent-color: #2563eb;
        }

        .auth-submit {
            width: 100%;
            height: 3rem;
            border: 0;
            border-radius: 14px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.25);
        }

        .auth-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 28px rgba(37, 99, 235, 0.28);
        }

        .auth-submit:active {
            transform: translateY(0);
        }

        .auth-footer {
            margin-top: 1.5rem;
            text-align: center;
            color: #94a3b8;
            font-size: 0.82rem;
        }

        @media (min-width: 992px) {
            .auth-brand {
                display: flex;
            }
        }
    </style>
@endpush

@section('content')
    <div class="auth-page">
        <aside class="auth-brand">
            <div class="auth-brand-content">
                <div>
                    <div class="auth-brand-logo">
                        <img src="{{ asset(\App\Models\Config::getLogo()) }}" alt="Logo">
                    </div>
                </div>

                <div>
                    <h2 class="auth-brand-title">Hệ thống quản trị<br>TGEN Vietnam</h2>
                    <p class="auth-brand-desc">
                        Quản lý nội dung, sản phẩm và quy trình một cách nhanh chóng, an toàn và trực quan.
                    </p>
                </div>

                <div class="auth-brand-badges">
                    <span class="auth-brand-badge"><i class="ph-shield-check me-1"></i> Bảo mật</span>
                    <span class="auth-brand-badge"><i class="ph-chart-line-up me-1"></i> Thống kê</span>
                    <span class="auth-brand-badge"><i class="ph-gear-six me-1"></i> Quản lý</span>
                </div>
            </div>
        </aside>

        <main class="auth-panel">
            <div class="auth-card">
                <div class="auth-card-header">
                    <h1>Đăng nhập</h1>
                    <p>Nhập thông tin tài khoản để truy cập trang quản trị</p>
                </div>

                @if ($errors->any())
                    <div class="auth-alert auth-alert-danger">
                        <i class="ph-warning-circle fs-5"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="auth-alert auth-alert-success">
                        <i class="ph-check-circle fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <div class="auth-field">
                        <label for="username">Tài khoản</label>
                        <div class="auth-input-wrap">
                            <i class="ph-user"></i>
                            <input
                                id="username"
                                type="text"
                                name="username"
                                class="auth-input"
                                placeholder="Nhập tên đăng nhập"
                                value="{{ old('username') }}"
                                required
                                autofocus
                            >
                        </div>
                    </div>

                    <div class="auth-field">
                        <label for="password">Mật khẩu</label>
                        <div class="auth-input-wrap">
                            <i class="ph-lock-key"></i>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="auth-input"
                                placeholder="Nhập mật khẩu"
                                required
                            >
                        </div>
                    </div>

                    <div class="auth-options">
                        <label class="auth-remember">
                            <input type="checkbox" name="remember" {{ old('remember', true) ? 'checked' : '' }}>
                            <span>Ghi nhớ đăng nhập</span>
                        </label>
                    </div>

                    <button type="submit" class="auth-submit">Đăng nhập</button>
                </form>

                <div class="auth-footer">
                    © {{ date('Y') }} TGEN Vietnam Admin
                </div>
            </div>
        </main>
    </div>
@endsection
