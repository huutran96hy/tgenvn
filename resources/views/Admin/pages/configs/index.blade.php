@extends('Admin.layouts.master')

@section('pageTitle', 'Danh sách Cấu Hình')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách Cấu Hình</h5>
                <a href="{{ route('admin.configs.create') }}" class="btn btn-primary">+ Thêm</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.configs.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm cấu hình"
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Key</th>
                            <th>Value</th>
                            <th>Mô tả</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($configs as $config)
                            <tr>
                                {{-- <td>{{ $config->config_id }}</td> --}}
                                <td>{{ $config->config_key }}</td>
                                <td>{{ $config->config_value }}</td>
                                <td>{{ $config->description }}</td>
                                <td class="text-center">
                                    <x-action-dropdown editRoute="admin.configs.edit" deleteRoute="admin.configs.destroy"
                                        :id="$config->config_id" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $configs->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
