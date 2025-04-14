@extends('Frontend.layouts.app')

@section('pageTitle', 'Tìm việc làm nhanh, tuyển dụng hiệu quả | Trang chủ')

@push('meta')
    <meta name="description"
        content="Nền tảng tuyển dụng hàng đầu – kết nối ứng viên chất lượng với nhà tuyển dụng uy tín. Tìm việc làm nhanh, đa ngành nghề, cập nhật mỗi ngày.">
@endpush

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
        @include('Frontend.snippets.banner')

        @include('Frontend.layouts.header')

        <section class="section-box">
            <div class="section-box wow animate__animated animate__fadeIn mt-0">
                <div class="container">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-5 swiper">
                            <div class="swiper-wrapper pb-20 pt-15">
                                @foreach ($employers->chunk(5) as $chunk)
                                    <div class="swiper-slide hover-up">
                                        @foreach ($chunk as $employer)
                                            <a href="{{ route('employers.show', $employer->slug) }}">
                                                <div class="item-logo">
                                                    <img alt="{{ $employer->company_name }}"
                                                        class="img-fluid d-block mx-auto"
                                                        style="height: 82px; object-fit: contain;"
                                                        src="{{ \App\Helpers\CustomHelper::logoSrc($employer->logo) }}"
                                                        width="100%" />
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
