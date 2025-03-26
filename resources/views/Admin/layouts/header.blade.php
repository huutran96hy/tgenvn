<header class="header" id="header">
    <div class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a class="logo" title="Truyện tranh online" href="{{ route('home') }}">
                        <img alt="Logo Truyện"
                            style="width: 100%; height: 100%; max-width: 150px; max-height: 40px; object-fit: contain;"
                            src="{{ asset(\App\Models\Setting::getLogo()) }}" loading="lazy" />
                    </a>
                </div>
                <div class="navbar-form navbar-left hidden-xs search-box comicsearchbox">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="keyword" class="searchinput form-control common-search"
                                placeholder="Tìm truyện..." autocomplete="off">
                            <div class="input-group-btn">
                                <input type="submit" value="" class="searchbutton btn btn-default" />
                            </div>
                        </div>
                        <!-- Dropdown to display search suggestions -->
                        <div class="suggestsearch" style="display: none;top:40px">
                            <ul id="search-suggestions" class="search-suggestions"></ul>
                        </div>
                    </form>
                </div>
                <i id="darkModeToggle" class="fa fa-lightbulb toggle-dark toggle-button"></i>

                <style>
                    .icon-notification {
                        position: relative;
                    }

                    .notification-indicator {
                        position: absolute;
                        width: 18px;
                        height: 18px;
                        background: tomato;
                        border-radius: 50%;
                        color: #fff;
                        font-size: 10px;
                        font-weight: bold;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        top: 7px;
                        /* padding-top: 2px; */
                        right: -10px;
                    }
                </style>
                <div class="notifications">
                    <a href="{{ route('notification') }}" title="Thông báo">
                        <i class="fa fa-comment"></i>
                    </a>
                    @if (Auth::guard('customer')->check() && $notifications->where('status', App\Models\Notification::UNREAD)->count() > 0)
                        <span class="notification-indicator">
                            @php
                                $countNoti = $notifications->where('status', App\Models\Notification::UNREAD)->count();
                                echo $countNoti > 9 ? '9+' : $countNoti;
                            @endphp
                        </span>
                    @endif
                </div>
                <button type="button" class="search-button-icon search-button-icon-mb visible-xs" aria-label="Search">
                    <i class="fa fa-search"></i>
                </button>
                <button type="button" class="navbar-toggle hambuger-mb" aria-label="Menu">
                    <i class="fa fa-bars"></i>
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <ul class="nav-account list-inline hidden-xs pull-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="user-menu fn-userbox dropdown-toggle">
                        <i class="fa fa-user"></i>
                        <span>Tài khoản</span>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @include('Frontend.nettruyen.snippets.login_check')
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
