@extends('Frontend.layouts.app')

@section('pageTitle', 'Tuyển ' . $job->job_title . ' Tại ' . $job->employer->company_name)

@push('meta')
    <meta name="description"
        content="{{ 'Khám phá cơ hội nghề nghiệp hấp dẫn với vị trí ' . $job->job_title . '. Ứng tuyển ngay để gia nhập ' . $job->employer->company_name . '!' }}">
@endpush

@section('content')
    <main class="main">
        <section class="section-box mt-0 mt-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-20 order-2 order-lg-1">
                        <div class="sidebar-border sidebar-border-fix">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure>
                                        <img alt="{{ $job->employer->company_name }}"
                                            src="{{ $job->employer->getLogoUrl() }}">
                                    </figure>
                                    <div class="sidebar-info">
                                        <span class="sidebar-company">{{ $job->employer->company_name }}</span>
                                        <span class="card-location location-fix">{{ $job->employer->address }}</span>
                                        <a class="link-underline mt-15" href="#">
                                            {{ $employer->jobs_count }}
                                            Công việc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    @if ($job->employer->map_url)
                                        {!! $job->employer->map_url !!}
                                    @endif
                                </div>
                                <ul class="ul-disc">
                                    @php
                                        $address = $job->location;
                                        $province = optional($job->province)->name;
                                    @endphp

                                    @if ($address || $province)
                                        <li>{{ $address }}{{ $address && $province ? ', ' : '' }}{{ $province }}
                                        </li>
                                    @endif
                                    <li>SĐT: +{{ $job->employer->contact_phone }}</li>
                                    <li>Email: {{ $job->employer->email }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border sidebar-border-fix">
                            <h6 class="f-18">Các vị trí khác</h6>
                            <div class="sidebar-list-job">
                                <ul>
                                    @foreach ($randomJobs as $randomJob)
                                        <li>
                                            <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                                <div class="image">
                                                    <a href="{{ route('job_detail.show', ['slug' => $randomJob->slug]) }}">
                                                        <img src="{{ $randomJob->employer->getLogoUrl() }}"
                                                            alt="{{ $randomJob->job_title }}" style="width: 50px">
                                                    </a>
                                                </div>
                                                <div class="info-text">
                                                    <h5 class="font-md font-bold color-brand-1">
                                                        <a
                                                            href="{{ route('job_detail.show', ['slug' => $randomJob->slug]) }}">
                                                            {{ $randomJob->job_title }}
                                                        </a>
                                                    </h5>
                                                    <div class="mt-0">
                                                        <span class="card-briefcase">{{ $randomJob->job_type }}</span>
                                                        <span class="card-time">
                                                            <span>{{ $randomJob->created_at->diffForHumans() }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="mt-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h6 class="card-price">
                                                                    {{ \App\Helpers\NumberHelper::formatSalary($randomJob->salary) }}
                                                                    <span>/Tháng</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <span class="card-briefcase">
                                                                    {{ $randomJob->province->name ?? $randomJob->location }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if ($job->skills->isNotEmpty())
                            <div class="sidebar-border">
                                <h6 class="f-18">Kỹ năng</h6>
                                <div class="sidebar-list-job">
                                    @foreach ($job->skills as $skill)
                                        <a class="btn btn-grey-small bg-14 mb-10 mr-5" href="{{ route('jobs.index') }}">
                                            {{ $skill->skill_name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 box-border-single-fix order-1 order-lg-2">
                        <div class="box-border-single">
                            <div class="row mt-10">
                                <div class="col-lg-8 col-md-12">
                                    <h3 class="custom-h3">{{ $job->job_title ?? 'Chưa có tiêu đề' }}</h3>
                                    <div class="mt-0 mb-15">
                                        <span class="card-briefcase">Fulltime</span>
                                        <span
                                            class="card-time">{{ \Carbon\Carbon::parse($job->posted_date)->diffForHumans() ?? 'Ngày chưa xác định' }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 text-lg-end">
                                    <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up button-fix"
                                        data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Gửi CV ngay</div>
                                </div>
                            </div>
                            {{-- <div class="job-overview">
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
                                            <strong
                                                class="small-heading">{{ \App\Helpers\NumberHelper::formatSalary($job->salary) }}</strong>
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
                                                {{ $job->job_type ?? 'Chưa xác định' }}
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
                                            <strong class="small-heading">{{ $job->province->name ?? 'Chưa xác định' }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="content-single custom-text">
                                <h4 class="custom-h4">Chào mừng đến với {{ $job->employer->company_name }}</h4>
                                <p>{!! $job->job_description ?? 'Chưa có mô tả công việc' !!}</p>
                                <h4 class="custom-h4">Yêu cầu công việc</h4>
                                <p>{!! $job->requirements ?? 'Không có yêu cầu cụ thể' !!}</p>
                                <h4 class="custom-h4">Phúc lợi công ty</h4>
                                <p>{!! $job->job_benefit ?? 'Không có phúc lợi cụ thể' !!}</p>
                            </div>
                            {{-- <div class="author-single">
                                <span>{{ $job->employer->company_name }}</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
                            <label class="form-label" for="education">Học vấn</label>
                            <input class="form-control" id="education" type="text" required="" name="education"
                                placeholder="Học vấn">
                        </div> --}}
                        <input type="hidden" name="job_id" value="{{ $job->job_id }}">

                        <div class="form-group mb-4">
                            <label for="file" class="form-label fw-bold mb-2">
                                <i class="fa fa-upload me-2 text-primary"></i> Tải lên CV của bạn
                            </label>

                            <div class="border border-dashed rounded-3 p-4 text-center position-relative"
                                style="cursor: pointer;" onclick="document.getElementById('file').click();">
                                <i class="fa fa-cloud-upload fa-2x text-muted mb-2"></i>
                                <p class="text-muted m-0" id="fileName">Kéo thả hoặc nhấn để chọn tệp PDF, DOCX...</p>
                                <input type="file" class="d-none" id="file" name="resume"
                                    onchange="updateFileName()" accept=".pdf,.doc,.docx">
                            </div>
                        </div>

                        {{-- <div class="login_footer form-group d-flex justify-content-between">
                            <label class="cb-container">
                                <input type="checkbox">
                                <span class="text-small">Đồng ý với các điều khoản của chúng tôi</span>
                                <span class="checkmark"></span>
                            </label><a class="text-muted" href="{{ route('contact.index') }}">Tìm hiểu thêm</a>
                        </div> --}}
                        <div class="form-group">
                            <button class="btn btn-default hover-up w-100" type="submit" name="">
                                Ứng tuyển
                            </button>
                        </div>
                        <div class="text-muted text-center">Bạn cần hỗ trợ?
                            <a href="{{ route('contact.index') }}">
                                Liên hệ
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateFileName() {
            const fileInput = document.getElementById('file');
            const fileNameDisplay = document.getElementById('fileName');
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = "Kéo thả hoặc nhấn để chọn tệp PDF, DOCX...";
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // let userId = {{ auth()->check() ? auth()->id() : 'null' }};

            $("#applyJobForm").on("submit", function(e) {
                e.preventDefault();

                // if (!userId) {
                //     alert("Bạn cần đăng nhập trước khi ứng tuyển!");
                //     return;
                // }

                let formData = new FormData(this);
                // formData.append("user_id", userId);

                $.ajax({
                    url: "{{ route('candidate.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    beforeSend: function() {
                        $("#applyJobForm button[type=submit]").prop("disabled", true).text(
                            "Đang gửi...");
                    },
                    success: function(response) {
                        if (response.success) {
                            alert("Ứng tuyển thành công!");
                            $("#applyJobForm")[0].reset();
                            $("#ModalApplyJobForm").modal("hide");
                        } else {
                            alert("Đã có lỗi xảy ra: " + response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error("Lỗi từ server:", xhr);
                        let errorMessage = "Đã có lỗi xảy ra!\n";

                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.message) {
                                errorMessage += "Thông báo: " + xhr.responseJSON.message + "\n";
                            }
                            // if (xhr.responseJSON.errors) {
                            //     errorMessage += "Chi tiết:\n";
                            //     $.each(xhr.responseJSON.errors, function(key, value) {
                            //         errorMessage += "- " + value + "\n";
                            //     });
                            // }
                        } else {
                            errorMessage += "Lỗi không xác định!";
                        }

                        alert(errorMessage);
                    },
                    complete: function() {
                        $("#applyJobForm button[type=submit]").prop("disabled", false).text(
                            "Ứng tuyển");
                    },
                });
            });
        });
    </script>
@endpush
