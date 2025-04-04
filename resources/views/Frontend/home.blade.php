@extends('Frontend.layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
    <style>
        .item-logo {
            position: relative;
            display: inline-block;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .item-logo img {
            transition: transform 0.3s ease;
            object-fit: contain;
        }

        .item-logo:hover {
            transform: translateY(-10px) rotateY(10deg) rotateX(10deg);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }
    </style>
    <main class="main">
        <section class="section-box" style="display: block;line-height: 0px;">
            @php
                $banners = json_decode(\App\Models\Config::where('key', 'banners')->value('value') ?? '[]', true);
            @endphp
            <div class="banner-main banner-slider">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide banner-slide">
                            <img src="{{ \App\Helpers\CustomHelper::logoSrc('storage/' . $banner) }}" alt="Banner"
                                style="height:150px">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('Frontend.layouts.header')

        <section class="section-box">
            <div class="section-box wow animate__animated animate__fadeIn mt-20">
                <div class="container">
                    <div class="text-center">
                        <h3 class="section-title mb-10 wow animate__animated animate__fadeInUp">
                            Các công ty nổi bật
                        </h3>
                        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                            Chúng tôi luôn tìm kiếm công việc phù hợp cho bạn. Với hơn 1000+
                            tin tuyển dụng mới hàng ngày
                        </p>
                    </div>
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-5 swiper">
                            <div class="swiper-wrapper pb-70 pt-20">
                                @foreach ($employers->chunk(5) as $chunk)
                                    <div class="swiper-slide hover-up">
                                        @foreach ($chunk as $employer)
                                            <a href="{{ route('employers.show', $employer->slug) }}">
                                                <div class="item-logo">
                                                    <img alt="{{ $employer->company_name }}"
                                                        class="img-fluid d-block mx-auto"
                                                        style="height: 82px; object-fit: contain;"
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
