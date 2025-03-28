@extends('layouts.admin.master')

@section('title', 'Quản lý tin tuyển dụng')

@section('page_header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Quản lý tin tuyển dụng - <span class="fw-normal">Chỉnh sửa tin tuyển dụng</span>
            </h4>
            <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
        <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
            <!-- Breadcrumb hoặc nội dung bổ sung -->
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center py-0">
        <h5 class="py-3 mb-0">Chỉnh sửa tin tuyển dụng</h5>
    </div>
    <div class="card-body border-top">
        <form action="{{ route('jobs.update', $job->job_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nhà tuyển dụng:</label>
                <input type="number" name="employer_id" class="form-control" value="{{ $job->employer_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tiêu đề công việc:</label>
                <input type="text" name="job_title" class="form-control" value="{{ $job->job_title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả công việc:</label>
                <textarea name="job_description" rows="4" class="form-control" required>{{ $job->job_description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Yêu cầu:</label>
                <textarea name="requirements" rows="3" class="form-control" required>{{ $job->requirements }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Lương:</label>
                <input type="number" name="salary" class="form-control" value="{{ $job->salary }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa điểm:</label>
                <input type="text" name="location" class="form-control" value="{{ $job->location }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Danh mục công việc:</label>
                <input type="number" name="category_id" class="form-control" value="{{ $job->category_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày đăng :</label>
                <input type="date" name="posted_date" class="form-control" value="{{ $job->posted_date }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày hết hạn:</label>
                <input type="date" name="expiry_date" class="form-control" value="{{ $job->expiry_date }}" required>
            </div>

            <div class="text-start">
                <button type="submit" class="btn btn-primary">Cập nhật <i class="ph-check ms-2"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection
