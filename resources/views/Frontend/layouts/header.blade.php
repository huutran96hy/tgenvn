<header class="header sticky-bar"
    style="padding:6px; background: #265c77; @if (Route::is('index')) margin-top: -6px;padding:1px; @endif">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="{{ route('index') }}">
                        <img alt="logo" src="{{ asset(\App\Models\Config::getLogo()) }}" width="25%"
                            style="width:50px" />
                    </a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li>
                            <a href="{{ route('index') }}" class="{{ Request::routeIs('index') ? 'active' : '' }}">Trang
                                chủ</a>
                        </li>
                        <li>
                            <a href="{{ route('jobs.index') }}"
                                class="{{ Request::routeIs('jobs.*') ? 'active' : '' }}">Tin tuyển dụng</a>
                        </li>
                        <li>
                            <a href="{{ route('employers.index') }}"
                                class="{{ Request::routeIs('employers.*') ? 'active' : '' }}">Nhà tuyển dụng</a>
                        </li>
                        <li>
                            <a href="{{ route('news.index') }}"
                                class="{{ Request::routeIs('news.*') ? 'active' : '' }}">Tin tức</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}"
                                class="{{ Request::routeIs('contact.index') ? 'active' : '' }}">Liên hệ</a>
                        </li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
                        class="burger-icon-bottom"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li><a class="active" href="{{ route('index') }}">Trang chủ</a>
                            </li>
                            <li><a href="{{ route('jobs.index') }}">Tin tuyển dụng</a>
                            </li>
                            <li><a href="{{ route('employers.index') }}"
                                    class="{{ Request::routeIs('employers.*') ? 'active' : '' }}">Nhà tuyển
                                    dụng</a>
                            </li>
                            <li><a href="{{ route('news.index') }}">Tin tức</a>
                            </li>
                            <li><a href="{{ route('contact.index') }}">Liên hệ</a>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
