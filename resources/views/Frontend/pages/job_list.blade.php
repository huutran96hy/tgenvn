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
                                                            @else
                                                                Đánh giá cao
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
                                                <span class="flash"></span>
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
                                    <h5>Bộ Lọc <a class="link-reset" href="#" id="reset-filters">Làm mới</a></h5>
                                </div>

                                <div class="form-group select-style select-style-icon">
                                    <select class="form-select select2" id="location_filter">
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
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" value="{{ $category->category_id }}">
                                                        <span class="text-small">{{ $category->category_name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
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
                                    <h5 class="medium-heading mb-10">Vị trí tuyển dụng</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox" id="position-checkbox-group">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" value="Senior">
                                                    <span class="text-small">Senior</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" value="Junior">
                                                    <span class="text-small">Junior</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" value="Fresher">
                                                    <span class="text-small">Fresher</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}

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
            $('#reset-filters').click(function(e) {
                e.preventDefault(); // Ngăn load lại trang mặc định

                const baseUrl = window.location.origin + window.location.pathname;
                window.location.href = baseUrl;
            });

            const url = new URL(window.location.href);
            const urlParams = url.searchParams;

            // Helper function to update URL params
            function updateURLParam(param, value) {
                if (value.length === 0) {
                    urlParams.delete(param); // Xóa tham số nếu không có giá trị
                } else {
                    urlParams.set(param, value.join(',')); // Set tham số với giá trị mới
                }
                window.location.href = url.toString(); // Tải lại trang với URL mới
            }

            // --- Handle Job Categories ---
            const jobCategoryParam = urlParams.get('job_category');
            if (jobCategoryParam) {
                const selectedCategory = jobCategoryParam.split(',')[0];
                $('#job-category-checkbox-group input[type="checkbox"]').each(function() {
                    const val = $(this).val();
                    $(this).prop('checked', val === selectedCategory);
                });
            }

            $('#job-category-checkbox-group input[type="checkbox"]').change(function() {
                const clickedValue = $(this).val();

                // Nếu "Tất cả" được chọn, xóa tham số job_category
                if (clickedValue === 'all') {
                    $('#job-category-checkbox-group input[type="checkbox"]').prop('checked', false);
                    $(this).prop('checked', true);
                    updateURLParam('job_category', []);
                } else {
                    $('#job-category-checkbox-group input[value="all"]').prop('checked', false);
                    $('#job-category-checkbox-group input[type="checkbox"]').not(this).prop('checked',
                        false);
                    $(this).prop('checked', true);

                    let selectedCategories = [];
                    $('#job-category-checkbox-group input[type="checkbox"]:checked').each(function() {
                        selectedCategories.push($(this).val());
                    });
                    updateURLParam('job_category', selectedCategories);
                }
            });

            // --- Handle Salary Range ---
            const salaryParam = urlParams.get('salary_range');
            if (salaryParam) {
                const selectedSalary = salaryParam.split(',')[0];
                $('#salary-checkbox-group input[type="checkbox"]').each(function() {
                    const val = $(this).val();
                    $(this).prop('checked', val === selectedSalary);
                });
            }

            $('#salary-checkbox-group input[type="checkbox"]').change(function() {
                const clickedValue = $(this).val();

                // Nếu "Tất cả" được chọn, xóa tham số salary_range
                if (clickedValue === 'all') {
                    $('#salary-checkbox-group input[type="checkbox"]').prop('checked', false);
                    $(this).prop('checked', true);
                    updateURLParam('salary_range', []);
                } else {
                    $('#salary-checkbox-group input[value="all"]').prop('checked', false);
                    $('#salary-checkbox-group input[type="checkbox"]').not(this).prop('checked', false);
                    $(this).prop('checked', true);

                    let selectedSalaries = [];
                    $('#salary-checkbox-group input[type="checkbox"]:checked').each(function() {
                        selectedSalaries.push($(this).val());
                    });
                    updateURLParam('salary_range', selectedSalaries);
                }
            });

            // --- Handle Location Filter ---
            const locationParam = urlParams.get('location');
            if (locationParam) {
                $('#location_filter').val(locationParam);
            }

            $('#location_filter').change(function() {
                const selectedLocation = $(this).val();
                updateURLParam('location', [selectedLocation]); // Cập nhật tham số location
            });

            // --- Handle Company Position ---
            const positionParam = urlParams.get('position');
            if (positionParam) {
                const selectedPosition = positionParam.split(',')[0];
                $('#company-position-checkbox-group input[type="checkbox"]').each(function() {
                    const val = $(this).val();
                    $(this).prop('checked', val === selectedPosition);
                });
            }

            $('#company-position-checkbox-group input[type="checkbox"]').change(function() {
                const clickedValue = $(this).val();

                // Nếu "Tất cả" được chọn, xóa tham số position
                if (clickedValue === 'all') {
                    $('#company-position-checkbox-group input[type="checkbox"]').prop('checked', false);
                    $(this).prop('checked', true);
                    updateURLParam('position', []);
                } else {
                    $('#company-position-checkbox-group input[value="all"]').prop('checked', false);
                    $('#company-position-checkbox-group input[type="checkbox"]').not(this).prop('checked',
                        false);
                    $(this).prop('checked', true);

                    let selectedCategories = [];
                    $('#company-position-checkbox-group input[type="checkbox"]:checked').each(function() {
                        selectedCategories.push($(this).val());
                    });
                    updateURLParam('position', selectedCategories);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
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
        });
    </script>
@endpush
