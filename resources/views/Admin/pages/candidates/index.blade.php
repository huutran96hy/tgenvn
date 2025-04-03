@extends('Admin.layouts.master')

@section('pageTitle', 'Ứng viên')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách ứng viên</h5>
                <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.candidates.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control"
                                placeholder="Tìm kiếm theo tên hoặc số điện thoại" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            {{-- <th>Họ và Tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th> --}}
                            <th>Tệp hồ sơ (CV)</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                            <tr>
                                {{-- <td>{{ $candidate->full_name }}</td>
                                <td>{{ $candidate->phone }}</td>
                                <td>{{ $candidate->address ?? 'N/A' }}</td> --}}
                                <td>
                                    <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank">
                                        Xem CV
                                    </a>
                                </td>
                                <td class="text-center">
                                    <x-action-dropdown editRoute="admin.candidates.edit"
                                        deleteRoute="admin.candidates.destroy" :id="$candidate->candidate_id" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $candidates->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
