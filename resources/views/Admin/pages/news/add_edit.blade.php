@extends('Admin.layouts.master')

@section('pageTitle', isset($news) ? 'Chỉnh sửa thông báo' : 'Thêm thông báo')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($news) ? 'Chỉnh sửa thông báo' : 'Thêm thông báo' }}</h5>
            </div>

            <div class="card-body">
                <form action="{{ isset($news) ? route('admin.news.update', $news->news_id) : route('admin.news.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($news))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề (Tiếng Việt)<span class="text-danger">*</span></label>
                        <input type="text" name="title_vi" class="form-control text-to-slug"
                            value="{{ old('title_vi', $news->title_vi ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề (Tiếng Anh)<span class="text-danger">*</span></label>
                        <input type="text" name="title_en" class="form-control text-to-slug"
                            value="{{ old('title_en', $news->title_en ?? '') }}" required>
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Tiêu đề (Tiếng Hàn)<span class="text-danger">*</span></label>
                        <input type="text" name="title_ko" class="form-control text-to-slug"
                            value="{{ old('title_ko', $news->title_ko ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control text-to-slug"
                            value="{{ old('slug', $employer->slug ?? '') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung (Tiếng Việt) <span class="text-danger">*</span></label>
                        <textarea name="content_vi" class="form-control ckeditor" required>
                            {{ old('content_vi', $news->content_vi ?? '') }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung (Tiếng Anh) <span class="text-danger">*</span></label>
                        <textarea name="content_en" class="form-control ckeditor" required>
                            {{ old('content_en', $news->content_en ?? '') }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung (Tiếng Hàn) <span class="text-danger">*</span></label>
                        <textarea name="content_ko" class="form-control ckeditor" required>
                            {{ old('content_ko', $news->content_ko ?? '') }}
                        </textarea>
                    </div>    
                    <button type="submit"
                        class="btn btn-success">{{ isset($news) ? 'Cập nhật thông báo' : 'Thêm thông báo' }}</button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('Admin.snippets.ckeditor_file_management')

    <script>
        $(document).ready(function() {
            // bỏ dấu tiếng Việt
            function removeVietnameseTones(str) {
                str = str.normalize('NFD');
                str = str.replace(/[\u0300-\u036f]/g, "");
                str = str.replace(/đ/g, "d");
                str = str.replace(/Đ/g, "D");
                str = str.replace(/([^0-9a-z-\s])/g, '');
                return str;
            }

            // tạo slug từ tên
            function slugify(text) {
                text = text.toLowerCase();
                text = removeVietnameseTones(text);
                return text.toString()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            }

            $('.text-to-slug[name="title_en"]').on('input', function() {
                var name = $(this).val();
                var slug = slugify(name);
                $('.text-to-slug[name="slug"]').val(slug);
            });

            @if (isset($news))
                var initialName = $('.text-to-slug[name="title_en"]').val();
                if (initialName) {
                    var initialSlug = slugify(initialName);
                    $('.text-to-slug[name="slug"]').val(initialSlug);
                }
            @endif
        });
    </script>
@endpush
