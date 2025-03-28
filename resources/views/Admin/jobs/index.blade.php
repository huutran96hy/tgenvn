@extends('layouts.admin.master')

@section('title', 'Quản lý tin tuyển dụng')

@section('page_header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Quản lý tin tuyển dụng - <span class="fw-normal">Danh sách tin tuyển dụng</span>
            </h4>
            <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
        <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
            <!-- Bạn có thể thêm breadcrumb hoặc các thành phần header bổ sung tại đây -->
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center py-0">
        <h5 class="py-3 mb-0">Danh sách tin tuyển dụng</h5>
        <div class="ms-auto my-auto">
            <a type="button" class="btn btn-primary" href="{{route('jobs.create')}}">Thêm mới</a>
        </div>
    </div>
    <table class="table datatable-basic table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề công việc</th>
                <th>Nhà tuyển dụng</th>
                <th>Ngày đăng</th>
                <th>Ngày hết hạn</th>
                <th>Người đăng</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->job_title }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->posted_date }}</td>
                <td>{{ $item->expiry_date }}</td>
                <td>{{ $item->category->name ?? '' }}</td>
                <td>
                    <a href="{{route('jobs.edit',$item->job_id)}}" class="btn btn-outline-primary p-1"><i class="far fa-edit"></i></a>
                    <form action="{{ route('jobs.destroy', $item->job_id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger p-1"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Không có tin tuyển dụng nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>
<!-- Nếu cần, bạn có thể thêm các script bổ sung riêng cho trang này -->
@endsection