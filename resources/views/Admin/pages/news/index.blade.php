@extends('Admin.layouts.master')

@section('pageTitle', 'Tin tức')

@section('content')
@include('Admin.snippets.page_header')

<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách thông báo</h5>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.news.index') }}" method="GET" class="mb-3">
                <div class="row g-2">
                    <div class="col-12 col-md-4">
                        <x-clearable-input name="search" placeholder="Tìm kiếm theo tiêu đề tin tức"
                            :value="request('search')" />
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                    </div>
                </div>
            </form>

            <x-table-wrapper-cms :headers="['Tiêu đề','Ngày tạo', 'Hành động']">
                @foreach ($news as $item)
                <tr>
                    <td>{{ $item->title_ko }}</td>
                    <td>{{ date("Y-m-d",strtotime($item->created_at)) }}</td>
                    <td class="text-center">
                        <x-action-dropdown editRoute="admin.news.edit" deleteRoute="admin.news.destroy"
                            :id="$item->news_id" />
                    </td>
                </tr>
                @endforeach
            </x-table-wrapper-cms>

            <x-pagination-links-cms :paginator="$news" />
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // tạo Select2
        $('.select2').select2({
            placeholder: "Chọn một mục",
            allowClear: true
        });

        $(".change-status").click(function(e) {
            e.preventDefault();

            let newStatus = $(this).data("status");
            let updateUrl = $(this).data("url");
            let button = $(this).closest(".dropdown").find("button");

            $.ajax({
                url: updateUrl,
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        let statusText = {
                            published: "Xuất bản",
                            draft: "Nháp",
                        };
                        let statusClass = {
                            published: "bg-success bg-opacity-10 text-success",
                            draft: "btn-warning",
                        };

                        button.text(statusText[newStatus]);
                        button.removeClass(
                                "bg-success bg-opacity-10 text-success btn-warning")
                            .addClass(statusClass[newStatus]);
                    } else {
                        alert("Có lỗi xảy ra!");
                    }
                },
                error: function() {
                    alert("Có lỗi xảy ra khi cập nhật trạng thái.");
                }
            });
        });
    });
</script>
@endpush