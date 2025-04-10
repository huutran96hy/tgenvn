@extends('Frontend.layouts.app')

@section('pageTitle', 'Danh sách công việc')

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
    </style>
    <main class="main">
        @include('Frontend.snippets.banner')

        @include('Frontend.layouts.header')

        <section class="section-box mt-30">
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
                                    <div class="col-xl-6 col-lg-7 text-end mt-sm-15">
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
                                                        {{-- <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url()->current() }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'rating'])) }}">
                                                                Đánh giá cao
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($jobs as $job)
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left" style="padding:15px">
                                                <span class="flash {{ $job->is_hot == 'yes' ? '' : 'd-none' }}">
                                                </span>
                                                <div class="image-box" style="padding-right: 20px;">
                                                    <img src="{{ \App\Helpers\CustomHelper::logoSrc($job->employer->logo) }}"
                                                        alt="{{ $job->employer->name }}"
                                                        style="width: 100px; height: 100px;border-radius:8px; object-fit:contain;background:#ffff; ;box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                                </div>
                                                <div class="right-info">
                                                    <a class="name-job" href="{{ route('job_detail.show', $job->slug) }}">
                                                        {{ $job->job_title }}
                                                    </a>
                                                    <h6>
                                                        <a href="{{ route('job_detail.show', $job->slug) }}">
                                                            {{ $job->employer->company_name }}
                                                        </a>
                                                    </h6>
                                                    <span class="location-small">
                                                        {{ $job->province->name ?? $job->location }}
                                                    </span>
                                                    <div class="tags">
                                                        {{ \App\Helpers\NumberHelper::formatSalary($job->salary) }} |
                                                        @foreach ($job->skills as $skill)
                                                            <a class="btn btn-grey-small mr-5"
                                                                href="{{ route('jobs.index') }}">
                                                                {{ $skill->skill_name }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="paginations">
                                {{ $jobs->appends(request()->query())->links('Frontend.pagination.custom') }}
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
                                                                <span
                                                                    class="text-small">{{ $category->category_name }}</span>
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
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @foreach ($positions as $position)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" value="{{ $position->id }}">
                                                        <span class="text-small">{{ $position->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group mb-20">
                                    <h5 class="medium-heading mb-25">Mức lương</h5>
                                    <ul class="list-checkbox" id="salary-checkbox-group">
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value="all" checked>
                                                <span class="text-small">Tất cả</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value="10000000-20000000">
                                                <span class="text-small">10-20.000.000đ</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value="20000000-40000000">
                                                <span class="text-small">20-40.000.000đ</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value="40000000-60000000">
                                                <span class="text-small">40-60.000.000đ</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value="60000000-80000000">
                                                <span class="text-small">60-80.000.000đ</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value="80000000-100000000">
                                                <span class="text-small">80-100.000.000đ</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" value=">100000000">
                                                <span class="text-small">>100.000.000đ</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                {{-- <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Từ khoá nổi bật</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Kỹ
                                                        sư phần mềm</span><span class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Kỹ sư phần
                                                        cứng</span><span class="checkmark"></span>
                                                </label><span class="number-item">57</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>                            
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Kinh nghiệm</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Internship</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Entry
                                                        Level</span><span class="checkmark"></span>
                                                </label><span class="number-item">87</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Associate</span><span class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Mid Level</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">45</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Director</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Executive</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">89</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Làm việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">On-site</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Remote</span><span class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Hybrid</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">58</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Thời gian đăng</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Tất
                                                        cả</span><span class="checkmark"></span>
                                                </label><span class="number-item">78</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">1 ngày
                                                        trước</span><span class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">7 ngày
                                                        trước</span><span class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">30 ngày
                                                        trước</span><span class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Loại công việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Full Time</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">25</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Part Time</span><span class="checkmark"></span>
                                                </label><span class="number-item">64</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Remote</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">78</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Freelancer</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">97</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}
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

            $('#reset-filters').click(function(e) {
                e.preventDefault();
                window.location.href = baseUrl;
            });

            function updateURLParam(param, value) {
                if (!value.length || value[0] === 'all') {
                    urlParams.delete(param);
                } else {
                    urlParams.set(param, value.join(','));
                }
                window.location.href = url.toString();
            }

            function initCheckboxGroup(param, groupSelector) {
                const paramValue = urlParams.get(param);
                if (paramValue) {
                    const selected = paramValue.split(',')[0];
                    $(`${groupSelector} input[type="checkbox"]`).prop('checked', function() {
                        return $(this).val() === selected;
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
                        $(`${groupSelector} input[type="checkbox"]`).not(this).prop('checked', false);
                        $(this).prop('checked', true);

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

            // Init các nhóm lọc
            initCheckboxGroup('job_category', '#job-category-checkbox-group');
            initCheckboxGroup('salary_range', '#salary-checkbox-group');
            initCheckboxGroup('position', '#company-position-checkbox-group');
            initSelectFilter('location', '#location_filter');
        });
    </script>

    <script>
        $(document).ready(function() {
            // Sorting for jobs
            $('.dropdown-item').on('click', function(event) {
                event.preventDefault(); // Ngăn chặn load trang
                let url = $(this).attr('href');

                $.ajax({
                    url: url,
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(data) {
                        let newContent = $(data).find('.content-page').html();
                        $('.content-page').html(newContent);
                        window.history.pushState({}, '', url);
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi khi tải dữ liệu:', error);
                    }
                });
            });

            // tạo Select2
            $('.select2').select2({
                placeholder: "Chọn địa điểm",
                allowClear: true,
            });

            // Show more for job-category 
            $('#toggle-btn').click(function() {
                const $extra = $('#extra-items');
                $extra.slideToggle(500);

                const isExpanded = $(this).text() === 'Ẩn bớt';
                $(this).text(isExpanded ? 'Xem thêm' : 'Ẩn bớt');
            });
        });
    </script>
@endpush
