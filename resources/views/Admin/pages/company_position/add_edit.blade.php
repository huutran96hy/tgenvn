@extends('Admin.layouts.master')

@section('pageTitle', isset($companyPosition) ? 'Chỉnh sửa tên vị trí chức vụ' : 'Thêm tên vị trí chức vụ')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    {{ isset($companyPosition) ? 'Chỉnh sửa tên vị trí chức vụ' : 'Thêm tên vị trí chức vụ' }}
                </h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($companyPosition) ? route('admin.company-position.update', $companyPosition->id) : route('admin.company-position.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($companyPosition))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tên vị trí <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $companyPosition->name ?? '') }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">{{ isset($companyPosition) ? 'Cập nhật' : 'Thêm mới' }}
                    </button>
                    <a href="{{ route('admin.company-position.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
