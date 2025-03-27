<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->

        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Ví dụ danh mục menu -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin') }}" class="nav-link active">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                            <span class="d-block fw-normal opacity-50">No pending orders</span>
                        </span>
                    </a>
                </li>

                <!-- Tables -->
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Tables</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                @php
                    function isActive($route)
                    {
                        return request()->routeIs($route) ? 'active' : '';
                    }
                @endphp

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ isActive('admin.users.*') }}">
                        <i class="ph-table"></i>
                        <span>Danh sách User</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.jobs.index') }}" class="nav-link {{ isActive('admin.jobs.*') }}">
                        <i class="ph-table"></i>
                        <span>Danh sách Job</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.job-categories.index') }}"
                        class="nav-link {{ isActive('admin.job-categories.*') }}">
                        <i class="ph-table"></i>
                        <span>Danh sách Job Categories</span>
                    </a>
                </li>
                <!-- Các menu khác, bạn có thể dán thêm đoạn code menu từ file mẫu -->
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->
