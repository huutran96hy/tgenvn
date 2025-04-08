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
                    <div class="row">
                        <div class="col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên kỹ năng" :value="request('search')" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Kỹ Năng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $skills->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
