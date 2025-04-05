<section class="section-box" style="display: block; line-height: 0;">
    @php
        $banners = json_decode(\App\Models\Config::where('key', 'banners')->value('value') ?? '[]', true);
    @endphp

    <div class="banner-main banner-slider" style="position: relative;">
        <a href="{{ route('index') }}" style="position: absolute; top: 10px; left: 30px; z-index: 10;">
            <img alt="logo" src="{{ asset(\App\Models\Config::getLogo()) }}" style="height: 70px; width: auto;">
        </a>

        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide banner-slide">
                    <img src="{{ \App\Helpers\CustomHelper::logoSrc($banner) }}" alt="Banner"
                        style="height:150px; width: 100%; object-fit: cover;">
                </div>
            @endforeach
        </div>
    </div>
</section>
