@extends('Admin.layouts.master')
@section('pageTitle', isset($productsCategory) ? 'Chỉnh sửa danh mục sản phẩm' : 'Thêm danh mục sản phẩm')
@section('content')
@include('Admin.snippets.page_header')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ isset($productsCategory) ? 'Chỉnh sửa danh mục sản phẩm' : 'Thêm danh mục sản phẩm' }}
            </h5>
        </div>

        <div class="card-body">
            <form
                action="{{ isset($productsCategory) ? route('admin.products-categories.update', $productsCategory->products_category_id) : route('admin.products-categories.store') }}"
                method="POST">
                @csrf
                @if (isset($productsCategory))
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label class="form-label">Tên danh mục tiếng Việt <span class="text-danger">*</span></label>
                    <input type="text" name="category_name_vi" class="form-control"
                        value="{{ old('category_name_vi', $productsCategory->category_name_vi ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên danh mục tiếng Anh <span class="text-danger">*</span></label>
                    <input type="text" name="category_name_en" class="form-control text-to-slug"
                        value="{{ old('category_name_en', $productsCategory->category_name_en ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên danh mục tiếng Hàn <span class="text-danger">*</span></label>
                    <input type="text" name="category_name_ko" class="form-control"
                        value="{{ old('category_name_ko', $productsCategory->category_name_ko ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control text-to-slug"
                        value="{{ old('slug', $productsCategory->slug ?? '') }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả tiếng việt</label>
                    <textarea name="description_vi" class="form-control">{{ old('description_vi', $productsCategory->description_vi ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả tiếng anh</label>
                    <textarea name="description_en" class="form-control">{{ old('description_en', $productsCategory->description_en ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả tiếng hàn</label>
                    <textarea name="description_ko" class="form-control">{{ old('description_ko', $productsCategory->description_ko ?? '') }}</textarea>
                </div>
                <button type="submit"
                    class="btn btn-success">{{ isset($productsCategory) ? 'Cập nhật' : 'Thêm mới' }}</button>
                <a href="{{ route('admin.products-categories.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
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

        $('.text-to-slug[name="category_name_en"]').on('input', function() {
            var name = $(this).val();
            var slug = slugify(name);
            $('.text-to-slug[name="slug"]').val(slug);
        });

        @if(isset($productsCategory))
        var initialName = $('.text-to-slug[name="category_name_en"]').val();
        if (initialName) {
            var initialSlug = slugify(initialName);
            $('.text-to-slug[name="slug"]').val(initialSlug);
        }
        @endif
    });
</script>
@endpush