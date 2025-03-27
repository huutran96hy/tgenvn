<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css'])
    {{-- CDN Phosphor Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/css/icons.min.css">
    @stack('styles')
</head>

<body>

    @if (Route::currentRouteName() !== 'admin.login')
        <!-- Header -->
        @include('Admin.layouts.header')

        <!-- Nav -->
        @include('Admin.snippets.nav')
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

    <!-- Script -->
    @include('Admin.layouts.script_default')

    @stack('scripts')

</body>

</html>
