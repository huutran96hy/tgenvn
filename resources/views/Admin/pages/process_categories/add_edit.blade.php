@extends('Admin.layouts.master')

@section('pageTitle', isset($processCategory) ? 'Chỉnh sửa danh mục quy trình' : 'Thêm danh mục quy trình')

@section('content')
@include('Admin.snippets.page_header')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ isset($processCategory) ? 'Chỉnh sửa danh mục quy trình' : 'Thêm danh mục quy trình' }}</h5>
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
                action="{{ isset($processCategory) ? route('admin.process-categories.update', $processCategory->process_category_id) : route('admin.process-categories.store') }}"
                method="POST"
            >
                @csrf
                @if (isset($processCategory))
                    @method('PUT')
                @endif

                <x-hidden-slug :value="$processCategory->slug ?? ''" />

                <x-locale-tabs
                    :entity="$processCategory ?? null"
                    name-prefix="category_name"
                    desc-prefix="description"
                    name-label="Tên danh mục"
                    desc-label="Mô tả"
                    :required-locales="['vi', 'en']"
                    slug-source-locale="vi"
                    :name-placeholders="[
                        'vi' => 'Nhập tên danh mục bằng tiếng Việt',
                        'en' => 'Enter category name in English',
                        'ko' => '한국어로 카테고리 이름을 입력하세요',
                    ]"
                    :desc-placeholders="[
                        'vi' => 'Nhập mô tả danh mục bằng tiếng Việt',
                        'en' => 'Enter category description in English',
                        'ko' => '한국어로 카테고리 설명을 입력하세요',
                    ]"
                />

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        {{ isset($processCategory) ? 'Cập nhật danh mục' : 'Thêm danh mục' }}
                    </button>
                    <a href="{{ route('admin.process-categories.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
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
