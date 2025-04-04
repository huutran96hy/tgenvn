<!-- CKEditor 5 CDN -->
<script src="../../../assets/js/vendor/editors/ckeditor/ckeditor_classic.js"></script>
<script src="../../../assets/js/vendor/uploaders/fileinput/fileinput.min.js"></script>
<script src="../../../assets/js/vendor/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="../../../assets/demo/pages/uploader_bootstrap.js"></script>
<script src="../../vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="../../../assets/js/vendor/ui/moment/moment.min.js"></script>
<script src="../../../assets/js/vendor/pickers/daterangepicker.js"></script>
<script src="../../../assets/js/vendor/pickers/datepicker.min.js"></script>
{{-- <script src="../../../assets/demo/pages/picker_date.js"></script> --}}

<script>
    $(document).ready(function() {
        $('.file-input-wrapper').each(function() {
            const $wrapper = $(this);
            const $previewInput = $wrapper.find('.file-input-preview');
            const $hiddenInput = $wrapper.find('.all-images');

            // let allImages = JSON.parse($hiddenInput.val() || '[]');
            let allImages = $hiddenInput.val() ? [$hiddenInput.val()] : [];

            // Hàm khởi tạo lại fileinput preview
            function renderPreviews(images) {
                $previewInput.fileinput('destroy');

                const previewImages = images.map(image => {
                    return '{{ asset('/') }}' + image; // Thêm asset Laravel vào ảnh
                });

                $previewInput.fileinput({
                    initialPreview: previewImages,
                    initialPreviewConfig: images.map(image => ({
                        caption: image.split('/').pop(),
                        key: image,
                        downloadUrl: '{{ asset('/') }}' + image
                    })),
                    showRemove: false,
                    showUpload: false,
                    showCancel: false,
                    showClose: false,
                    showZoom: true,
                    showBrowse: false,
                    initialPreviewAsData: true,
                    overwriteInitial: true, // Ghi đè ảnh cũ
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

                window.open('/admin/laravel-filemanager?type=image', 'lfm',
                    'width=900,height=600');

                window.SetUrl = function(files) {
                    const url = Array.isArray(files) ? files[0]?.url : files?.url;
                    if (!url) return;

                    // Tạo URL để lấy đường dẫn tương đối
                    const relativeUrl = new URL(url).pathname.replace(/^\/storage\//,
                        'storage/');
                    // // console.log(relativeUrl);                     
                    // $hiddenInput.val(JSON.stringify(allImages)).trigger('change');

                    allImages = relativeUrl;
                    $hiddenInput.val(allImages).trigger('change');
                };

            });

            // ✅ Khi xoá ảnh
            $wrapper.on('click', '.kv-file-remove', function(e) {
                e.preventDefault();
                // allImages = [];
                // $hiddenInput.val(JSON.stringify(allImages)).trigger('change');

                allImages = '';
                $hiddenInput.val(allImages).trigger('change');
            });

            // $hiddenInput.on('change', function() {
            //     const updated = JSON.parse($hiddenInput.val() || '[]');
            //     allImages = updated;
            //     renderPreviews(allImages);
            // });

            $hiddenInput.on('change', function() {
                const updated = $hiddenInput.val() || '';
                allImages = updated ? [updated] : []; // Chuyển thành mảng nếu có ảnh
                renderPreviews(allImages);
            });
        });
    });

    // Click ckeditor
    document.addEventListener("DOMContentLoaded", function() {
        function CustomFileManagerPlugin(editor) {
            editor.ui.componentFactory.add('insertImageFromLfm', locale => {
                // Tạo nút cơ bản với API chuẩn
                const button = editor.ui.componentFactory.create(
                    'bold'); // Clone từ bold để có cấu trúc đầy đủ

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

                            const baseUrl = "{{ asset('') }}";
                            const relativeUrl = new URL(url).pathname.replace(
                                /^\/storage\//, 'storage/');

                            // Tạo đường dẫn đầy đủ với asset Laravel
                            const fullUrl = baseUrl + relativeUrl;
                            // console.log(fullUrl);

                            // ⚠️ Fallback nếu plugin Image không tồn tại
                            try {
                                editor.model.change(writer => {
                                    const imageElement = writer
                                        .createElement('image', {
                                            src: url
                                        });
                                    editor.setData(editor.getData() +
                                        `<img src="${fullUrl}" alt="">`);
                                    editor.model.insertContent(imageElement,
                                        editor.model.document.selection);
                                });
                            } catch (err) {
                                editor.model.change(writer => {
                                    const html =
                                        `<p><img src="${url}" alt=""></p>`;
                                    const viewFragment = editor.data
                                        .processor.toView(html);
                                    const modelFragment = editor.data
                                        .toModel(viewFragment);
                                    editor.model.insertContent(
                                        modelFragment, editor.model
                                        .document.selection);
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
                            'blockQuote', 'insertTable', '|',
                            'indent', 'outdent', '|'
                        ]
                    }
                })
                .catch(error => console.error(error));
        });

        // Khởi tạo Datepicker
        const options = {
            autohide: true,
            format: "dd-mm-yyyy",
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
