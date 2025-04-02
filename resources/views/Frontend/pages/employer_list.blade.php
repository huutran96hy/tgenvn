@extends('Frontend.layouts.app')

@section('pageTitle', 'Danh sách công ty')

@push('meta')
    <meta name="description"
        content="Khám phá danh sách các công ty hàng đầu, tìm kiếm nhà tuyển dụng uy tín và cơ hội việc làm hấp dẫn. Cập nhật thông tin chi tiết về các doanh nghiệp tại đây.">
@endpush

@section('content')
    <main class="main">
        <div class="container pt-10">
            <div class="banner-hero banner-single banner-single-bg">
                <div class="block-banner text-center">
                    <h3><span class="color-brand-2">600+ Deal </span> tuyển dụng ngay</h3>
                    <div class="font-sm color-text-paragraph-2 mt-10">Kết nối với nhiều doanh nghiệp toàn quốc</div>
                    <div class="form-find text-start mt-40">
                        <form method="GET" action="{{ route('employers.index') }}">
                            {{-- <select name="industry" class="form-input">
                                <option value="">Ngành nghề</option>
                                @foreach ($industries as $id => $name)
                                    <option value="{{ $id }}" {{ request('industry') == $id ? 'selected' : '' }}>
                        {{ $name }}</option>
                        @endforeach
                        </select>
                        <select name="province" class="form-input">
                            <option value="">Chọn tỉnh/TP</option>
                            @foreach ($provinces as $code => $name)
                            <option value="{{ $code }}"
                                {{ request('province') == $code ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select> --}}
                            <input name="keyword" type="text" class="form-input" placeholder="Nhập từ khoá..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-box mt-30">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5">
                                        <span class="text-small text-showing">Hiển thị
                                            <strong>{{ $employers->firstItem() }}-{{ $employers->lastItem() }} </strong>trên
                                            <strong>{{ $employers->total() }} </strong>nhà tuyển dụng</span>
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
                                @foreach ($employers as $employer)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn"
                                            style="padding:0px">
                                            <div class="banner-hero banner-image-single" style="padding-top:0px">
                                                <img src="{{ \App\Helpers\CustomHelper::logoSrc($employer->background_img) }}"
                                                    alt="jobbox"
                                                    style="border-radius: 0px;height:112px;width:100%;object-fit:cover">
                                            </div>
                                            <div class="box-company-profile" style="padding-top:8px">
                                                <div class="image-compay" style="top: -70px">
                                                    <img style="width:125px;height:65px;border-radius:8px;object-fit: cover;background: #fff;padding: 10px;"
                                                        src="{{ \App\Helpers\CustomHelper::logoSrc($employer->logo) }}"
                                                        alt="jobbox">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 text-start">
                                                        <h5 class="f-18"
                                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                            <a href="{{ route('employers.show', $employer->slug) }}">
                                                                {{ $employer->company_name }}</a>
                                                        </h5>
                                                        <p class="mt-0 font-md color-text-paragraph-2 mb-5"><span
                                                                class="card-location d-block">{{ $employer->address }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 text-end p-0 mb-2"><a
                                                            class="btn btn-apply btn-apply-big"
                                                            href="{{ route('employers.show', $employer->slug) }}"
                                                            style="padding: 15px 25px">{{ $employer->jobs_count }} Công
                                                            việc</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination">
                                {{ $employers->appends(request()->query())->links('Frontend.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
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
        });
    </script>
@endpush
