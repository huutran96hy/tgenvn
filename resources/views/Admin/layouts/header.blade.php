<!-- Main navbar -->
<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 flex-lg-0">
            <a href="{{ url('admin') }}" class="d-inline-flex align-items-center">

                <span class="fw-bold fs-5 ms-2" style="color:#fff">Admin</span>
            </a>
        </div>

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">
            {{-- <li class="nav-item ms-lg-2">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas"
                    data-bs-target="#notifications">
                    <i class="ph-bell"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
                </a>
            </li> --}}
            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ asset('assets/images/demo/users/face9.jpg') }}" class="w-32px h-32px rounded-pill"
                            alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2">
                        {{ Auth::check() ? ucfirst(Auth::user()->name) : '' }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        My profile
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ph-envelope-open me-2"></i>
                        My inbox
                        <span class="badge bg-primary rounded-pill ms-auto">26</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Account settings
                    </a> --}}
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a href="#" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ph-sign-out me-2"></i>
                        Đăng xuất
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>