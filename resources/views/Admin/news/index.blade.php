@extends('Admin.layouts.master')

@section('title', 'Quản lý Tin tức')

@section('page_header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Quản lý Tin tức - <span class="fw-normal">Danh sách tin tức</span>
                </h4>
                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <!-- Bạn có thể thêm breadcrumb hoặc các thành phần header bổ sung tại đây -->
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Danh sách tin tức</h5>
        </div>
        <!-- Bảng tin tức sử dụng DataTables (lấy cảm hứng từ bảng được cắt từ file datatable mẫu) -->
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Chuyên mục</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Thị trường chứng khoán đạt mức cao kỷ lục</td>
                    <td>Nguyễn Văn A</td>
                    <td>Tài chính</td>
                    <td>26 Mar 2025</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">Đã đăng</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Các đột phá trong công nghệ AI</td>
                    <td>Trần Thị B</td>
                    <td>Công nghệ</td>
                    <td>25 Mar 2025</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Nháp</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><i class="ph-eye me-2"></i> Xem</a>
                                    <a href="#" class="dropdown-item"><i class="ph-pencil me-2"></i> Sửa</a>
                                    <a href="#" class="dropdown-item"><i class="ph-trash me-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- Thêm các hàng dữ liệu tin tức khác -->
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datatable-basic').DataTable({
                // Cấu hình bổ sung nếu cần, ví dụ:
                paging: true,
                ordering: true,
                info: true,
                // language: { /* tùy chỉnh ngôn ngữ nếu cần */ }
            });
        });
    </script>

    <!-- Nếu cần, bạn có thể thêm các script bổ sung riêng cho trang này -->
@endsection
