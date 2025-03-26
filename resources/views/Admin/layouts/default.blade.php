<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    @stack('meta')
    <link href="{{ asset('assets/frontend/lib/css/emoji.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(mix('assets/frontend/css/nettruyen.css')) }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <!-- CSS của Owl Carousel -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>

<body id="" class="">

    <!-- Header -->
    @include('Admin.layouts.header')

    <!-- Nav -->
    @include('Admin.snippets.nav')

    <!-- Main -->
    @yield('content')

    <!-- Footer -->
    @include('Admin.layouts.footer')

    <!-- Script -->
    @include('Admin.layouts.script_default')

    @stack('scripts')

</body>

</html>
