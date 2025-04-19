@extends('Admin.layouts.master')

@section('pageTitle', 'Danh sách Cấu Hình')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách Cấu Hình</h5>
                {{-- <a href="{{ route('admin.configs.create') }}" class="btn btn-primary">Thêm mới</a> --}}
            </div>

            <div class="card-body">
                <form action="{{ route('admin.configs.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên cấu hình" :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['Key', 'Hành động']">
                    @foreach ($configs as $config)
                        <tr>
                            <td>{{ $config->key }}</td>
                            <td class="text-center">
                                <div class="d-flex">
                                    <a href="{{ route('admin.configs.edit', $config->id) }}" class="me-3">
                                        <i class="ph-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$configs" />
            </div>
        </div>
    </div>
@endsection
