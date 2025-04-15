<header class="header sticky-bar height-header" style="padding: 5px 0px; background: #265c77;">
    <div class="container container-fix">
        <!-- Chỉ hiển thị trên mobile -->
        <div class="left-logo-mobile">
            <a href="{{ route('index') }}">
                <img alt="logo" src="{{ asset(\App\Models\Config::getLogo()) }}" style="width: 40px">
            </a>
        </div>
        <div class="main-header d-flex justify-content-between align-items-center">
            <div class="header-left d-flex align-items-center">
                <nav class="nav-main-menu">
                    <ul class="main-menu d-flex flex-wrap mb-0">
                        <li class="{{ Request::routeIs('index') ? 'tab-link-fix' : '' }}">
                            <a href="{{ route('index') }}">Trang chủ</a>
                        </li>
                        <li class="{{ request()->routeIs('jobs.best') ? 'tab-link-fix' : '' }}">
                            <a href="{{ route('jobs.best') }}">Việc làm tốt nhất</a>
                        </li>
                        <li class="{{ request()->routeIs('jobs.suggested') ? 'tab-link-fix' : '' }}">
                            <a href="{{ route('jobs.suggested') }}">Việc làm gợi ý</a>
                        </li>
                        <li class="{{ request()->routeIs('employers.top') ? 'tab-link-fix' : '' }}">
                            <a href="{{ route('employers.top') }}">Công ty hàng đầu</a>
                        </li>
                        <li class="{{ request()->routeIs('employers.suggested') ? 'tab-link-fix' : '' }}">
                            <a href="{{ route('employers.suggested') }}">Công ty đề xuất</a>
                        </li>
                        <li class="{{ Request::routeIs('news.*') ? 'tab-link-fix' : '' }}">
                            <a href="{{ route('news.index') }}">Thông tin chia sẻ</a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- Icon for mobile --}}
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>

            <div class="header-right mt-2 mt-lg-0">
                <form method="GET" id="searchForm"
                    class="custom-search-form d-flex align-items-center gap-2 position-relative">

                    <select class="custom-search-select" name="search_type" id="search_type">
                        <option value="jobs" {{ request('search_type') == 'jobs' ? 'selected' : '' }}>Việc làm
                        </option>
                        <option value="employers" {{ request('search_type') == 'employers' ? 'selected' : '' }}>Công ty
                        </option>
                    </select>

                    <input class="custom-search-input" type="text" name="keyword" placeholder="Nhập từ khoá..."
                        value="{{ request('keyword') }}">

                    <button class="custom-search-button" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Mobile version -->
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li><a class="{{ Request::routeIs('index') ? 'active' : '' }}"
                                    href="{{ route('index') }}">Trang chủ</a>
                            </li>
                            <li class="{{ request()->routeIs('jobs.best') ? 'active' : '' }}">
                                <a href="{{ route('jobs.best') }}">Việc làm tốt nhất</a>
                            </li>
                            <li class="{{ request()->routeIs('jobs.suggested') ? 'active' : '' }}">
                                <a href="{{ route('jobs.suggested') }}">Việc làm gợi ý</a>
                            </li>
                            <li class="{{ request()->routeIs('employers.top') ? 'active' : '' }}">
                                <a href="{{ route('employers.top') }}">Công ty hàng đầu</a>
                            </li>
                            <li class="{{ request()->routeIs('employers.suggested') ? 'active' : '' }}">
                                <a href="{{ route('employers.suggested') }}">Công ty đề xuất</a>
                            </li>
                            <li><a class="{{ Request::routeIs('news.*') ? 'active' : '' }}"
                                    href="{{ route('news.index') }}">Thông tin chia sẻ</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="mobile-search mt-3">
                    <form method="GET" id="mobileSearchForm" class="d-grid gap-2">
                        <div class="d-flex gap-2">
                            <input class="form-control flex-grow-1" type="text" name="keyword"
                                placeholder="Nhập từ khoá..." value="{{ request('keyword') }}">
                            <select class="form-select" name="search_type" id="mobile_search_type"
                                style="max-width: 120px;">
                                <option value="jobs" {{ request('search_type') == 'jobs' ? 'selected' : '' }}>Việc
                                    làm</option>
                                <option value="employers"
                                    {{ request('search_type') == 'employers' ? 'selected' : '' }}>Công ty</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
