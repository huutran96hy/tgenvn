@extends('Admin.layouts.master')

@section('pageTitle', 'Nhà tuyển dụng')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách công ty</h5>
                <a href="{{ route('admin.employers.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.employers.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên công ty" :value="request('search')" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Công ty</th>
                            <th>Website</th>
                            <th>Liên hệ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employers as $employer)
                            <tr>
                                <td>{{ $employer->company_name }}</td>
                                <td>{{ $employer->website ?? 'N/A' }}</td>
                                <td>{{ $employer->contact_phone }}</td>
                                <td class="text-center">
                                    <x-action-dropdown editRoute="admin.employers.edit"
                                        deleteRoute="admin.employers.destroy" :id="$employer->employer_id" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $employers->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
