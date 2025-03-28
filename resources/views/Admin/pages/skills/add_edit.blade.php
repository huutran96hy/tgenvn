@extends('Admin.layouts.master')

@section('pageTitle', isset($skill) ? 'Chỉnh sửa kỹ năng' : 'Thêm kỹ năng')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($skill) ? 'Chỉnh sửa kỹ năng' : 'Thêm kỹ năng' }}</h5>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($skill) ? route('admin.skills.update', $skill->skill_id) : route('admin.skills.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($skill))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Tên kỹ năng</label>
                        <input type="text" name="skill_name" class="form-control"
                            value="{{ old('skill_name', $skill->skill_name ?? '') }}" required>
                    </div>

                    <button type="submit"
                        class="btn btn-success">{{ isset($skill) ? 'Cập nhật kỹ năng' : 'Thêm kỹ năng' }}</button>
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
