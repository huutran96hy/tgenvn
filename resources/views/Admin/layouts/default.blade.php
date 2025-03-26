<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="google-site-verification" content="V8w8sFmQrygswApyNJy4EXuVNu-eSO85IMHIea9SHB8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/frontend/images/hamtruyen-favicon.ico" type="image/x-icon">
    <link rel="icon" href="/assets/frontend/images/hamtruyen-favicon.png" type="image/png" sizes="32x32">
    <link rel="icon" href="/assets/frontend/images/hamtruyen-favicon.svg" type="image/svg+xml">
    <title>@yield('title')</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    @stack('meta')
    <link href="{{ asset('assets/frontend/lib/css/emoji.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(mix('assets/frontend/css/nettruyen.css')) }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <!-- CSS của Owl Carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    @media only screen and (max-width: 600px) {
    .product-item__content {
        height: 265px!important;
        }
    }
    
.member {
    display: inline-block;
    position: relative;
    font-weight: bold;
    font-family: "Arial", sans-serif;
    margin-left: 3px;
    letter-spacing: 1px;
}

.member .progress-bar {
    background-color: #9312126b;
}

/* Cấu hình chung cho các cấp độ */
.member[class*="level-"] {
    position: relative;
    transition: all 0.3s ease-in-out;
}

/* ========================= Level 8 ========================= */
.member.level-8 {
    padding: 6px 12px;
    background: linear-gradient(to right, #ffd700, #ff8c00, #ff4500);
    color: white;
    border: 3px solid #ffcc00;
    box-shadow: 0 0 15px rgba(255, 215, 0, 0.9), 0 0 5px rgba(255, 140, 0, 0.8);
    letter-spacing: 1.2px;
}

.member.level-8::before,
.member.level-8::after {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    animation: sparkle 1.5s infinite alternate;
}

.member.level-8::before { content: "👑"; left: -16px; }
.member.level-8::after  { content: "🔥"; right: -16px; animation: flame 1.5s infinite alternate; }

.member.level-8:hover {
    transform: scale(1.1);
    box-shadow: 0 0 20px rgba(255, 215, 0, 1), 0 0 10px rgba(255, 140, 0, 1);
}

.member.level-8:hover::after { content: "⚡"; }

/* ========================= Level 7 ========================= */
.member.level-7 {
    padding: 5px 16px;
    background: linear-gradient(to right, #800ad4, #e30e81);
    color: white;
    border: 2.5px solid #ff4500;
    box-shadow:
        0 0 12px rgba(255, 69, 0, 0.8),
        0 0 25px rgba(227, 14, 129, 0.5),
        0 0 50px rgba(227, 14, 129, 0.3);
    font-size: 14px;
    border-radius: 8px;
    transition: all 0.35s ease-in-out;
}

.member.level-7::before,
.member.level-7::after {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    opacity: 0.9;
}

.member.level-7::before { content: "🌿"; left: -16px; }
.member.level-7::after  { content: "🌸"; right: -16px; animation: sparkle 1.5s infinite alternate; }

.member.level-7:hover {
    transform: scale(1.08);
    animation: radiant-glow 1.8s infinite alternate;
    box-shadow:
        0 0 25px rgba(255, 69, 0, 1),
        0 0 50px rgba(227, 14, 129, 0.8),
        0 0 80px rgba(255, 105, 180, 0.6);
}

.member.level-7:hover::before { content: "🍃"; transform: rotate(-15deg); }
.member.level-7:hover::after  { content: "🌺"; transform: rotate(15deg); }

/* ========================= Level 6 ========================= */
.member.level-6 {
    padding: 5px 12px;
    background: linear-gradient(to right, #ff4b1f, #ff9068);
    color: white;
    border: 2px solid #d43f00;
    box-shadow: 0 0 10px rgba(255, 77, 0, 0.7), inset 0 0 5px rgba(255, 255, 255, 0.2);
    margin-left: 10px;
}

.member.level-6::before,
.member.level-6::after {
    content: "🔥";
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #ffcc00;
    animation: glow 1.5s infinite alternate;
}

.member.level-6::before { left: -14px; }
.member.level-6::after  { right: -14px; animation: glow 1.5s infinite alternate-reverse; }

.member.level-6:hover {
    transform: scale(1.07);
    box-shadow: 0 0 15px rgba(255, 77, 0, 1), inset 0 0 8px rgba(255, 255, 255, 0.3);
}

/* ========================= Level 5 ========================= */
.member.level-5 {
    padding: 5px 10px!important;
    background: linear-gradient(to right, #4a90e2, #0056b3);
    color: white;
    border: 2px solid #004080;
    box-shadow: 0 0 8px rgba(0, 86, 179, 0.8);
}
/* ========================= Level 4 ========================= */
.member.level-4 {
    padding: 5px!important;
    background: linear-gradient(to right, #2ecc71, #27ae60);
    color: white;
    border: 1.5px solid #1e8449;
    box-shadow: 0 0 5px rgba(39, 174, 96, 0.5);
    letter-spacing: 0.8px;
}

/* ========================= Level 3 ========================= */
.member.level-3 {
    padding: 3.5px 9px;
    background: linear-gradient(to right, #f7dc6f, #f4d03f);
    color: #5c3c00;
    border: 1.5px solid #d4ac0d;
    box-shadow: 0 0 4px rgba(244, 208, 63, 0.5);
    letter-spacing: 0.7px;
}

/* ========================= Level 2 ========================= */
.member.level-2 {
    padding: 3px 8px;
    background: linear-gradient(to right, #9b59b6, #8e44ad);
    color: white;
    border-radius: 4px;
    border: 1.5px solid #732d91;
    box-shadow: 0 0 3px rgba(142, 68, 173, 0.6);
    letter-spacing: 0.6px;
}

/* ========================= Animations ========================= */
@keyframes sparkle {
    from { opacity: 0.6; transform: translateY(-50%) scale(1); }
    to   { opacity: 1; transform: translateY(-50%) scale(1.2); }
}

@keyframes radiant-glow {
    0% {
        box-shadow:
            0 0 10px rgba(255, 69, 0, 0.7),
            0 0 20px rgba(227, 14, 129, 0.4),
            0 0 40px rgba(255, 105, 180, 0.2);
    }
    100% {
        box-shadow:
            0 0 20px rgba(255, 69, 0, 0.95),
            0 0 40px rgba(227, 14, 129, 0.7),
            0 0 70px rgba(255, 105, 180, 0.5);
    }
}

/* ========================= Misc ========================= */
.comment-header {
    display: -webkit-box !important;
    overflow-x: overlay !important;
    -webkit-box-align: center;
}

  </style>
    @stack('styles')
</head>

<body id="" class="homepage vi-vn site1 {{ $customerThemeMode }}">

    <!-- Header -->
    @include('Frontend.nettruyen.layouts.header')

    <!-- Nav -->
    @include('Frontend.nettruyen.snippets.nav')

    <!-- Main -->
    @yield('content')

    <!-- Footer -->
    @include('Frontend.nettruyen.layouts.footer')

    <!-- Script -->
    @include('Frontend.nettruyen.layouts.script_default')

    @stack('scripts')

</body>

</html>
