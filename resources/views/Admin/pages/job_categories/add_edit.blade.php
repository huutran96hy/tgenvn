@extends('Admin.layouts.master')

@section('pageTitle', isset($jobCategory) ? 'Chỉnh sửa danh mục công việc' : 'Thêm danh mục công việc')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($jobCategory) ? 'Chỉnh sửa danh mục công việc' : 'Thêm danh mục công việc' }}
                </h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($jobCategory) ? route('admin.job-categories.update', $jobCategory->category_id) : route('admin.job-categories.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($jobCategory))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                        <input type="text" name="category_name" class="form-control"
                            value="{{ old('category_name', $jobCategory->category_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control">{{ old('description', $jobCategory->description ?? '') }}</textarea>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($jobCategory) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    <a href="{{ route('admin.job-categories.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
