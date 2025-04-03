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
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($news))
                @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="title" class="form-control text-to-slug"
                        value="{{ old('title', $news->title ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control text-to-slug"
                        value="{{ old('slug', $news->slug ?? '') }}" readonly>
                </div>
                <div class="file-input-wrapper mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="hidden" name="images" class="all-images" value="{{$news->images ?? ''}}">

                    <!-- Vẫn giữ input file nhưng dùng để trigger popup -->
                    <input type="file" class="file-input-preview" data-browse-on-zone-click="true">
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
                        <span class="input-group-text"><i class="ph-calendar"></i></span>
                        <input type="text" name="published_date" class="form-control datepicker-basic"
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
                            {{ $category->category_name }}
                        </option>
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
                            {{ $user->name }}
                        </option>
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
<script src="../../../assets/js/vendor/editors/ckeditor/ckeditor_classic.js"></script>
<script src="../../../assets/js/vendor/uploaders/fileinput/fileinput.min.js"></script>
<script src="../../../assets/js/vendor/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="../../../assets/demo/pages/uploader_bootstrap.js"></script>
<script src="../../vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="../../../assets/js/vendor/ui/moment/moment.min.js"></script>
<script src="../../../assets/js/vendor/pickers/daterangepicker.js"></script>
<script src="../../../assets/js/vendor/pickers/datepicker.min.js"></script>
<script src="../../../assets/demo/pages/picker_date.js"></script>

<script>
    $(document).ready(function() {
        $('.file-input-wrapper').each(function() {
            const $wrapper = $(this);
            const $previewInput = $wrapper.find('.file-input-preview');
            const $hiddenInput = $wrapper.find('.all-images');

            let allImages = $hiddenInput.val();

            // Hàm khởi tạo lại fileinput preview
            function renderPreviews(images) {
                $previewInput.fileinput('destroy');

                $previewInput.fileinput({
                    initialPreview: images,
                    initialPreviewConfig: {
                        caption: images,
                        key: images,
                        downloadUrl: images
                    },
                    showRemove: false,
                    showUpload: false,
                    showCancel: false,
                    showClose: false,
                    showZoom: true,
                    showBrowse: false,
                    initialPreviewAsData: true,
                    overwriteInitial: true, // ❗ Quan trọng: Ghi đè ảnh cũ
                    browseOnZoneClick: true,
                    dropZoneEnabled: false,
                    showBrowse: true,
                    browseLabel: 'Chọn ảnh',
                    allowedPreviewTypes: ['image'],
                    fileActionSettings: {
                        showRemove: true,
                        removeIcon: '<i class="ph-x text-danger"></i>',
                        removeClass: 'btn btn-sm btn-light-danger rounded-pill',
                        showDownload: false,
                        showBrowse: false,
                        showZoom: false,
                    }
                });
            }

            renderPreviews(allImages);

            // ❌ Ngăn người dùng chọn ảnh từ máy
            $previewInput.on('click', function(e) {
                e.preventDefault();
            });

            // ✅ Mở popup Laravel Filemanager khi click Browse
            $wrapper.on('click', '.btn-file input[type=file]', function(e) {
                e.preventDefault();

                window.open('/admin/laravel-filemanager?type=image', 'lfm', 'width=900,height=600');

                window.SetUrl = function(files) {
                    const items = Array.isArray(files) ? files : [files];
                    const url = items[0]?.url;
                    console.log(url);
                    if (!url) return;

                    allImages = url; // ❗ Chỉ lấy 1 ảnh
                    $hiddenInput.val(allImages).trigger('change');
                };
            });

            // ✅ Khi xoá ảnh
            $wrapper.on('click', '.kv-file-remove', function(e) {
                e.preventDefault();
                allImages = [];
                $hiddenInput.val(JSON.stringify(allImages)).trigger('change');
            });

            $hiddenInput.on('change', function() {
                const updated = $hiddenInput.val();
                allImages = updated;
                renderPreviews(allImages);
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        function CustomFileManagerPlugin(editor) {
            editor.ui.componentFactory.add('insertImageFromLfm', locale => {
                // Tạo nút cơ bản với API chuẩn
                const button = editor.ui.componentFactory.create('bold'); // Clone từ bold để có cấu trúc đầy đủ

                button.set({
                    label: 'Chèn ảnh',
                    withText: true,
                    icon: false, // hoặc gắn SVG nếu cần
                    tooltip: true
                });

                // Khi click → mở Filemanager
                button.on('execute', () => {
                    const routePrefix = '/admin/laravel-filemanager?type=image&multiple=false';
                    window.open(routePrefix, 'FileManager', 'width=900,height=600');

                    // Nhận ảnh sau khi chọn
                    window.SetUrl = function(files) {
                        const items = Array.isArray(files) ? files : [files];

                        items.forEach(file => {
                            const url = typeof file === 'string' ? file : file.url;
                            if (!url) return;

                            // ⚠️ Fallback nếu plugin Image không tồn tại
                            try {
                                editor.model.change(writer => {
                                    const imageElement = writer.createElement('image', {
                                        src: url
                                    });
                                    editor.setData(editor.getData() + `<img src="${url}" alt="">`);
                                    editor.model.insertContent(imageElement, editor.model.document.selection);
                                });
                            } catch (err) {
                                editor.model.change(writer => {
                                    const html = `<p><img src="${url}" alt=""></p>`;
                                    const viewFragment = editor.data.processor.toView(html);
                                    const modelFragment = editor.data.toModel(viewFragment);
                                    editor.model.insertContent(modelFragment, editor.model.document.selection);
                                });
                            }
                        });
                    };
                });

                return button;
            });
        }

        // Khởi tạo tất cả CKEditor
        document.querySelectorAll('.ckeditor').forEach(el => {
            ClassicEditor
                .create(el, {
                    extraPlugins: [CustomFileManagerPlugin],
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'insertImageFromLfm', '|',
                            'undo', 'redo', '|',
                            'bulletedList', 'numberedList', '|',
                            'alignment', '|',
                            'blockQuote', 'insertTable', '|',
                            'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                            'indent', 'outdent', '|',
                            'horizontalLine', 'specialCharacters', '|',
                            'codeBlock', 'code', '|',
                            'sourceEditing', '|',
                            'removeFormat', '|',
                        ]
                    }
                })
                .catch(error => console.error(error));
        });

        // Khởi tạo editor
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

        const images = document.getElementById("images");
        if (images) {
            images.addEventListener("change", function(event) {
                let file = event.target.files[0];
                let preview = document.getElementById("bgrImgPreview");

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove("d-none");
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>

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

        $('.text-to-slug[name="title"]').on('input', function() {
            var name = $(this).val();
            var slug = slugify(name);
            $('.text-to-slug[name="slug"]').val(slug);
        });

        @if(isset($news))
        var initialName = $('.text-to-slug[name="title"]').val();
        if (initialName) {
            var initialSlug = slugify(initialName);
            $('.text-to-slug[name="slug"]').val(initialSlug);
        }
        @endif
    });
</script>
@endpush