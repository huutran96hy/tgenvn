<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TG ENC - Precision Granite Stage Technology')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('Frontendpartials.styles')
</head>
<body class="min-h-screen bg-white">
    @include('Frontendpartials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('Frontendpartials.footer')
    @include('Frontendpartials.scripts')
</body>
</html>
