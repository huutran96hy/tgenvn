@extends('Admin.layouts.master')

@section('pageTitle', 'Quy trình')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách quy trình</h5>
                <a href="{{ route('admin.processes.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.processes.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tên quy trình"
                                :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-3">
                            <select name="process_category_id" class="form-control select2">
                                <option value="">Tất cả danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->process_category_id }}"
                                        {{ request('category') == $category->process_category_id ? 'selected' : '' }}>
                                        {{ $category->category_name_ko ?? $category->category_name_vi }}</option>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['Tên quy trình', 'Danh mục', 'Hành động']">
                    @foreach ($processes as $item)
                        <tr>
                            <td>{{ $item->process_name_ko ?? $item->process_name_vi }}</td>
                            <td>{{ $item->category->category_name_ko ?? 'Không có' }}</td>
                            <td class="text-center">
                                <x-action-dropdown editRoute="admin.processes.edit" deleteRoute="admin.processes.destroy"
                                    :id="$item->process_id" />
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$processes" />
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

                let productstatus = $(this).data("status");
                let updateUrl = $(this).data("url");
                let button = $(this).closest(".dropdown").find("button");

                $.ajax({
                    url: updateUrl,
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        status: productstatus
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

                            button.text(statusText[productstatus]);
                            button.removeClass(
                                    "bg-success bg-opacity-10 text-success btn-warning")
                                .addClass(statusClass[productstatus]);
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
