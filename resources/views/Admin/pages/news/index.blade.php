@extends('Admin.layouts.master')

@section('pageTitle', 'Tin tức')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách tin tức</h5>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.news.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <x-clearable-input name="search" placeholder="Tìm kiếm theo tiêu đề tin tức"
                                :value="request('search')" />
                        </div>
                        <div class="col-12 col-md-3">
                            <select name="news_category_id" class="form-control select2">
                                <option value="">Tất cả danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->news_category_id }}"
                                        {{ request('category') == $category->news_category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['Tiêu đề', 'Danh mục', 'Tác giả', 'Ngày xuất bản', 'Trạng thái', 'Hành động']">
                    @foreach ($news as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->category_name ?? 'Không có' }}</td>
                            <td>{{ $item->author->name ?? 'Ẩn danh' }}</td>
                            <td>{{ $item->published_date }}</td>
                            <td>
                                <div class="dropdown">
                                    <button
                                        class="btn btn-sm dropdown-toggle 
                                        {{ $item->status == 'published' ? 'bg-success bg-opacity-10 text-success' : 'btn-warning' }}"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if ($item->status == 'published')
                                            Xuất bản
                                        @else
                                            Nháp
                                        @endif
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item change-status"
                                                data-url="{{ route('admin.news.update-status', $item->news_id) }}"
                                                data-status="published">Xuất bản</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item change-status"
                                                data-url="{{ route('admin.news.update-status', $item->news_id) }}"
                                                data-status="draft">Nháp</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
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
