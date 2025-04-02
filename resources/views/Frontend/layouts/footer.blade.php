<footer class="footer pt-50" style="background: #265c77;">
    <div class="container">
        <div class="row" style="background: #ffff;border-radius: 8px;padding: 10px;">
            <div class="footer-col-8 col-md-4 col-sm-12 mr-20">
                <a href="{{ route('index') }}">
                    <img alt="logo" src="{{ asset(\App\Models\Config::getLogo()) }}" width="50%"
                        style="width:90px" />
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
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Tuyển dụng</a></li>
                    <li><a href="#">Tin Tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
            <div class="footer-col-6 col-md-4 col-xs-6">
                <h6 class="mb-20">Liên kết</h6>
                <div class="footer-social">
                    <a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-twitter"
                        href="#"></a><a class="icon-socials icon-linkedin" href="#"></a>
                </div>
                </ul>
            </div>
            <!-- <div class="footer-col-6 col-md-3 col-sm-12 flex-left">
          <h6 class="mb-20">Tải ứng dụng</h6>
          <p class="color-text-paragraph-2 font-xs">Tải ứng dụng của chúng tôi để tìm kiếm công việc phù hợp với bạn
            &mldr;!</p>
          <div class="mt-15"><a class="mr-5" href="#"><img src="assets/imgs/template/icons/app-store.png"
                alt="joxBox"></a><a href="#"><img alt="ORSCorp" src="assets/imgs/template/icons/android.png"></a></div>
        </div> -->
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

<div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content apply-job-form">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body pl-30 pr-30 pt-50">
                <div class="text-center">
                    <p class="font-sm text-brand-2">Nộp CV ứng tuyển </p>
                    <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Kết nối với chúng tôi </h2>
                    <p class="font-sm text-muted mb-30">
                        Vui lòng điền đầy đủ thông tin giúp chúng tôi liên lạc sớm nhất.
                    </p>
                </div>
                <form id="applyJobForm" class="login-register text-start mt-20 pb-30" action="#"
                    enctype="multipart/form-data">
                    {{-- <div class="form-group">
                        <label class="form-label" for="input-1"> <strong class="text-danger">*</strong> Họ và
                            Tên</label>
                        <input class="form-control" id="input-1" type="text" required="" name="full_name"
                            placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="number"><strong class="text-danger">*</strong> Số điện
                            thoại</label>
                        <input class="form-control" id="number" type="text" required="" name="phone"
                            placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address"><strong class="text-danger">*</strong>Địa
                            chỉ</label>
                        <input class="form-control" id="add" type="text" required="" name="address"
                            placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="education">Học vấn</label>
                        <input class="form-control" id="education" type="text" required="" name="education"
                            placeholder="Học vấn">
                    </div> --}}
                    <div class="form-group">
                        <label class="form-label" for="file">Gửi CV lên</label>
                        <input class="form-control" id="file" name="resume" type="file">
                    </div>
                    <div class="login_footer form-group d-flex justify-content-between">
                        <label class="cb-container">
                            <input type="checkbox">
                            <span class="text-small">Đồng ý với các điều khoản của chúng tôi</span>
                            <span class="checkmark"></span>
                        </label><a class="text-muted" href="{{ route('contact.index') }}">Tìm hiểu thêm</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default hover-up w-100" type="submit" name="">Ứng
                            tuyển</button>
                    </div>
                    <div class="text-muted text-center">Bạn cần hỗ trợ? <a href="{{ route('contact.index') }}">Liên hệ
                        </a></div>
                </form>
            </div>
        </div>
    </div>
</div>
