@extends('Admin.layouts.master')

@section('pageTitle', 'Danh mục quy trình')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh mục quy trình</h5>
                <a href="{{ route('admin.process-categories.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.process-categories.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên danh mục" :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['Tên danh mục', 'Mô tả', 'Hành động']">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ Str::words($category->category_name_ko ?? 'Không có mô tả', 5) }}</td>
                            <td>{{ Str::words($category->description_ko ?? 'Không có mô tả', 5) }}</td>
                            <td class="text-center">
                                <x-action-dropdown editRoute="admin.process-categories.edit"
                                    deleteRoute="admin.process-categories.destroy" :id="$category->process_category_id" />
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$categories" />
            </div>
        </div>
    </div>
@endsection
