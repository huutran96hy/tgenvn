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
                <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/logo_icon.svg" alt="">
                <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/logo_text_light.svg"
                    class="d-none d-sm-inline-block h-16px ms-3" alt="">
            </a>
        </div>

        <ul class="nav flex-row">
            <li class="nav-item d-lg-none">
                <a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill"
                    data-bs-toggle="collapse">
                    <i class="ph-magnifying-glass"></i>
                </a>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown">
                    <i class="ph-squares-four"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-scrollable-sm wmin-lg-600 p-0">
                    <div class="d-flex align-items-center border-bottom p-3">
                        <h6 class="mb-0">Browse apps</h6>
                        <a href="#" class="ms-auto">
                            View all
                            <i class="ph-arrow-circle-right ms-1"></i>
                        </a>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 g-0">
                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom p-3">
                                <div>
                                    <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/demo/logos/1.svg"
                                        class="h-40px mb-2" alt="">
                                    <div class="fw-semibold my-1">Customer data platform</div>
                                    <div class="text-muted">Unify customer data from multiple sources</div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start border-bottom p-3">
                                <div>
                                    <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/demo/logos/2.svg"
                                        class="h-40px mb-2" alt="">
                                    <div class="fw-semibold my-1">Data catalog</div>
                                    <div class="text-muted">Discover, inventory, and organize data assets</div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom border-bottom-sm-0 rounded-bottom-start p-3">
                                <div>
                                    <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/demo/logos/3.svg"
                                        class="h-40px mb-2" alt="">
                                    <div class="fw-semibold my-1">Data governance</div>
                                    <div class="text-muted">The collaboration hub and data marketplace</div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start rounded-bottom-end p-3">
                                <div>
                                    <img src="https://themes.kopyov.com/limitless/demo/template/assets/images/demo/logos/4.svg"
                                        class="h-40px mb-2" alt="">
                                    <div class="fw-semibold my-1">Data privacy</div>
                                    <div class="text-muted">Automated provisioning of non-production datasets</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside">
                    <i class="ph-chats"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">8</span>
                </a>
                <div class="dropdown-menu wmin-lg-400 p-0">
                    <!-- Nội dung dropdown Messages -->
                    <!-- (Bạn có thể rút gọn hoặc giữ nguyên đoạn code từ mẫu) -->
                </div>
            </li>
        </ul>

        <div class="navbar-collapse justify-content-center flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
            <div class="navbar-search flex-fill position-relative mt-2 mt-lg-0 mx-lg-3">
                <div class="form-control-feedback form-control-feedback-start flex-grow-1" data-color-theme="dark">
                    <input type="text" class="form-control bg-transparent rounded-pill" placeholder="Search"
                        data-bs-toggle="dropdown">
                    <div class="form-control-feedback-icon">
                        <i class="ph-magnifying-glass"></i>
                    </div>
                    <div class="dropdown-menu w-100" data-color-theme="light">
                        <!-- Nội dung tìm kiếm -->
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">
            <li class="nav-item ms-lg-2">
                <a href="#" id="toggle-theme" class="navbar-nav-link navbar-nav-link-icon rounded-pill">
                    <i id="theme-icon" class="fas fa-moon"></i> 
                </a>
            </li>
            <li class="nav-item ms-lg-2">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas"
                    data-bs-target="#notifications">
                    <i class="ph-bell"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
                </a>
            </li>
            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ asset('assets/images/demo/users/face11.jpg') }}" class="w-32px h-32px rounded-pill"
                            alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">
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
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>

                    <a href="#" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ph-sign-out me-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
