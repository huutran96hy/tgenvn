@extends('Admin.layouts.master')

@section('pageTitle', isset($process) ? 'Chỉnh sửa quy trình' : 'Thêm quy trình')

@section('content')
@include('Admin.snippets.page_header')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ isset($process) ? 'Chỉnh sửa quy trình' : 'Thêm quy trình' }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ isset($process) ? route('admin.processes.update', $process->process_id) : route('admin.processes.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($process))
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                    <select name="process_category_id" class="form-control select2" required>
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->process_category_id }}"
                            {{ isset($process) && $process->process_category_id == $category->process_category_id ? 'selected' : '' }}>
                            {{ $category->category_name_ko ?? $category->category_name_vi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên quy trình (Tiếng Việt) <span class="text-danger">*</span></label>
                    <input type="text" name="process_name_vi" class="form-control"
                        value="{{ old('process_name_vi', $process->process_name_vi ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên quy trình (Tiếng Anh) <span class="text-danger">*</span></label>
                    <input type="text" name="process_name_en" class="form-control text-to-slug"
                        value="{{ old('process_name_en', $process->process_name_en ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên quy trình (Tiếng Hàn)</label>
                    <input type="text" name="process_name_ko" class="form-control"
                        value="{{ old('process_name_ko', $process->process_name_ko ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control text-to-slug"
                        value="{{ old('slug', $process->slug ?? '') }}" readonly>
                </div>

                <div class="file-input-wrapper mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="hidden" name="image" class="all-images"
                        value="{{ isset($process) && $process->image ? $process->image : '' }}">

                    <!-- Vẫn giữ input file nhưng dùng để trigger popup -->
                    <input type="file" class="file-input-preview" data-browse-on-zone-click="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn (Tiếng Việt)</label>
                    <textarea name="description_vi" class="form-control">{{ old('description_vi', $process->description_vi ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn (Tiếng Anh)</label>
                    <textarea name="description_en" class="form-control">{{ old('description_en', $process->description_en ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn (Tiếng Hàn)</label>
                    <textarea name="description_ko" class="form-control">{{ old('description_ko', $process->description_ko ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control ckeditor" required>
                    {{ old('content', $process->content ?? '') }}
                    </textarea>
                </div>
                <button type="submit"
                    class="btn btn-success">{{ isset($process) ? 'Cập nhật quy trình' : 'Thêm quy trình' }}</button>
                <a href="{{ route('admin.processes.index') }}" class="btn btn-secondary">Quay lại</a>
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

        $('.text-to-slug[name="process_name_en"]').on('input', function() {
            var name = $(this).val();
            var slug = slugify(name);
            $('.text-to-slug[name="slug"]').val(slug);
        });

        @if(isset($process))
        var initialName = $('.text-to-slug[name="process_name_en"]').val();
        if (initialName) {
            var initialSlug = slugify(initialName);
            $('.text-to-slug[name="slug"]').val(initialSlug);
        }
        @endif
    });
</script>
@endpush