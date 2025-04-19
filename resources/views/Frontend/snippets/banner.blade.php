<section class="section-box">
    @php
        $banners = json_decode(\App\Models\Config::where('key', 'banners')->value('value') ?? '[]', true);
    @endphp

    <div class="banner-container">
        <!-- Chỉ hiển thị trên desktop  -->
        <div class="logo-side">
            <a href="{{ route('index') }}">
                <img alt="logo" src="{{ asset(\App\Models\Config::getLogo()) }}" class="logo-img">
            </a>
        </div>

        <div class="banner-side">
            <div class="swiper banner-swiper">
                <div class="swiper-wrapper">
                    @forelse ($banners as $banner)
                        <div class="swiper-slide">
                            <img src="{{ \App\Helpers\CustomHelper::logoSrc($banner) }}" alt="Banner"
                                class="banner-img">
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <img src="{{ asset('uploads/banner_thumb01.jpg') }}" alt="Banner" class="banner-img">
                        </div>
                    @endforelse
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
            </div>
        </div>
    </div>
</section>
