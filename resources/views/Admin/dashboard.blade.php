@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('page_header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Home - <span class="fw-normal">Dashboard</span>
                </h4>
                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <!-- Breadcrumb hoặc các thành phần header khác nếu cần -->
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Nội dung dashboard: ví dụ các biểu đồ, bảng thống kê, v.v. -->
    <div class="row">
        <div class="col-xl-7">
            <!-- Ví dụ: Card Traffic sources -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0">Traffic sources</h5>
                    <div class="ms-auto">
                        <label class="form-check form-switch form-check-reverse">
                            <input type="checkbox" class="form-check-input" checked>
                            <span class="form-check-label">Live update</span>
                        </label>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <!-- Nội dung chi tiết card -->
                </div>
                <div class="chart position-relative" id="traffic-sources"></div>
            </div>
        </div>
        <div class="col-xl-5">
            <!-- Ví dụ: Card Sales statistics -->
            <div class="card">
                <div class="card-header d-sm-flex align-items-sm-center py-sm-0">
                    <h5 class="py-sm-2 my-sm-1">Sales statistics</h5>
                    <div class="mt-2 mt-sm-0 ms-sm-auto">
                        <select class="form-select" id="select_date">
                            <option value="val1">June, 29 - July, 5</option>
                            <option value="val2">June, 22 - June 28</option>
                            <option value="val3" selected>June, 15 - June, 21</option>
                            <option value="val4">June, 8 - June, 14</option>
                        </select>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <!-- Nội dung chi tiết card -->
                </div>
                <div class="chart mb-2" id="app_sales"></div>
                <div class="chart" id="monthly-sales-stats"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Các script bổ sung dành cho dashboard nếu cần -->
@endsection
