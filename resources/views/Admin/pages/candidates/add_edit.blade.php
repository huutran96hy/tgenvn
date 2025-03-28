@extends('Admin.layouts.master')

@section('pageTitle', isset($candidate) ? 'Chỉnh sửa ứng viên' : 'Thêm ứng viên')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($candidate) ? 'Chỉnh sửa ứng viên' : 'Thêm ứng viên' }}</h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($candidate) ? route('admin.candidates.update', $candidate->candidate_id) : route('admin.candidates.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($candidate))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Họ và Tên</label>
                        <input type="text" name="full_name" class="form-control"
                            value="{{ old('full_name', $candidate->full_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $candidate->phone ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $candidate->address ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trình độ học vấn</label>
                        <input type="text" name="education" class="form-control"
                            value="{{ old('education', $candidate->education ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tệp hồ sơ (CV)</label>
                        <input type="file" name="resume" class="form-control">
                        @if (isset($candidate) && $candidate->resume)
                            <small class="d-block mt-2">
                                <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank">Xem tệp hiện
                                    tại</a>
                            </small>
                        @endif
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($candidate) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    <a href="{{ route('admin.candidates.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
