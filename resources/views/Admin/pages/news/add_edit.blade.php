@extends('Admin.layouts.master')

@section('pageTitle', isset($news) ? 'Chỉnh sửa tin tức' : 'Thêm tin tức')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($news) ? 'Chỉnh sửa tin tức' : 'Thêm tin tức' }}</h5>
            </div>

            <div class="card-body">
                <form action="{{ isset($news) ? route('admin.news.update', $news->news_id) : route('admin.news.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($news))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $news->title ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea name="content" class="form-control ckeditor" required>
                            {{ old('content', $news->content ?? '') }}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày xuất bản</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="ph-calendar"></i>
                            </span>
                            <input type="text" name="published_date" class="form-control datepicker-autohide"
                                value="{{ old('published_date', $news->published_date ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="news_category_id" class="form-control select2" required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->news_category_id }}"
                                    {{ isset($news) && $news->news_category_id == $category->news_category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tác giả</label>
                        <select name="author_id" class="form-control select2" required>
                            <option value="">Chọn tác giả</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ isset($news) && $news->author_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="status" class="form-control" required>
                            <option value="draft" {{ isset($news) && $news->status == 'draft' ? 'selected' : '' }}>Nháp
                            </option>
                            <option value="published" {{ isset($news) && $news->status == 'published' ? 'selected' : '' }}>
                                Xuất bản</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($news) ? 'Cập nhật tin tức' : 'Thêm tin tức' }}</button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Khởi tạo CKEditor
            document.querySelectorAll(".ckeditor").forEach(editorElement => {
                ClassicEditor
                    .create(editorElement)
                    .catch(error => console.error(error));
            });

            // Khởi tạo Datepicker
            const options = {
                autohide: true,
                format: "yyyy-mm-dd",
                todayHighlight: true
            };
            document.querySelectorAll(".datepicker-autohide").forEach(function(el) {
                new Datepicker(el, options);
            });

            // tạo Select2
            $('.select2').select2({
                placeholder: "Chọn một mục",
                allowClear: true
            });
        });
    </script>
@endpush
