<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset(\App\Models\Config::getIcon()) }}" type="image/png">
    <title>@yield('title', 'Admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')

    <!-- Global stylesheets -->
    <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">

    <!-- Core JS files -->
    <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/pages/dashboard/progress.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/pages/dashboard/bullets.js') }}"></script>
</head>

<body>
    @if (Route::currentRouteName() !== 'admin.login')
        <!-- Header -->
        @include('Admin.layouts.header')
    @endif

    <!-- Main -->
    <div class="page-content">
        @if (Route::is('admin.login'))
            @yield('content')
        @else
            @include('Admin.snippets.sidebar')
            <div class="content-wrapper">
                <div class="content-inner">
                    @yield('content')
                    @include('Admin.layouts.footer')
                </div>
            </div>
        @endif
    </div>

    <!-- Notifications (nếu cần) -->
    @include('Admin.layouts.notifications')

    <!-- Demo config (nếu cần) -->
    {{-- @include('Admin.layouts.demo_config') --}}

    <!-- Footer -->
    {{-- @include('Admin.layouts.footer') --}}

    @include('Admin.layouts.script_default')

    @stack('scripts')
</body>

</html>
