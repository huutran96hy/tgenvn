@extends('Admin.layouts.master')

@section('pageTitle', 'Người dùng')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách người dùng</h5>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên" :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-3">
                            <select name="role" class="form-control">
                                <option value="">Tất cả vai trò</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Quản trị viên
                                </option>
                                <option value="candidate" {{ request('role') == 'candidate' ? 'selected' : '' }}>Ứng viên
                                </option>
                                <option value="employer" {{ request('role') == 'employer' ? 'selected' : '' }}>Nhà tuyển
                                    dụng
                                </option>
                                <option value="content_manager"
                                    {{ request('role') == 'content_manager' ? 'selected' : '' }}>
                                    Người quản lý nội dung
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['Tên', 'Vai trò', 'Hành động']">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            @php
                                $roleLabels = [
                                    'admin' => 'Quản trị viên',
                                    'candidate' => 'Ứng viên',
                                    'employer' => 'Nhà tuyển dụng',
                                    'content_manager' => 'Quản lý nội dung',
                                ];
                            @endphp
                            <td>{{ $roleLabels[$user->role] ?? 'Không xác định' }}</td>
                            <td class="text-center">
                                <x-action-dropdown editRoute="admin.users.edit" deleteRoute="admin.users.destroy"
                                    :id="$user->id" />
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$users" />
            </div>
        </div>
    </div>
@endsection
