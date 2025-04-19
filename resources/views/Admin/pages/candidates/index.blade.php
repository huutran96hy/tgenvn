@extends('Admin.layouts.master')

@section('pageTitle', 'Ứng viên')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách ứng viên</h5>
                {{-- <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary">Thêm mới</a> --}}
            </div>

            <div class="card-body">
                {{-- <form action="{{ route('admin.candidates.index') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên hoặc số điện thoại" :value="request('search')" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form> --}}

                <x-table-wrapper-cms :headers="['Tệp hồ sơ (CV)', 'Hành động']">
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td>
                                <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank">
                                    Xem CV
                                </a>
                            </td>
                            <td class="text-center">
                                <x-action-dropdown deleteRoute="admin.candidates.destroy" :id="$candidate->candidate_id" />
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$candidates" />
            </div>
        </div>
    </div>
@endsection
