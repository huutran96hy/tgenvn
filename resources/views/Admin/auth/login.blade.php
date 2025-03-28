@extends('Admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="content d-flex justify-content-center align-items-center">
                    <form class="login-form" action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <!-- Login form -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul style="margin: 0">
                                            @foreach ($errors->all() as $error)
                                                <li style="list-style: none">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                        <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/logo_icon.svg"
                                            class="h-48px" alt="">
                                    </div>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="email" class="form-control"
                                            placeholder="john@doe.com">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input" checked>
                                        <span class="form-check-label">Remember</span>
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->
                </div>
            </div>
        </div>
    </div>
@endsection
