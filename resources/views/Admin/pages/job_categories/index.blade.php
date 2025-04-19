@extends('Admin.layouts.master')

@section('pageTitle', 'Danh mục công việc')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh mục công việc</h5>
                <a href="{{ route('admin.job-categories.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.job-categories.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên danh mục" :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['Tên danh mục', 'Mô tả', 'Hành động']">
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
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$categories" />
            </div>
        </div>
    </div>
@endsection
