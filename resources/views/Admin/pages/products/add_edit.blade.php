@extends('Admin.layouts.master')

@section('pageTitle', isset($product) ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm')

@section('content')
@include('Admin.snippets.page_header')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ isset($product) ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm' }}</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div class="fw-semibold mb-1">Vui lòng kiểm tra lại thông tin:</div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ isset($product) ? route('admin.products.update', $product->products_id) : route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif

                <div class="row g-3 mb-4">
                    <div class="col-md-12">
                        <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                        <select name="products_category_id" class="form-control select2" required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->products_category_id }}"
                                    {{ (string) old('products_category_id', $product->products_category_id ?? '') === (string) $category->products_category_id ? 'selected' : '' }}>
                                    {{ $category->category_name_vi ?? $category->category_name_en ?? $category->category_name_ko }}
                                </option>
                            @endforeach
                        </select>
                        @error('products_category_id')
                            <div class="text-danger fs-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <x-hidden-slug :value="$product->slug ?? ''" />

                <div class="file-input-wrapper mb-4">
                    <label class="form-label">Hình ảnh</label>
                    <input type="hidden" name="image" class="all-images"
                        value="{{ old('image', isset($product) && $product->image ? $product->image : '') }}">
                    <input type="file" class="file-input-preview" data-browse-on-zone-click="true">
                    @error('image')
                        <div class="text-danger fs-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <x-locale-tabs
                    :entity="$product ?? null"
                    name-prefix="product_name"
                    desc-prefix="description"
                    name-label="Tên sản phẩm"
                    desc-label="Mô tả ngắn"
                    :required-locales="['vi', 'en']"
                    slug-source-locale="vi"
                    :name-placeholders="[
                        'vi' => 'Nhập tên sản phẩm bằng tiếng Việt',
                        'en' => 'Enter product name in English',
                        'ko' => '제품명을 한국어로 입력하세요',
                    ]"
                    :desc-placeholders="[
                        'vi' => 'Nhập mô tả ngắn bằng tiếng Việt',
                        'en' => 'Enter short description in English',
                        'ko' => '한국어로 간단한 설명을 입력하세요',
                    ]"
                />

                <div class="mt-4">
                    <label class="form-label">Nội dung chi tiết</label>
                    <textarea name="content" class="form-control ckeditor" rows="8">{{ old('content', $product->content ?? '') }}</textarea>
                    @error('content')
                        <div class="text-danger fs-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        {{ isset($product) ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@include('Admin.snippets.ckeditor_file_management')

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Chọn danh mục',
            allowClear: true,
            width: '100%'
        });

        function removeVietnameseTones(str) {
            str = str.normalize('NFD');
            str = str.replace(/[\u0300-\u036f]/g, '');
            str = str.replace(/đ/g, 'd');
            str = str.replace(/Đ/g, 'D');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            return str;
        }

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

        function updateSlug() {
            const name = $('.slug-source').val() || '';
            $('.slug-output').val(slugify(name));
        }

        $('.slug-source').on('input', updateSlug);
        updateSlug();
    });
</script>
@endpush
