<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="index.html">
                        <img alt="ORSCorp" src="{{ asset('assets/imgs/template/logo-black.png') }}" width="25%" /></a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li class="has-children">
                            <a class="active" href="index.html">Trang chủ</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Trang chủ</a></li>
                                {{-- <li><a href="index-2">Home 2</a></li>
                                <li><a href="index-3">Home 3</a></li>
                                <li><a href="index-4">Home 4</a></li>
                                <li><a href="index-5">Home 5</a></li>
                                <li><a href="index-6">Home 6</a></li> --}}
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="jobs-grid">Tìm việc làm ?</a>
                            <ul class="sub-menu">
                                <li><a href="jobs-grid">Backend Developer</a></li>
                                <li><a href="job-details">Hardware Developer</a></li>
                                <li><a href="job-details-2">Senior DevOps</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="companies-grid">Tuyển dụng</a>
                            <ul class="sub-menu">
                                <li><a href="companies-grid">Thông tin tuyển dụng</a></li>
                                <li><a href="company-details">Danh sách công ty</a></li>
                            </ul>
                        </li>
                        {{-- <li class="has-children"><a href="candidates-grid">Candidates</a>
                            <ul class="sub-menu">
                                <li><a href="candidates-grid">Candidates Grid</a></li>
                                <li><a href="candidate-details">Candidate Details</a></li>
                                <li><a href="candidate-profile">Candidate Profile</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="blog-grid">Về chúng tôi</a>
                            <ul class="sub-menu">
                                <li><a href="page-about">Giới thiệu</a></li>
                                <li><a href="page-pricing">Kế hoạch phát triển</a></li>
                                <li><a href="page-contact">Liên hệ</a></li>
                                <li><a href="page-Đăng ký">Đăng ký</a></li>
                                <li><a href="page-signin">Đăng nhập</a></li>
                                <li><a href="page-reset-password">Reset Password</a></li>
                                <li><a href="page-content-protected">Content Protected</a></li>
                                <li><a href="page-404">404 Error</a></li>
                            </ul>
                        </li> --}}
                        <li class="has-children">
                            <a href="blog-grid">Tin tức</a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid">Dự án triển khai</a></li>
                                <li><a href="blog-grid-2">Tin tức</a></li>
                                <li><a href="blog-details">Thông tin tuyển dụng</a></li>
                            </ul>
                        </li>
                        {{-- <li class="dashboard"><a href="http://wp.alithemes.com/html/ORSCorp/demos/dashboard"
                                target="_blank">Dashboard</a></li> --}}
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
                        class="burger-icon-bottom"></span>
                </div>
            </div>
            {{-- <div class="header-right">
                <div class="block-signin"><a class="text-link-bd-btom hover-up" href="page-Đăng ký">Đăng ký</a><a
                        class="btn btn-default btn-shadow ml-20 hover-up" href="page-signin">Đăng nhập</a></div>
            </div> --}}
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class="active" href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2">Home 2</a></li>
                                    <li><a href="index-3">Home 3</a></li>
                                    <li><a href="index-4">Home 4</a></li>
                                    <li><a href="index-5">Home 5</a></li>
                                    <li><a href="index-6">Home 6</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="jobs-grid">Find a Job</a>
                                <ul class="sub-menu">
                                    <li><a href="jobs-grid">Jobs Grid</a></li>
                                    <li><a href="jobs-list">Jobs List</a></li>
                                    <li><a href="job-details">Jobs Details</a></li>
                                    <li><a href="job-details-2">Jobs Details 2</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="companies-grid">Recruiters</a>
                                <ul class="sub-menu">
                                    <li><a href="companies-grid">Recruiters</a></li>
                                    <li><a href="company-details">Company Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="candidates-grid">Candidates</a>
                                <ul class="sub-menu">
                                    <li><a href="candidates-grid">Candidates Grid</a></li>
                                    <li><a href="candidate-details">Candidate Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="blog-grid">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="page-about">About Us</a></li>
                                    <li><a href="page-pricing">Pricing Plan</a></li>
                                    <li><a href="page-contact">Contact Us</a></li>
                                    <li><a href="page-register">Register</a></li>
                                    <li><a href="page-signin">Signin</a></li>
                                    <li><a href="page-reset-password">Reset Password</a></li>
                                    <li><a href="page-content-protected">Content Protected</a></li>
                                    <li><a href="page-404">404 Error</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="blog-grid">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid">Blog Grid</a></li>
                                    <li><a href="blog-grid-2">Blog Grid 2</a></li>
                                    <li><a href="blog-details">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="http://wp.alithemes.com/html/jobbox/demos/dashboard"
                                    target="_blank">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Work Preferences</a></li>
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Go Pro</a></li>
                        <li><a href="page-signin">Sign Out</a></li>
                    </ul>
                </div>
                <div class="site-copyright">Copyright 2022 &copy; JobBox.<br>Designed by OuranSoft.</div>
            </div>
        </div>
    </div>
</div>

{{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="assets/imgs/template/loading.gif" alt="jobBox"></div>
        </div>
    </div>
</div> --}}
