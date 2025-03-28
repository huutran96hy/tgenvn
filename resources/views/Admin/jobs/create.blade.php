@extends('layouts.admin.master')

@section('title', 'Quản lý tin tuyển dụng')

@section('page_header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Quản lý tin tuyển dụng - <span class="fw-normal">Thêm mới tin tuyển dụng</span>
            </h4>
            <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
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
    <div class="card-header d-flex align-items-center py-0">
        <h5 class="py-3 mb-0">Thêm mới tin tuyển dụng</h5>
    </div>
    <!-- Bảng tin tuyển dụng sử dụng DataTables (lấy cảm hứng từ bảng được cắt từ file datatable mẫu) -->
    <div class="card-body border-top">
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nhà tuyển dụng:</label>
                <input type="number" name="employer_id" class="form-control" placeholder="Nhập mã nhà tuyển dụng" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tiêu đề công việc:</label>
                <input type="text" name="job_title" class="form-control" placeholder="Nhập tiêu đề công việc" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả công việc:</label>
                <textarea name="job_description" rows="4" class="form-control" placeholder="Nhập mô tả công việc" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Yêu cầu:</label>
                <textarea name="requirements" rows="3" class="form-control" placeholder="Nhập các yêu cầu công việc" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Lương:</label>
                <input type="number" name="salary" class="form-control" placeholder="Nhập mức lương" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa điểm:</label>
                <input type="text" name="location" class="form-control" placeholder="Nhập địa điểm làm việc" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Danh mục công việc:</label>
                <input type="number" name="category_id" class="form-control" placeholder="Nhập mã danh mục" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày đăng :</label>
                <input type="date" name="posted_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày hết hạn:</label>
                <input type="date" name="expiry_date" class="form-control" required>
            </div>
            <div class="text-start">
                <button type="submit" class="btn btn-primary">Lưu lại <i class="ph-paper-plane-tilt ms-2"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>
<!-- Nếu cần, bạn có thể thêm các script bổ sung riêng cho trang này -->
@endsection