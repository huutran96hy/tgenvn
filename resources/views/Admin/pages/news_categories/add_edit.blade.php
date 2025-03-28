@extends('Admin.layouts.master')

@section('pageTitle', isset($newsCategory) ? 'Chỉnh sửa danh mục tin tức' : 'Thêm danh mục tin tức')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($newsCategory) ? 'Chỉnh sửa danh mục tin tức' : 'Thêm danh mục tin tức' }}
                </h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($newsCategory) ? route('admin.news-categories.update', $newsCategory->news_category_id) : route('admin.news-categories.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($newsCategory))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control"
                            value="{{ old('category_name', $newsCategory->category_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control">{{ old('description', $newsCategory->description ?? '') }}</textarea>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($newsCategory) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    <a href="{{ route('admin.news-categories.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
