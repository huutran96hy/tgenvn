@extends('Admin.layouts.master')

@section('pageTitle', isset($employer) ? 'Chỉnh sửa nhà tuyển dụng' : 'Thêm nhà tuyển dụng')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($employer) ? 'Chỉnh sửa nhà tuyển dụng' : 'Thêm nhà tuyển dụng' }}</h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($employer) ? route('admin.employers.update', $employer->employer_id) : route('admin.employers.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($employer))
                        @method('PUT')
                    @endif

                    {{-- <div class="mb-3">
                        <label class="form-label">Người dùng</label>
                        <select name="user_id" class="form-control select2" required>
                            <option value="">Chọn người dùng</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ isset($employer) && $employer->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <div class="input-group">
                            <input type="file" name="logo" class="form-control" id="logoInput" accept="image/*">
                        </div>
                        @if (isset($employer) && $employer->logo)
                            <div class="mt-2">
                                <img id="logoPreview" src="{{ asset('storage/' . $employer->logo) }}" class="img-thumbnail"
                                    width="150">
                            </div>
                        @else
                            <div class="mt-2">
                                <img id="logoPreview" src="" class="img-thumbnail d-none" width="150">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ảnh nền</label>
                        <div class="input-group">
                            <input type="file" name="background_img" class="form-control" id="bgrImgInput"
                                accept="image/*">
                        </div>
                        @if (isset($employer) && $employer->background_img)
                            <div class="mt-2">
                                <img id="bgrImgPreview" src="{{ asset('storage/' . $employer->background_img) }}"
                                    class="img-thumbnail" width="150">
                            </div>
                        @else
                            <div class="mt-2">
                                <img id="bgrImgPreview" src="" class="img-thumbnail d-none" width="150">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tên nhà tuyển dụng</label>
                        <input type="text" name="company_name" class="form-control text-to-slug"
                            value="{{ old('company_name', $employer->company_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control text-to-slug"
                            value="{{ old('slug', $employer->slug ?? '') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả nhà tuyển dụng</label>
                        <textarea name="company_description" class="form-control ckeditor">
                            {{ old('company_description', $employer->company_description ?? '') }}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" name="website" class="form-control"
                            value="{{ old('website', $employer->website ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="contact_phone" class="form-control"
                            value="{{ old('contact_phone', $employer->contact_phone ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $employer->address ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $employer->email ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày thành lập</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="ph-calendar"></i>
                            </span>
                            <input type="text" name="founded_at" class="form-control datepicker-autohide"
                                value="{{ old('founded_at', $employer->founded_at ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Về chúng tôi</label>
                        <input type="text" name="about" class="form-control"
                            value="{{ old('about', $employer->about ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lĩnh vực công ty</label>
                        <input type="text" name="company_type" class="form-control"
                            value="{{ old('company_type', $employer->company_type ?? '') }}">
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($employer) ? 'Cập nhật nhà tuyển dụng' : 'Thêm nhà tuyển dụng' }}</button>
                    <a href="{{ route('admin.employers.index') }}" class="btn btn-secondary">Quay lại</a>
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
            // Tạo CKEditor
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

            // Hiển thị ảnh preview cho logo
            const logoInput = document.getElementById("logoInput");
            if (logoInput) {
                logoInput.addEventListener("change", function(event) {
                    let file = event.target.files[0];
                    let preview = document.getElementById("logoPreview");

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

            // Hiển thị ảnh preview cho ảnh nền
            const bgrImgInput = document.getElementById("bgrImgInput");
            if (bgrImgInput) {
                bgrImgInput.addEventListener("change", function(event) {
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

            // Tạo Select2
            $('.select2').select2({
                placeholder: "Chọn một mục",
                allowClear: true
            });
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

            $('.text-to-slug[name="company_name"]').on('input', function() {
                var name = $(this).val();
                var slug = slugify(name);
                $('.text-to-slug[name="slug"]').val(slug);
            });

            @if (isset($employer))
                var initialName = $('.text-to-slug[name="company_name"]').val();
                if (initialName) {
                    var initialSlug = slugify(initialName);
                    $('.text-to-slug[name="slug"]').val(initialSlug);
                }
            @endif
        });
    </script>
@endpush
