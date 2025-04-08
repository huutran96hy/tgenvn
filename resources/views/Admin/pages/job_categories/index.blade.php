@extends('Admin.layouts.master')

@section('pageTitle', 'Danh mục công việc')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách danh mục công việc</h5>
                <a href="{{ route('admin.job-categories.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.job-categories.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên danh mục" :value="request('search')" />
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->description ?? 'Không có mô tả' }}</td>
                                <td class="text-center">
                                    <x-action-dropdown editRoute="admin.job-categories.edit"
                                        deleteRoute="admin.job-categories.destroy" :id="$category->category_id" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $categories->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
