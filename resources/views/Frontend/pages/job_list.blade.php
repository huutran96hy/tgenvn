@extends('Frontend.layouts.app')

@section('pageTitle', 'Việc làm mới nhất - Danh sách công việc hấp dẫn')

@push('meta')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <meta name="description"
        content="Tìm kiếm việc làm mới nhất từ các công ty hàng đầu. Danh sách việc làm hấp dẫn với nhiều cơ hội nghề nghiệp phù hợp cho bạn. Ứng tuyển ngay!">
@endpush

@section('content')
    <style>
        .form-find .form-input {
            height: 30px;
        }

        .form-find .btn-find {
            padding: 6px 12px;
        }

        .banner-hero .block-banner .form-find .btn-find {
            background-position: left 20px top 10px;
        }

        .select2-container .select2-selection--single {
            height: 38px;
            padding: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 20px;
            right: 5px;
        }

        .select-style-icon .select2 {
            border: none;
            padding: 0px;
        }

        .cb-container .checkmark-fix {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #3498db;
        }

        .cb-container .checkmark-fix:after {
            left: -2px;
            top: -3px;
            border-radius: 50%
        }
    </style>
    <main class="main">
        @include('Frontend.snippets.banner')

        @include('Frontend.layouts.header')

        <section class="section-box mt-3 mt-md-4">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5">
                                        <span class="text-small text-showing">
                                            Hiển thị <strong>{{ $jobs->firstItem() }}-{{ $jobs->lastItem() }}</strong> trên
                                            <strong>{{ $jobs->total() }}</strong> công việc
                                        </span>
                                    </div>
                                    <div class="col-xl-6 col-lg-7 text-end mt-sm-10">
                                        <div class="display-flex2">
                                            <div class="box-border mr-10">
                                                <span class="text-sortby">Hiển thị:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <span>{{ request('per_page', 12) }}</span><i
                                                            class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-light">
                                                        @foreach ([10, 12, 20] as $size)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ url()->current() }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => $size])) }}">
                                                                    {{ $size }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-border">
                                                <span class="text-sortby">Sắp xếp theo:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <span>
                                                            @if (request('sort', 'newest') == 'newest')
                                                                Mới nhất
                                                            @elseif(request('sort') == 'oldest')
                                                                Cũ nhất
                                                                {{-- @else
                                                                Đánh giá cao --}}
                                                            @endif
                                                        </span>
                                                        <i class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-light">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url()->current() }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'newest'])) }}">
                                                                Mới nhất
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url()->current() }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'oldest'])) }}">
                                                                Cũ nhất
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Spinner -->
                            <div class="loading-spinner d-none" id="loading-spinner">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Đang tải...</span>
                                </div>
                            </div>

                            <!-- Danh sách công việc -->
                            <div class="row" id="job-list-container">
                                @include('Frontendpartials.job_list_items', ['jobs' => $jobs])
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Lọc Nâng Cao<a class="link-reset" href="#" id="reset-filters">Xóa lọc</a></h5>
                                </div>

                                <div class="form-group select-style select-style-icon">
                                    <select class="form-select select2" id="location_filter">
                                        <option value="">Tất cả</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}-{{ Str::slug($province->name) }}">
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Ngành nghề</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox" id="job-category-checkbox-group">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" value="all" checked>
                                                    <span class="text-small">Tất cả</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>

                                            @foreach ($categories->take(5) as $category)
                                                <li class="category-item">
                                                    <label class="cb-container">
                                                        <input type="checkbox" value="{{ $category->category_id }}">
                                                        <span class="text-small">{{ $category->category_name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach

                                            @if ($categories->count() > 5)
                                                <div id="extra-items" style="display: none;">
                                                    @foreach ($categories->skip(5) as $category)
                                                        <li class="category-item">
                                                            <label class="cb-container">
                                                                <input type="checkbox"
                                                                    value="{{ $category->category_id }}">
                                                                <span class="text-small">{{ $category->category_name }}
                                                                </span>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </ul>

                                        @if ($categories->count() > 5)
                                            <button type="button" id="toggle-btn" class="btn btn-link p-0 mt-2">
                                                Xem thêm
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Vị trí</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox" id="company-position-checkbox-group">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" value="all" checked>
                                                    <span class="text-small">Tất cả</span>
                                                    <span class="checkmark checkmark-fix"></span>
                                                </label>
                                            </li>
                                            @foreach ($positions as $position)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" value="{{ $position->id }}">
                                                        <span class="text-small">{{ $position->name }}</span>
                                                        <span class="checkmark checkmark-fix"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                @php
                                    $salaryOptions = [
                                        ['label' => 'Tất cả', 'value' => 'all', 'checked' => true],
                                        ['label' => '10 - 20 triệu', 'value' => '10000000-20000000'],
                                        ['label' => '20 - 40 triệu', 'value' => '20000000-40000000'],
                                        ['label' => '40 - 60 triệu', 'value' => '40000000-60000000'],
                                        ['label' => '60 - 80 triệu', 'value' => '60000000-80000000'],
                                        ['label' => '80 - 100 triệu', 'value' => '80000000-100000000'],
                                        ['label' => 'Trên 100 triệu', 'value' => '>100000000'],
                                    ];
                                @endphp

                                <div class="form-group mb-20">
                                    <h5 class="medium-heading mb-25">Mức lương</h5>
                                    <ul class="list-checkbox" id="salary-checkbox-group">
                                        @foreach ($salaryOptions as $option)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" value="{{ $option['value'] }}"
                                                        {{ !empty($option['checked']) ? 'checked' : '' }}>
                                                    <span class="text-small">{{ $option['label'] }}</span>
                                                    <span class="checkmark checkmark-fix"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="form-group mb-20">
                                    <h5 class="medium-heading mb-25">Việc làm</h5>

                                    <label class="cb-container" for="only_valid_jobs">
                                        <input type="checkbox" id="only_valid_jobs" name="only_valid_jobs"
                                            {{ request('only_valid_jobs') === 'valid_jobs' ? 'checked' : '' }}
                                            value="valid_jobs">
                                        <span>Chỉ hiển thị việc làm còn hạn</span>
                                        <span class="checkmark checkmark-fix"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            const baseUrl = window.location.origin + window.location.pathname;
            const url = new URL(window.location.href);
            const urlParams = url.searchParams;
            // Hển thị việc làm còn hạn
            const onlyValidJobs = urlParams.get('only_valid_jobs');
            if (onlyValidJobs === 'valid_jobs') {
                $('#only_valid_jobs').prop('checked', true);
            }

            $('#only_valid_jobs').change(function() {
                if ($(this).is(':checked')) {
                    urlParams.set('only_valid_jobs', 'valid_jobs');
                } else {
                    urlParams.delete('only_valid_jobs');
                }
                fetchJobs(urlParams.toString());
            });

            // Reset filter
            $('#reset-filters').click(function(e) {
                e.preventDefault();

                url.search = '';
                urlParams.forEach((_, key) => urlParams.delete(key));

                // Reset tất cả checkbox về all
                $('ul.list-checkbox').each(function() {
                    const group = $(this);
                    group.find('input[type="checkbox"]').prop('checked', false);
                    group.find('input[value="all"]').prop('checked', true);
                });

                $('.select2').val(null).trigger('change');

                fetchJobs('');
            });

            function updateURLParam(param, value) {
                if (!value.length || value[0] === 'all') {
                    urlParams.delete(param);
                } else {
                    urlParams.set(param, value.join(','));
                }

                fetchJobs(urlParams.toString());
            }

            function fetchJobs(queryString) {
                $.ajax({
                    url: `${baseUrl}?${queryString}`,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#loading-spinner').removeClass('d-none'); // Hiện spinner
                        $('#job-list-container').html('');
                    },
                    success: function(res) {
                        $('#loading-spinner').addClass('d-none'); // Ẩn spinner
                        $('#job-list-container').html(res.html);

                        $('.paginations').html(res.pagination);

                        // Update text tổng số
                        if (res.data.total === 0) {
                            $('.text-showing').html("Không có công việc nào.");
                        } else {
                            $('.text-showing').html(
                                `Hiển thị <strong>${res.data.from}-${res.data.to}</strong> trên <strong>${res.data.total}</strong> công việc`
                            );
                        }

                        // Update URL
                        window.history.pushState({}, '', `${baseUrl}?${queryString}`);
                    },
                    error: function() {
                        $('#loading-spinner').addClass('d-none'); // Ẩn spinner 
                        $('#job-list-container').html('<p>Lỗi khi tải dữ liệu!</p>');
                    }
                });
            }

            function initCheckboxGroup(param, groupSelector, multiple = false) {
                const paramValue = urlParams.get(param);
                if (paramValue) {
                    const selected = paramValue.split(',');
                    $(`${groupSelector} input[type="checkbox"]`).each(function() {
                        $(this).prop('checked', selected.includes($(this).val()));
                    });
                }

                $(`${groupSelector} input[type="checkbox"]`).change(function() {
                    const value = $(this).val();

                    if (value === 'all') {
                        $(`${groupSelector} input[type="checkbox"]`).prop('checked', false);
                        $(this).prop('checked', true);
                        updateURLParam(param, []);
                    } else {
                        $(`${groupSelector} input[value="all"]`).prop('checked', false);

                        if (!multiple) {
                            // Bỏ chọn tất cả trừ checkbox hiện tại
                            $(`${groupSelector} input[type="checkbox"]`).not(this).prop('checked', false);
                            $(this).prop('checked', true);
                        }

                        const selected = $(`${groupSelector} input[type="checkbox"]:checked`)
                            .map(function() {
                                return $(this).val();
                            }).get();

                        updateURLParam(param, selected);
                    }
                });
            }

            function initSelectFilter(param, selector) {
                const paramValue = urlParams.get(param);
                if (paramValue) $(selector).val(paramValue);

                $(selector).change(function() {
                    updateURLParam(param, [$(this).val()]);
                });
            }

            // Pagination
            $(document).on('click', '.paginations a', function(e) {
                e.preventDefault();
                const url = new URL($(this).attr('href'));
                fetchJobs(url.searchParams.toString());
            });

            // Sorting
            $(document).on('click', '.dropdown-menu a', function(e) {
                e.preventDefault();

                const link = new URL($(this).attr('href'));
                const clickedParams = link.searchParams;

                for (let [key, value] of clickedParams.entries()) {
                    urlParams.set(key, value);
                }

                // Reset page về 1 khi đổi sort/per_page
                urlParams.delete('page');

                fetchJobs(urlParams.toString());
            });

            // Init các filter
            initCheckboxGroup('job_category', '#job-category-checkbox-group', true); // ngành nghề - chọn nhiều
            initCheckboxGroup('salary_range', '#salary-checkbox-group', false);
            initCheckboxGroup('position', '#company-position-checkbox-group', false);
            initSelectFilter('location', '#location_filter');

            // Select2
            $('.select2').select2({
                placeholder: "Chọn địa điểm",
                allowClear: true,
            });

            // Xem thêm / ẩn bớt danh mục
            $('#toggle-btn').click(function() {
                const $extra = $('#extra-items');
                $extra.slideToggle(500);

                const isExpanded = $(this).text() === 'Ẩn bớt';
                $(this).text(isExpanded ? 'Xem thêm' : 'Ẩn bớt');
            });
        });
    </script>
@endpush
