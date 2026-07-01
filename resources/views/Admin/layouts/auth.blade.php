<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset(\App\Models\Config::getIcon()) }}" type="image/png">
    <title>Đăng nhập - Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ltr/all.min.css') }}" rel="stylesheet" type="text/css">

    @stack('styles')
</head>

<body class="auth-body">
    @yield('content')

    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
