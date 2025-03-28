@extends('Admin.layouts.master')

@section('pageTitle', isset($config) ? 'Chỉnh sửa Cấu Hình' : 'Thêm Cấu Hình')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ isset($config) ? 'Chỉnh sửa Cấu Hình' : 'Thêm Cấu Hình' }}</h5>
                <a href="{{ route('admin.configs.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($config) ? route('admin.configs.update', $config->config_id) : route('admin.configs.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($config))
                        @method('PUT')
                    @endif

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="w-25">Key</th>
                                <td>
                                    <input type="text" name="config_key" class="form-control"
                                        value="{{ old('config_key', $config->config_key ?? '') }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Value</th>
                                <td>
                                    <textarea name="config_value" class="form-control" rows="3" required>{{ old('config_value', $config->config_value ?? '') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>
                                    <textarea name="description" class="form-control" rows="2">{{ old('description', $config->description ?? '') }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-end" style="margin-top: 15px">
                        <button type="submit"
                            class="btn btn-success">{{ isset($config) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
