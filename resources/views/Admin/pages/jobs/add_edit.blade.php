@extends('Admin.layouts.master')

@section('pageTitle', isset($job) ? 'Chỉnh sửa công việc' : 'Thêm công việc')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($job) ? 'Chỉnh sửa công việc' : 'Thêm công việc' }}</h5>
            </div>

            <div class="card-body">
                <form action="{{ isset($job) ? route('admin.jobs.update', $job->job_id) : route('admin.jobs.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($job))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tiêu đề công việc</label>
                        <input type="text" name="job_title" class="form-control"
                            value="{{ old('job_title', $job->job_title ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả công việc</label>
                        <textarea name="job_description" class="form-control" required>{{ old('job_description', $job->job_description ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yêu cầu công việc</label>
                        <textarea name="requirements" class="form-control" required>{{ old('requirements', $job->requirements ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa điểm</label>
                        <input type="text" name="location" class="form-control"
                            value="{{ old('location', $job->location ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lương</label>
                        <input type="text" name="salary" class="form-control"
                            value="{{ old('salary', $job->salary ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày đăng</label>
                        <input type="date" name="posted_date" class="form-control"
                            value="{{ old('posted_date', $job->posted_date ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày hết hạn</label>
                        <input type="date" name="expiry_date" class="form-control"
                            value="{{ old('expiry_date', $job->expiry_date ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}"
                                    {{ isset($job) && $job->category_id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nhà tuyển dụng</label>
                        <select name="employer_id" class="form-control" required>
                            <option value="">Chọn nhà tuyển dụng</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->employer_id }}"
                                    {{ isset($job) && $job->employer_id == $employer->employer_id ? 'selected' : '' }}>
                                    {{ $employer->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($job) ? 'Cập nhật công việc' : 'Thêm công việc' }}</button>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
