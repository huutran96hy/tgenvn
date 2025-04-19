@extends('Admin.layouts.master')

@section('pageTitle', 'Danh sách Kỹ Năng')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách Kỹ Năng</h5>
                <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.skills.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên kỹ năng" :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['STT', 'Tên Kỹ Năng', 'Hành động']">
                    @foreach ($skills as $index => $skill)
                        <tr>
                            <td>{{ $skills->firstItem() + $index }}</td>
                            <td>{{ $skill->skill_name }}</td>
                            <td class="text-center">
                                <x-action-dropdown editRoute="admin.skills.edit" deleteRoute="admin.skills.destroy"
                                    :id="$skill->skill_id" />
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$skills" />
            </div>
        </div>
    </div>
@endsection
