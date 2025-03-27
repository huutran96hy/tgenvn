@extends('Admin.layouts.master')

@section('pageTitle', isset($employer) ? 'Chỉnh sửa công ty' : 'Thêm công ty')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($employer) ? 'Chỉnh sửa công ty' : 'Thêm công ty' }}</h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($employer) ? route('admin.employers.update', $employer->employer_id) : route('admin.employers.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($employer))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Người dùng</label>
                        <select name="user_id" class="form-control" required>
                            <option value="">Chọn người dùng</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ isset($employer) && $employer->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tên công ty</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ old('company_name', $employer->company_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả công ty</label>
                        <textarea name="company_description" class="form-control">{{ old('company_description', $employer->company_description ?? '') }}</textarea>
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

                    <button type="submit"
                        class="btn btn-success">{{ isset($employer) ? 'Cập nhật công ty' : 'Thêm công ty' }}</button>
                    <a href="{{ route('admin.employers.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
