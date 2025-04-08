@extends('Admin.layouts.master')

@section('pageTitle', 'Đơn ứng tuyển')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách đơn ứng tuyển</h5>
                {{-- <a href="{{ route('admin.applications.create') }}" class="btn btn-primary">Thêm mới</a> --}}
            </div>

            <div class="card-body">
                <form action="{{ route('admin.applications.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo ứng viên"
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-control">
                                <option value="">Tất cả trạng thái</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ
                                    duyệt
                                </option>
                                <option value="interviewed" {{ request('status') == 'interviewed' ? 'selected' : '' }}>Đã
                                    phỏng vấn</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Từ
                                    chối
                                </option>
                                <option value="hired" {{ request('status') == 'hired' ? 'selected' : '' }}>Đã
                                    tuyển
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ứng viên</th>
                            <th>Công việc</th>
                            <th>Ngày ứng tuyển</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                {{-- <td>{{ $application->candidate->name ?? 'Không xác định' }}</td> --}}
                                <td>
                                    @if ($cv = optional($application->candidate)->resume)
                                        <a href="{{ asset('storage/' . $cv) }}" target="_blank">Xem CV</a>
                                    @else
                                        <span>Không có CV</span>
                                    @endif
                                </td>
                                <td>{{ $application->job->job_title ?? 'Không có' }}</td>
                                <td>{{ $application->application_date }}</td>
                                <td>
                                    @php
                                        $badgeClass = '';
                                        $badgeText = '';

                                        switch ($application->status) {
                                            case 'pending':
                                                $badgeClass = 'warning';
                                                $badgeText = 'Chờ duyệt';
                                                break;
                                            case 'interviewed':
                                                $badgeClass = 'primary';
                                                $badgeText = 'Đã phỏng vấn';
                                                break;
                                            case 'rejected':
                                                $badgeClass = 'danger';
                                                $badgeText = 'Từ chối';
                                                break;
                                            case 'hired':
                                                $badgeClass = 'success';
                                                $badgeText = 'Đã tuyển';
                                                break;
                                            default:
                                                $badgeClass = 'secondary';
                                                $badgeText = 'Không xác định';
                                                break;
                                        }
                                    @endphp

                                    <span class="badge bg-{{ $badgeClass }} bg-opacity-10 text-{{ $badgeClass }}">
                                        {{ $badgeText }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <x-action-dropdown editRoute="admin.applications.edit"
                                        deleteRoute="admin.applications.destroy" :id="$application->application_id" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $applications->appends(request()->query())->links('Admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
