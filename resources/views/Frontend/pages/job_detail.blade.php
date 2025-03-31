@extends('Frontend.layouts.app')

@section('pageTitle', 'Chi tiết công việc - ' . $job->job_title)

@push('meta')
    <meta name="description" content="Trang chi tiết công việc">
@endpush

@section('content')
    <main class="main">
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure>
                                        <img alt="jobBox" src="{{ asset('assets/imgs/template/logo.svg') }}">
                                    </figure>
                                    <div class="sidebar-info">
                                        <span class="sidebar-company">{{ $job->employer->company_name }}</span>
                                        <span class="card-location">{{ $job->employer->address }}</span>
                                        <a class="link-underline mt-15" href="#">
                                            {{ $employer->jobs_count }}
                                            Công việc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.8339089556225!2d106.71297808844172!3d20.838412383817857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7bef0610ffd9%3A0x4d6da8ffdf078c43!2sGarage%20Nam%20Kh%C3%A1nh!5e0!3m2!1svi!2s!4v1742976293412!5m2!1svi!2s"
                                        width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <ul class="ul-disc">
                                    <li>{{ $job->employer->address }}</li>
                                    <li>SĐT: +{{ $job->employer->contact_phone }}</li>
                                    <li>Email: {{ $job->employer->email }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Các vị trí khác </h6>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                            <div class="image"><a href="job-details"><img
                                                        src="assets/imgs/brands/brand-1.png" alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details">Thiết kế
                                                        UI/UX</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                        class="card-time"><span>5</span><span> phút trước</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">10.000.000đ<span>/Tháng</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">Hải
                                                                Phòng,Việt Nam</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                            <div class="image"><a href="job-details"><img
                                                        src="assets/imgs/brands/brand-2.png" alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details">Lập trình
                                                        viên Java</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                        class="card-time"><span>5</span><span> Ngày trước</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">12.000.00đ<span>/Tháng</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">Hà Nội,
                                                                Việt Nam</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Thẻ</h6>
                            <div class="sidebar-list-job">
                                @foreach ($job->skills as $skill)
                                    <a class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid">
                                        {{ $skill->skill_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="box-border-single">
                            <div class="row mt-10">
                                <div class="col-lg-8 col-md-12">
                                    <h3>{{ $job->job_title ?? 'Chưa có tiêu đề' }}</h3>
                                    <div class="mt-0 mb-15">
                                        <span class="card-briefcase">Fulltime</span>
                                        <span
                                            class="card-time">{{ \Carbon\Carbon::parse($job->posted_date)->diffForHumans() ?? 'Ngày chưa xác định' }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 text-lg-end">
                                    <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal"
                                        data-bs-target="#ModalApplyJobForm">Gửi CV ngay</div>
                                </div>
                            </div>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="banner-hero banner-image-single mt-10 mb-20">
                                <img src="{{ asset('assets/imgs/page/job-single-2/img.png') }}" alt="jobBox">
                            </div>
                            <div class="job-overview">
                                <h5 class="border-bottom pb-15 mb-30">Giới thiệu</h5>
                                <div class="row">
                                    <div class="col-md-6 d-flex">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/industry.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description industry-icon mb-10">Chuyên ngành</span>
                                            <strong class="small-heading">
                                                @if ($job->category)
                                                    {{ $job->category->category_name ?? 'Chưa có chuyên ngành' }}
                                                @else
                                                    Chưa có chuyên ngành
                                                @endif
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex mt-sm-15">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/job-level.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description joblevel-icon mb-10">Học vấn</span>
                                            <strong class="small-heading">
                                                {{ $job->required_education ?? 'Không yêu cầu' }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-md-6 d-flex mt-sm-15">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/salary.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description salary-icon mb-10">Lương</span>
                                            <strong class="small-heading">{{ $job->salary ?? 'Thoả thuận' }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/experience.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description experience-icon mb-10">Kinh nghiệm</span>
                                            <strong class="small-heading">
                                                {{ $job->required_exp ?? 'Chưa xác định' }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-md-6 d-flex mt-sm-15">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/job-type.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description jobtype-icon mb-10">Loại công việc</span>
                                            <strong class="small-heading">
                                                @if ($job->category)
                                                    {{ $job->category->category_name ?? 'Chưa có chuyên ngành' }}
                                                @else
                                                    Chưa có chuyên ngành
                                                @endif
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex mt-sm-15">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/deadline.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description mb-10">Thời hạn</span>
                                            <strong
                                                class="small-heading">{{ \Carbon\Carbon::parse($job->expiry_date)->format('d/m/Y') ?? 'Chưa xác định' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-md-6 d-flex mt-sm-15">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/updated.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description jobtype-icon mb-10">Cập nhập</span>
                                            <strong
                                                class="small-heading">{{ \Carbon\Carbon::parse($job->updated_at)->format('d/m/Y') ?? 'Chưa cập nhật' }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex mt-sm-15">
                                        <div class="sidebar-icon-item">
                                            <img src="{{ asset('assets/imgs/page/job-single/location.svg') }}"
                                                alt="jobBox">
                                        </div>
                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description mb-10">Địa chỉ</span>
                                            <strong class="small-heading">{{ $job->location ?? 'Chưa xác định' }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-single">
                                <h4>Chào mừng đến với {{ $job->employer->company_name }}</h4>
                                <p>{!! $job->job_description ?? 'Chưa có mô tả công việc' !!}</p>
                                <h4>Yêu cầu kinh nghiệm</h4>
                                <ul>
                                    @foreach (explode(',', $job->requirements ?? '') as $requirement)
                                        <li>{!! $requirement ?? 'Không có yêu cầu cụ thể' !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="author-single">
                                <span>{{ $job->employer->company_name }}</span>
                            </div>
                            <div class="single-apply-jobs">
                                <div class="row align-items-center">
                                    <div class="col-md-6"><a class="btn btn-default mr-15" href="#">Gửi CV</a><a
                                            class="btn btn-border" href="#">Lưu</a></div>
                                    <div class="col-md-6 text-lg-end social-share">
                                        <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Chia sẻ qua:
                                        </h6>
                                        <a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                src="{{ asset('assets/imgs/template/icons/share-fb.svg') }}"></a>
                                        <a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                src="{{ asset('assets/imgs/template/icons/share-tw.svg') }}"></a>
                                        <a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                src="{{ asset('assets/imgs/template/icons/share-red.svg') }}"></a>
                                        <a class="d-inline-block d-middle" href="#"><img alt="jobBox"
                                                src="{{ asset('assets/imgs/template/icons/share-whatsapp.svg') }}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
