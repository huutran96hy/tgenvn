@extends('Frontendlayouts.app')

@section('pageTitle', $news->title)

@push('meta')
    <meta name="description"
        content="{{ 'Đọc tin tức mới nhất: ' . $news->title . ' - Cập nhật thông tin nóng hổi, phân tích chuyên sâu và góc nhìn mới nhất.' }}">
@endpush

@section('content')
    <main class="main">
        <section class="section-box">
            <div>
                <img class="cover-image-post bg-news-fix" src="{{ \App\Helpers\CustomHelper::logoSrc($news->images) }}"
                    alt="{{ $news->title }}" />
            </div>
        </section>
        <section class="section-box">
            <div class="archive-header pt-50 text-center">
                <div class="container">
                    <div class="box-white">
                        <div class="max-width-single">
                            <h2 class="mb-30 mt-20 text-center custom-h2">{{ $news->title }}</h2>
                            <div class="post-meta text-muted d-flex align-items-center mx-auto justify-content-center">
                                <div class="author d-flex align-items-center mr-30">
                                    <img alt="{{ $news->author->name ?? 'Ẩn danh' }}"
                                        src="{{ asset('assets/images/demo/users/face9.jpg') }}" />
                                    <span>{{ $news->author->name ?? 'Ẩn danh' }}</span>
                                </div>
                                <div class="date">
                                    <span class="font-xs color-text-paragraph-2 mr-20 d-inline-block">
                                        <img class="img-middle mr-5"
                                            src="{{ asset('assets/imgs/page/blog/calendar.svg') }}" />
                                        {{ $news->created_at->format('d/m/Y') }}
                                    </span>
                                    <span class="font-xs color-text-paragraph-2 d-inline-block">
                                        <img class="img-middle mr-5"
                                            src="{{ asset('assets/imgs/template/icons/time.svg') }}" />
                                        5 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="post-loop-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="single-body">
                            <div class="max-width-single">
                                <div class="font-lg mb-30">
                                    {!! $news->content !!}
                                </div>
                            </div>

                            <div class="single-apply-jobs mt-20">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a class="btn btn-border-3 mr-10 hover-up" href="#">
                                            # {{ $news->category->category_name }}
                                        </a>
                                    </div>
                                    {{-- <div class="col-md-5 text-lg-end social-share">
                                        <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-20 mt-10">
                                            Chia sẻ
                                        </h6>
                                        <a class="mr-20 d-inline-block d-middle hover-up" href="#">
                                            <img alt="jobBox" src="assets/imgs/page/blog/fb.svg" />
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- @if ($relatedNews->isNotEmpty())
                    <div class="related-posts mt-5">
                        <h3 class="mb-4 fw-bold">📰 Bài viết liên quan</h3>
                        <div class="row g-4">
                            @foreach ($relatedNews as $related)
                                <div class="col-md-4 col-sm-6">
                                    <div class="card border-0 h-100 shadow-sm rounded-4 overflow-hidden">
                                        <a href="{{ route('news.show', $related->slug) }}">
                                            <div class="ratio ratio-16x9">
                                                <img src="{{ \App\Helpers\CustomHelper::logoSrc($related->images) }}"
                                                    alt="{{ $related->title }}"
                                                    class="img-fluid object-fit-cover w-100 h-100">
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <h6 class="card-title fw-semibold">
                                                <a href="{{ route('news.show', $related->slug) }}"
                                                    class="text-dark text-decoration-none">
                                                    {{ Str::limit($related->title, 80) }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif --}}
            </div>
        </div>
    </main>
@endsection
