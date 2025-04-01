@extends('Frontend.layouts.app')

@section('pageTitle', $employer->name)

@push('meta')
    <meta name="description" content="{{ $employer->description }}">
@endpush

@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single">
                    <img src="{{ asset('storage/' . $employer->background_img) }}" alt="{{ $employer->name }}">
                </div>
                <div class="box-company-profile">
                    <div class="image-compay">
                        <img src="{{ asset('storage/' . $employer->logo) }}" alt="{{ $employer->name }}"
                            class="img-fluid d-block mx-auto bg-white p-1"
                            style="width: 85px; height: 85px; object-fit: contain;">
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">
                                {{ $employer->company_name }}
                                <span class="card-location font-regular ml-20">{{ $employer->address }}</span>
                            </h5>
                            <p class="mt-5 font-md color-text-paragraph-2 mb-15">
                                {{ $employer->about }}
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end">
                            <a class="btn btn-call-icon btn-apply btn-apply-bigs" href="{{ route('contact.index') }}">
                                Liên hệ với chúng tôi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                    aria-labelledby="tab-about">
                                    <h4>Chào mừng đến với {{ $employer->company_name }}</h4>
                                    <p>{!! $employer->company_description !!}</p>

                                </div>
                                <div class="tab-pane fade" id="tab-recruitments" role="tabpanel"
                                    aria-labelledby="tab-recruitments">
                                    <h4>Tuyển dụng</h4>
                                    <p>ORS hướng đến các giải pháp phần mềm cho phép các doanh nghiệp năng suất và lành mạnh
                                        trong thế giới công nghệ hiện đại, liên tục thay đổi các mô hình và chuẩn mực công
                                        việc, và nhu cầu về khả năng phục hồi của tổ chức.p>
                                    <p>The ideal candidate will have strong creative skills and a portfolio of work which
                                        demonstrates their passion for illustrative design and typography. This candidate
                                        will have experiences in working with numerous different design platforms such as
                                        digital and print forms.</p>
                                </div>
                                <div class="tab-pane fade" id="tab-people" role="tabpanel" aria-labelledby="tab-people">
                                    <h4>Nhân sự</h4>
                                    <p> Ứng viên sẽ có kinh nghiệm làm việc với nhiều nền tảng thiết kế khác nhau như các
                                        hình thức kỹ thuật số</p>
                                </div>
                            </div>
                        </div>
                        <div class="box-related-job content-page">
                            <h5 class="mb-30">Công việc mới nhất</h5>
                            <div class="box-list-jobs display-list">
                                <div class="row">
                                    @foreach ($latestJobs as $job)
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-grid-2-image-left">
                                                            <div class="image-box">
                                                                <img src="{{ asset('storage/' . $job->logo) }}"
                                                                    alt="{{ $job->job_title }}">
                                                            </div>
                                                            <div class="right-info">
                                                                <a class="name-job"
                                                                    href="{{ route('job_detail.show', $job->slug) }}">
                                                                    {{ $job->job_title }}
                                                                </a>
                                                                <span class="location-small">{{ $job->location }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h4><a
                                                            href="{{ route('job_detail.show', $job->slug) }}">{{ $job->job_title }}</a>
                                                    </h4>
                                                    <div class="mt-5">
                                                        <span class="card-briefcase">{{ $job->job_type }}</span>
                                                        <span
                                                            class="card-time">{{ $job->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="font-sm color-text-paragraph mt-10">
                                                        {!! Str::limit($job->job_description, 50) !!}</p>
                                                    <div class="card-2-bottom mt-20">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <span class="card-text-price">Lương:</span>
                                                                <span class="text-muted">
                                                                    {{ \App\Helpers\NumberHelper::formatSalary($job->salary) }}
                                                                </span>
                                                            </div>
                                                            <div class="col-5 text-end">
                                                                <a class="btn btn-apply-now"
                                                                    href="{{ route('job_detail.show', $job->slug) }}">Xem</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="paginations">
                                {{ $latestJobs->appends(request()->query())->links('Frontend.pagination.custom') }}
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <div class="sidebar-info pl-0">
                                        <span class="sidebar-company">{{ $employer->company_name }}</span>
                                        <span class="card-location">{{ $employer->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.8339089556225!2d106.71297808844172!3d20.838412383817857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7bef0610ffd9%3A0x4d6da8ffdf078c43!2sGarage%20Nam%20Kh%C3%A1nh!5e0!3m2!1svi!2s!4v1742976293412!5m2!1svi!2s"
                                        width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Lĩnh vực công
                                                ty</span><strong class="small-heading">{{ $employer->company_type }}
                                            </strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Địa
                                                chỉ</span><strong class="small-heading">{{ $employer->address }}</strong>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Lương</span><strong
                                                class="small-heading">Thoả thuận</strong></div>
                                    </li> --}}
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">
                                                Ngày thành lập
                                            </span>
                                            <strong class="small-heading">
                                                {{ $employer->founded_at ? \Carbon\Carbon::parse($employer->founded_at)->format('d/m/Y') : '' }}
                                            </strong>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Tuyển
                                                dụng</span><strong class="small-heading">1 ngày trước</strong></div>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>{{ $employer->address }}</li>
                                    <li>SĐT: {{ $employer->contact_phone }}</li>
                                    <li>Email: {{ $employer->email }}</li>
                                </ul>
                                <div class="mt-30"><a class="btn btn-send-message"
                                        href="{{ route('contact.index') }}">Gửi
                                        tin nhắn</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
