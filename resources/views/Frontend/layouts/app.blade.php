<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TG ENC - Precision Granite Stage Technology')</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.jpg') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    @include('Frontend.partials.styles')
</head>
<body class="min-h-screen bg-white">
    @include('Frontend.partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('Frontend.partials.footer')
    @include('Frontend.partials.scripts')
</body>
</html>
