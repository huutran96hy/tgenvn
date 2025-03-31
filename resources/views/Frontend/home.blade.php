@extends('Frontend.layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
    <main class="main">
        <section class="section-box">
            <div class="banner-main">
                <div class="banner-main banner-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide banner-slide">
                            <img src="./assets/imgs/page/homepage1/test.webp" alt="Slide 1" />
                        </div>
                        <div class="swiper-slide banner-slide">
                            <img src="./assets/imgs/page/homepage1/test1.png" alt="Slide 2" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box">
            <div class="section-box wow animate__animated animate__fadeIn">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">
                            Các công ty hợp tác
                        </h2>
                        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                            Chúng tôi luôn tìm kiếm công việc phù hợp cho bạn. Với hơn 1000+
                            tin tuyển dụng mới hàng ngày
                        </p>
                    </div>
                    <div class="box-swiper mt-50">
                        <div class="swiper-container swiper-group-5 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                @foreach ($employers as $employer)
                                    <div class="swiper-slide hover-up">
                                        <a href="{{ route('jobs.index') }}">
                                            <div class="item-logo">
                                                <img alt="{{ $employer->company_name }}" class="img-fluid d-block mx-auto"
                                                    style="max-height: 25px; min-height: 20px; object-fit: contain;"
                                                    src="{{ asset('storage/' . $employer->logo) }}" width="100%" />
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
