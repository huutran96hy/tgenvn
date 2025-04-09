@extends('Admin.layouts.master')

@section('pageTitle', 'Vị trí chức vụ')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách danh mục tin tức</h5>
                <a href="{{ route('admin.company-position.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.company-position.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên vị trí" :value="request('search')" />
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên vị trí</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $index => $position)
                            <tr>
                                <td>{{ $positions->firstItem() + $index }}</td>
                                <td>{{ $position->name }}</td>
                                <td class="text-center">
                                    <x-action-dropdown editRoute="admin.company-position.edit"
                                        deleteRoute="admin.company-position.destroy" :id="$position->id" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $positions->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
