@extends('Admin.layouts.master')

@section('pageTitle', isset($application) ? 'Chỉnh sửa đơn ứng tuyển' : 'Thêm đơn ứng tuyển')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($application) ? 'Chỉnh sửa đơn ứng tuyển' : 'Thêm đơn ứng tuyển' }}</h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($application) ? route('admin.applications.update', $application->application_id) : route('admin.applications.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($application))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Ứng viên</label>
                        <select name="candidate_id" class="form-control select2" required>
                            <option value="">Chọn ứng viên</option>
                            @foreach ($candidates as $candidate)
                                <option value="{{ $candidate->candidate_id }}"
                                    {{ isset($application) && $application->candidate_id == $candidate->candidate_id ? 'selected' : '' }}>
                                    {{ $candidate->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Công việc</label>
                        <select name="job_id" class="form-control select2" required>
                            <option value="">Chọn công việc</option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->job_id }}"
                                    {{ isset($application) && $application->job_id == $job->job_id ? 'selected' : '' }}>
                                    {{ $job->job_title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày ứng tuyển</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="ph-calendar"></i>
                            </span>
                            <input type="text" name="application_date" class="form-control datepicker-autohide"
                                value="{{ old('application_date', $application->application_date ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="status" class="form-control" required>
                            <option value="pending"
                                {{ isset($application) && $application->status == 'pending' ? 'selected' : '' }}>Chờ duyệt
                            </option>
                            <option value="interviewed"
                                {{ isset($application) && $application->status == 'interviewed' ? 'selected' : '' }}>Đã
                                phỏng vấn</option>
                            <option value="rejected"
                                {{ isset($application) && $application->status == 'rejected' ? 'selected' : '' }}>Từ chối
                            </option>
                            <option value="hired"
                                {{ isset($application) && $application->status == 'hired' ? 'selected' : '' }}>Đã tuyển
                            </option>
                        </select>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($application) ? 'Cập nhật đơn ứng tuyển' : 'Thêm đơn ứng tuyển' }}</button>
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const options = {
                autohide: true,
                format: "dd-mm-yyyy",
                todayHighlight: true
            };

            document.querySelectorAll(".datepicker-autohide").forEach(function(el) {
                new Datepicker(el, options);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('.select2').select2({
                placeholder: "Chọn một mục",
                allowClear: true
            });
        });
    </script>
@endpush
