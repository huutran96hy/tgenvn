@extends('Frontend.layouts.app')

@section('pageTitle', 'Danh sách tin tức')

@push('meta')
    <meta name="description"
        content="Cập nhật tin tức mới nhất với những bài viết chất lượng về nhiều chủ đề hấp dẫn. Khám phá thông tin nóng hổi, phân tích chuyên sâu và xu hướng mới nhất.">
@endpush

@section('content')
    <main class="main">
        <section class="section-box">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="mb-10">Tin tức</h2>
                            <p class="font-lg color-text-paragraph-2">Cập nhập tin tức mới nhất</p>
                        </div>
                        <div class="col-lg-6 text-end">
                            <ul class="breadcrumbs mt-40">
                                <li><a class="home-icon" href="{{ route('index') }}">Trang chủ</a></li>
                                <li>Tin tức</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-5">
                            <div class="card-grid-5 hover-up"
                                style="background-image: url('assets/imgs/page/blog/img-big1.png')"><a href="blog-details">
                                    <div class="box-cover-img">
                                        <div class="content-bottom">
                                            <h3 class="color-white mb-20">Hướng dẫn viết CV đúng chuẩn thiết kế</h3>
                                            <div class="author d-flex align-items-center mr-20"><img class="mr-10"
                                                    alt="jobBox" src="assets/imgs/page/candidates/user3.png"><span
                                                    class="color-white font-sm mr-25">Nguyễn
                                                    Đăng Khánh</span><span class="color-white font-sm">25/03/2025</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="section-box mt-50">
            <div class="post-loop-grid">
                <div class="container">
                    <div class="text-left">
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Bài viết mới</h2>
                        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                            Đừng bỏ lỡ tin tức mới nhất
                        </p>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-8">
                            <div class="row">
                                @foreach ($news as $item)
                                    <div class="col-lg-6 mb-30">
                                        <div class="card-grid-3 hover-up">
                                            <div class="text-center card-grid-3-image">
                                                <a href="{{ route('news.show', $item->slug) }}">
                                                    <figure><img alt="{{ $item->title }}" src="{{ asset($item->images) }}">
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-block-info">
                                                <div class="tags mb-15">
                                                    <a class="btn btn-tag" href="#">
                                                        {{ $item->category->category_name }}
                                                    </a>
                                                </div>
                                                <h5>
                                                    <a href="{{ route('news.show', $item->slug) }}">
                                                        {{ $item->title }}
                                                    </a>
                                                </h5>
                                                <!-- <span class="mt-10 color-text-paragraph font-sm">
                                                    {!! Str::limit($item->content, 50) !!}
                                                </span> -->
                                                <div class="card-2-bottom mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-6">
                                                            <div class="d-flex">
                                                                <img class="img-rounded"
                                                                    src="{{ asset('assets/images/demo/users/face9.jpg') }}">
                                                                <div class="info-right-img">
                                                                    <span class="font-sm font-bold color-brand-1 op-70">
                                                                        {{ $item->author->name }}
                                                                    </span>
                                                                    <br>
                                                                    <span class="font-xs color-text-paragraph-2">
                                                                        {{ $item->created_at->format('d/m/Y') }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 text-end col-6 pt-15">
                                                            <span class="color-text-paragraph-2 font-xs">5 phút đọc</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="paginations">
                                {{ $news->appends(request()->query())->links('Frontend.pagination.custom') }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                            <div class="widget_search mb-40">
                                <div class="search-form">
                                    <form action="{{ route('news.index') }}" method="GET">
                                        <input type="text" name="search" placeholder="Tìm kiếm bài viết..."
                                            value="{{ request('search') }}">
                                        <button type="submit"><i class="fi-rr-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="sidebar-shadow sidebar-news-small">
                                <h5 class="sidebar-title">Xu Hướng Khoa Học</h5>
                                <div class="post-list-small">
                                    <div class="post-list-small-item d-flex align-items-center">
                                        <figure class="thumb mr-15"><img src="assets/imgs/page/blog/img-trending.png"
                                                alt="science-news">
                                        </figure>
                                        <div class="content">
                                            <h5>Phát Hiện Mới về Hành Tinh Ngoài Hệ Mặt Trời</h5>
                                            <div class="post-meta text-muted d-flex align-items-center mb-15">
                                                <div class="author d-flex align-items-center mr-20">
                                                    <img alt="science-news"
                                                        src="assets/imgs/page/homepage1/user1.png"><span>TS. Nguyễn
                                                        An</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="sidebar-border-bg bg-right"><span class="text-grey">ỨNG VIÊN CẦN</span><span
                                    class="text-hiring">CHÚNG TÔI CÓ</span>
                                <h4 class="font-xs color-text-paragraph mt-5">Giúp ứng viên nhanh chóng tìm công việc phù
                                    hợp</h4>
                                <div class="mt-15"><a class="btn btn-paragraph-2" href="#">Tìm hiểu thêm</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
