@extends('Admin.layouts.master')

@section('pageTitle', isset($user) ? 'Chỉnh sửa người dùng' : 'Thêm người dùng')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($user) ? 'Chỉnh sửa người dùng' : 'Thêm người dùng' }}</h5>
            </div>

            <div class="card-body">
                <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $user->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tên người dùng <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control"
                            value="{{ old('username', $user->username ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $user->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vai trò <span class="text-danger">*</span></label>
                        @php
                            $isMainAdmin = isset($user) && $user->id == 1;
                            $currentRole = old('role', $user->role ?? '');
                            $roles = [
                                'admin' => 'Quản trị viên',
                                'content_manager' => 'Quản lý nội dung',
                                'candidate' => 'Ứng viên',
                                'employer' => 'Nhà tuyển dụng',
                            ];
                        @endphp
                        <input type="hidden" name="role" value="{{ $currentRole }}">

                        <select name="role" class="form-control" {{ $isMainAdmin ? 'disabled' : '' }}>
                            <option value="" disabled>-- Chọn vai trò --</option>

                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" {{ $currentRole == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
                    </div>

                    <button type="submit" class="btn btn-success">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
