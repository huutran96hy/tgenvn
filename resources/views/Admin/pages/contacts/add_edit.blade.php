@extends('Admin.layouts.master')

@section('pageTitle', 'Chi tiết liên hệ')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content container-fluid">
        <div class="card border-0 shadow rounded-4 fs-6">
            <div class="card-header bg-white border-bottom d-flex align-items-center">
                <h5 class="mb-0 text-primary fw-bold">
                    <i class="bi bi-person-lines-fill me-2"></i> Chi tiết liên hệ
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div>
                            <div class="text-muted mb-1">Họ tên</div>
                            <div class="fw-semibold text-dark text-break">{{ $contact->full_name }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <div class="text-muted mb-1">Email</div>
                            <div class="fw-semibold text-dark text-break">{{ $contact->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div>
                            <div class="text-muted mb-1">Số điện thoại</div>
                            <div class="fw-semibold text-dark text-break">{{ $contact->phone }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <div class="text-muted mb-1">Gửi lúc</div>
                            <div class="fw-semibold text-dark">{{ $contact->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-muted mb-1">Tiêu đề</div>
                    <div class="fw-semibold text-dark border rounded-3 p-3 bg-light text-break">
                        {{ $contact->subject }}
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-muted mb-1">Nội dung</div>
                    <div class="border-start border-4 border-primary ps-3 py-3 bg-white rounded shadow-sm text-break">
                        {{ $contact->message }}
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
