@extends('Frontend.layouts.app')

@section('pageTitle', 'Chi tiết tin tức - ' . $news->title)

@push('meta')
<meta name="description"
    content="{{ 'Đọc tin tức mới nhất: ' . $news->title . ' - Cập nhật thông tin nóng hổi, phân tích chuyên sâu và góc nhìn mới nhất.' }}">
@endpush

@section('content')
<main class="main">
    <section class="section-box">
        <div>
            <img class="cover-image-post"
                src="{{ \App\Helpers\CustomHelper::logoSrc($news->images) }}"
                alt="{{ $news->title }}" />
        </div>
    </section>
    <section class="section-box">
        <div class="archive-header pt-50 text-center">
            <div class="container">
                <div class="box-white">
                    <div class="max-width-single">
                        <h2 class="mb-30 mt-20 text-center">{{ $news->title }}</h2>
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
                    </div>
                </div>
            </div>

            <!-- Hiển thị bài viết liên quan -->
            <div class="related-posts">
                <h3 class="mt-50">Bài viết liên quan</h3>
                <div class="row">
                    @foreach ($relatedNews as $related)
                    <div class="col-md-4">
                        <div class="related-item">
                            <a href="{{ route('news.show', $related->slug) }}">
                                <img src="{{ \App\Helpers\CustomHelper::logoSrc($related->image) }}"
                                    alt="{{ $related->title }}">
                            </a>
                            <h4>
                                <a href="{{ route('news.show', $related->slug) }}">{{ $related->title }}</a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection