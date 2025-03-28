@extends('layouts.admin.master')

@section('title', 'Quản lý Tin tức')

@section('page_header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Quản lý Tin tức - <span class="fw-normal">Danh sách tin tức</span>
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
        <h5 class="py-3 mb-0">Danh sách tin tức</h5>
        <div class="ms-auto my-auto">
            <button type="button" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
    <!-- Bảng tin tức sử dụng DataTables (lấy cảm hứng từ bảng được cắt từ file datatable mẫu) -->
    <table class="table datatable-basic">
    <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Tác giả</th>
                <th>Chuyên mục</th>
                <th>Ngày đăng</th>
                <th>Ngày cập nhật</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{!! Str::limit($item->content, 100) !!}</td>
                <td>
                    {{-- Giả sử có relationship author --}}
                    {{ $item->author->name ?? 'N/A' }}
                </td>
                <td>
                    {{-- Giả sử có relationship newsCategory --}}
                    {{ $item->newsCategory->name ?? 'N/A' }}
                </td>
                <td>{{ $item->published_date ? $item->published_date->format('d M Y') : 'Chưa đăng' }}</td>
                <td>{{ $item->updated_date ? $item->updated_date->format('d M Y') : 'Chưa cập nhật' }}</td>
                <td>
                    @if($item->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>
                    <!-- Ví dụ: nút sửa và xóa -->
                    <a href="" class="btn btn-outline-primary p-1"><i class="far fa-edit"></i></a>
                    <form action="" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger p-1"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Không có tin tức nào.</td>
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