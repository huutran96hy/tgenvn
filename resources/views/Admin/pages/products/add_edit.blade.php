@extends('Admin.layouts.master')

@section('pageTitle', isset($product) ? 'Chỉnh sửa tin tức' : 'Thêm tin tức')

@section('content')
@include('Admin.snippets.page_header')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ isset($product) ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm' }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ isset($product) ? route('admin.products.update', $product->products_id) : route('admin.products.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($product))
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                    <select name="products_category_id" class="form-control select2" required>
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->products_category_id }}"
                            {{ isset($product) && $product->products_category_id == $category->products_category_id ? 'selected' : '' }}>
                            {{ $category->category_name_ko ?? $category->category_name_vi }}
                        </option>
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm (Tiếng Việt) <span class="text-danger">*</span></label>
                    <input type="text" name="product_name_vi" class="form-control"
                        value="{{ old('product_name_vi', $product->product_name_vi ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm (Tiếng Anh) <span class="text-danger">*</span></label>
                    <input type="text" name="product_name_en" class="form-control text-to-slug"
                        value="{{ old('product_name_en', $product->product_name_en ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm (Tiếng Hàn)</label>
                    <input type="text" name="product_name_ko" class="form-control"
                        value="{{ old('product_name_ko', $product->product_name_ko ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control text-to-slug"
                        value="{{ old('slug', $employer->slug ?? '') }}" readonly>
                </div>

                <div class="file-input-wrapper mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="hidden" name="image" class="all-images"
                        value="{{ isset($product) && $product->image ? $product->image : '' }}">

                    <!-- Vẫn giữ input file nhưng dùng để trigger popup -->
                    <input type="file" class="file-input-preview" data-browse-on-zone-click="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn (Tiếng Việt)</label>
                    <textarea name="description_vi" class="form-control">{{ old('description_vi', $product->description_vi ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn (Tiếng Anh)</label>
                    <textarea name="description_en" class="form-control">{{ old('description_en', $product->description_en ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn (Tiếng Hàn)</label>
                    <textarea name="description_ko" class="form-control">{{ old('description_ko', $product->description_ko ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control ckeditor" required>
                    {{ old('content', $product->content ?? '') }}
                    </textarea>
                </div>
                <button type="submit"
                    class="btn btn-success">{{ isset($product) ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' }}</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
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

        $('.text-to-slug[name="product_name_en"]').on('input', function() {
            var name = $(this).val();
            var slug = slugify(name);
            $('.text-to-slug[name="slug"]').val(slug);
        });

        @if(isset($product))
        var initialName = $('.text-to-slug[name="product_name_en"]').val();
        if (initialName) {
            var initialSlug = slugify(initialName);
            $('.text-to-slug[name="slug"]').val(initialSlug);
        }
        @endif
    });
</script>
@endpush