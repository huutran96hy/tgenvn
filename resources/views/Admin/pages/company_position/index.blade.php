@extends('Admin.layouts.master')

@section('pageTitle', 'Vị trí chức vụ')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách vị trí</h5>
                <a href="{{ route('admin.company-position.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.company-position.index') }}" method="GET" class="mb-3">
                    <div class="row g2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên vị trí" :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['STT', 'Tên vị trí', 'Hành động']">
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
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$positions" />
            </div>
        </div>
    </div>
@endsection
