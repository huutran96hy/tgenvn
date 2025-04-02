@extends('Frontend.layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
<main class="main">
    <section class="section-box">
        @php
        $banners = json_decode(\App\Models\Config::where('key', 'banners')->value('value') ?? '[]', true);
        @endphp
        <div class="banner-main banner-slider">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                <div class="swiper-slide banner-slide">
                    <img src="{{ \App\Helpers\CustomHelper::logoSrc($banner) }}" alt="Banner">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-box">
        <div class="section-box wow animate__animated animate__fadeIn mt-20">
            <div class="container">
                <div class="text-center">
                    <h3 class="section-title mb-10 wow animate__animated animate__fadeInUp">
                        Các công ty hợp tác
                    </h3>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                        Chúng tôi luôn tìm kiếm công việc phù hợp cho bạn. Với hơn 1000+
                        tin tuyển dụng mới hàng ngày
                    </p>
                </div>
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-5 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            @foreach ($employers->chunk(5) as $chunk)
                            <div class="swiper-slide hover-up">
                                @foreach ($chunk as $employer)
                                <a href="{{ route('employers.show', $employer->slug) }}">
                                    <div class="item-logo">
                                        <img alt="{{ $employer->company_name }}" class="img-fluid d-block mx-auto"
                                            style="height: 92px; object-fit: contain;"
                                            src="{{ asset('storage/' . $employer->logo) }}" width="100%" />
                                    </div>
                                </a>
                                @endforeach
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