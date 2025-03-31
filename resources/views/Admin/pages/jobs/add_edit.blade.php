@extends('Admin.layouts.master')

@section('pageTitle', isset($job) ? 'Chỉnh sửa công việc' : 'Thêm công việc')

@push('head')
    <!-- JavaScript -->
@endpush

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($job) ? 'Chỉnh sửa công việc' : 'Thêm công việc' }}</h5>
            </div>

            <div class="card-body">
                <form action="{{ isset($job) ? route('admin.jobs.update', $job->job_id) : route('admin.jobs.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($job))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tiêu đề công việc</label>
                        <input type="text" name="job_title" class="form-control"
                            value="{{ old('job_title', $job->job_title ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả công việc</label>
                        <textarea name="job_description" class="form-control ckeditor" required>
                            {{ old('job_description', $job->job_description ?? '') }}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yêu cầu công việc</label>
                        <textarea name="requirements" class="form-control ckeditor" required>
                            {{ old('requirements', $job->requirements ?? '') }}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa điểm</label>
                        <input type="text" name="location" class="form-control"
                            value="{{ old('location', $job->location ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lương</label>
                        <input type="text" name="salary" class="form-control"
                            value="{{ old('salary', $job->salary ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Học vấn yêu cầu</label>
                        <input type="text" name="required_education" class="form-control"
                            value="{{ old('required_education', $job->required_education ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kinh nghiệm yêu cầu</label>
                        <input type="text" name="required_exp" class="form-control"
                            value="{{ old('required_exp', $job->required_exp ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày đăng</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="ph-calendar"></i>
                            </span>
                            <input type="text" name="posted_date" class="form-control datepicker-autohide"
                                value="{{ old('posted_date', $job->posted_date ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày hết hạn</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="ph-calendar"></i>
                            </span>
                            <input type="text" name="expiry_date" class="form-control datepicker-autohide"
                                value="{{ old('expiry_date', $job->expiry_date ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kỹ năng</label>
                        <select name="skills[]" class="form-control select2" multiple="multiple">
                            @foreach ($allSkills as $skill)
                                <option value="{{ $skill->skill_id }}"
                                    {{ isset($job) && in_array($skill->skill_id, $job->skills->pluck('skill_id')->toArray() ?? []) ? 'selected' : '' }}>
                                    {{ $skill->skill_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái phê duyệt</label>
                        <select name="approval_status" class="form-control" required>
                            <option value="pending"
                                {{ old('approval_status', $job->approval_status ?? 'pending') == 'pending' ? 'selected' : '' }}>
                                Chờ duyệt</option>
                            <option value="approved"
                                {{ old('approval_status', $job->approval_status ?? '') == 'approved' ? 'selected' : '' }}>
                                Đã duyệt</option>
                            <option value="rejected"
                                {{ old('approval_status', $job->approval_status ?? '') == 'rejected' ? 'selected' : '' }}>
                                Bị từ chối</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-control select2" required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}"
                                    {{ isset($job) && $job->category_id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nhà tuyển dụng</label>
                        <select name="employer_id" class="form-control select2" required>
                            <option value="">Chọn nhà tuyển dụng</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->employer_id }}"
                                    {{ isset($job) && $job->employer_id == $employer->employer_id ? 'selected' : '' }}>
                                    {{ $employer->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($job) ? 'Cập nhật công việc' : 'Thêm công việc' }}</button>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Quay lại</a>
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
            // tạo Datepicker
            const options = {
                autohide: true,
                format: "yyyy-mm-dd",
                todayHighlight: true
            };
            document.querySelectorAll(".datepicker-autohide").forEach(function(el) {
                new Datepicker(el, options);
            });

            // tạo CKEditor
            document.querySelectorAll(".ckeditor").forEach(editorElement => {
                ClassicEditor
                    .create(editorElement)
                    .catch(error => console.error(error));
            });

            // tạo Select2
            $('.select2').select2({
                placeholder: "Chọn một mục",
                allowClear: true
            });
        });
    </script>
@endpush
