@extends('Frontend.layouts.app')

@section('pageTitle', 'Liên hệ - Hỗ trợ & Tư vấn tuyển dụng')

@push('meta')
    <meta name="description"
        content="Liên hệ với chúng tôi để được tư vấn, hỗ trợ nhanh chóng và giải đáp mọi thắc mắc. Đội ngũ chuyên gia của chúng tôi luôn sẵn sàng phục vụ bạn 24/7.">
@endpush

@section('content')
    <main class="main">
        @include('Frontend.snippets.notify_block')
        <section class="section-box mt-0 mt-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-40">
                        <span class="font-md color-brand-2 mt-20 d-inline-block">Liên hệ</span>
                        <h2 class="mt-5 mb-10">Kết nối với chúng tôi</h2>
                        <p class="font-md color-text-paragraph-2">Luôn luôn lắng nghe những ý kiến , đóng góp của bạn</p>
                        <form class="contact-form-style mt-30" id="contact-form" action="{{ route('contact.store') }}"
                            method="post">
                            @csrf
                            <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="font-sm color-text-paragraph-2" name="full_name"
                                            placeholder="Nhập tên của bạn" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="font-sm color-text-paragraph-2" name="email"
                                            placeholder="E-mail của bạn" type="email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="font-sm color-text-paragraph-2" name="phone"
                                            placeholder="Số điện thoại" type="tel">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="font-sm color-text-paragraph-2" name="subject" placeholder="Chủ đề"
                                            type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-20">
                                        <textarea class="font-sm color-text-paragraph-2 textarea-fix" name="message"
                                            placeholder="Gửi tin nhắn đến chúng tôi"required></textarea>
                                    </div>
                                    <button class="submit btn btn-send-message btn-send-message-fix" type="submit">
                                        Gửi tin nhắn
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-lg-4 text-center d-none d-lg-block">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.9455848604143!2d106.7115726109179!3d20.838151680683616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7bef0610ffd9%3A0x4d6da8ffdf078c43!2sGarage%20Nam%20Kh%C3%A1nh!5e1!3m2!1svi!2s!4v1742970946990!5m2!1svi!2s"
                            width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div> --}}
                </div>
            </div>
        </section>
    </main>
@endsection
