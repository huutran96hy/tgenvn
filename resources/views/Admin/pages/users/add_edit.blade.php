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
                        <label class="form-label">Emai <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $user->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vai trò <span class="text-danger">*</span></label>
                        <select name="role" class="form-control">
                            <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="candidate" {{ isset($user) && $user->role == 'candidate' ? 'selected' : '' }}>
                                Ứng viên</option>
                            <option value="employer" {{ isset($user) && $user->role == 'employer' ? 'selected' : '' }}>
                                Nhà tuyển dụng</option>
                            <option value="content_manager"
                                {{ isset($user) && $user->role == 'content_manager' ? 'selected' : '' }}>Người quản lý nội dung
                            </option>
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
