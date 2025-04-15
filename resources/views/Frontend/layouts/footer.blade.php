<footer class="footer pt-50" style="background: #265c77;">
    <div class="container">
        <div class="row" style="background: #ffff;border-radius: 8px;padding: 10px;margin:0;">
            <div class="footer-col-8 col-md-4 col-sm-12 mr-20">
                <a href="{{ route('index') }}">
                    <img alt="logo" src="{{ asset(\App\Models\Config::getLogo()) }}" width="50%"
                        style="width:80px" />
                </a>
                <div class="mt-20 mb-20 font-xs color-text-paragraph-2">
                    Công ty cổ phần FDI Work thành lập năm 2025. Với sự kết
                    hợp giữa các kỹ sư công nghệ và đội ngũ chuyên gia giàu kinh
                    nghiệm, chúng tôi tự hào mang đến cho khách hàng các
                    dịch vụ chất lượng cao.
                </div>
            </div>
            <div class="footer-col-6 col-md-4 col-xs-6">
                <h6 class="mb-20">Tin tức</h6>
                <ul class="menu-footer">
                    @foreach ($latestNews as $news)
                        <li>
                            <a href="{{ route('news.show', $news->slug) }}">
                                {{ $news->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-col-6 col-md-4 col-xs-6">
                <h6 class="mb-20">Liên kết</h6>
                <ul class="menu-footer">
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li><a href="{{ route('jobs.index') }}">Tuyển dụng</a></li>
                    <li><a href="{{ route('employers.index') }}">Công ty</a></li>
                    <li><a href="{{ route('news.index') }}">Tin Tức</a></li>
                    {{-- <li><a href="{{ route('index') }}">Liên hệ</a></li> --}}
                </ul>
            </div>
            <div class="footer-col-6 col-md-4 col-xs-6">
                <h6 class="mb-20">Liên kết</h6>
                <div class="footer-social">
                    <a class="icon-socials icon-facebook" href="#"></a>
                    <a class="icon-socials icon-twitter" href="#"></a>
                    <a class="icon-socials icon-linkedin" href="#"></a>
                </div>
                </ul>
            </div>
            {{-- <div class="footer-col-6 col-md-3 col-sm-12 flex-left">
                <h6 class="mb-20">Tải ứng dụng</h6>
                <p class="color-text-paragraph-2 font-xs">Tải ứng dụng của chúng tôi để tìm kiếm công việc phù hợp với
                    bạn
                    &mldr;!</p>
                <div class="mt-15"><a class="mr-5" href="#"><img src="assets/imgs/template/icons/app-store.png"
                            alt="joxBox"></a><a href="#"><img alt="ORSCorp"
                            src="assets/imgs/template/icons/android.png"></a></div>
            </div> --}}
        </div>
        <div class="footer-bottom mt-20">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <span class="font-xs color-text-paragraph" style="color:#ffff">Bản quyền&copy; 2025. FDIWork</span>
                </div>
            </div>
        </div>
    </div>
</footer>
