<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Limitless - Admin Dashboard')</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/pages/dashboard/progress.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/pages/dashboard/bullets.js') }}"></script>
    <!-- /theme JS files -->

    @yield('head')
</head>

<body>

    <!-- Main navbar -->
    @include('layouts.admin.header')

    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        @include('layouts.admin.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                @yield('page_header')

                <!-- Content area -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /content area -->

            </div>
            <!-- /inner content -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->

    <!-- Notifications (nếu cần) -->
    @include('layouts.admin.notifications')

    <!-- Demo config (nếu cần) -->
    @include('layouts.admin.demo_config')

    <!-- Footer -->
    @include('layouts.admin.footer')
    @yield('scripts')

</body>

</html>