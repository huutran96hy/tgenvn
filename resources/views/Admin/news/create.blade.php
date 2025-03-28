@extends('layouts.admin.master')

@section('title', 'Quản lý Tin tức')

@section('page_header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Quản lý Tin tức - <span class="fw-normal">Thêm mới tin tức</span>
            </h4>
            <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
        <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
            <!-- Bạn có thể thêm breadcrumb hoặc các thành phần header bổ sung tại đây -->
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center py-0">
        <h5 class="py-3 mb-0">Thêm mới tin tức</h5>
    </div>
    <!-- Bảng tin tức sử dụng DataTables (lấy cảm hứng từ bảng được cắt từ file datatable mẫu) -->
    <div class="card-body border-top">
        <form action="#">
            <div class="mb-3">
                <label class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" placeholder="Eugene Kopyov">
            </div>

            <div class="mb-3">
                <label class="form-label">Hình ảnh:</label>
                <input type="file" class="file-input" multiple="multiple">
            </div>

            <div class="mb-3">
                <label class="form-label">Your state:</label>
                <select class="form-control form-control-select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK" data-select2-id="3">Alaska</option>
                        <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                        <option value="CA">California</option>
                        <option value="NV">Nevada</option>
                        <option value="WA">Washington</option>
                    </optgroup>
                    <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="KY">Kentucky</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                    </optgroup>
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-a7xc-container"><span class="select2-selection__rendered" id="select2-a7xc-container" role="textbox" aria-readonly="true" title="Alaska">Alaska</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender:</label>
                <div>
                    <label class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" checked="">
                        <span class="form-check-label">Male</span>
                    </label>

                    <label class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender">
                        <span class="form-check-label">Female</span>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Danh mục:</label>
                <select data-placeholder="Select a State..." class="form-control select">
                    <option></option>
                    <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                    </optgroup>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tags:</label>
                <input type="text" class="form-control tokenfield-basic" placeholder="Nhập tags">
            </div>

            <div class="mb-3">
                <label class="form-label">Your message:</label>
                <textarea class="form-control" id="editor1"></textarea>
            </div>

            <div class="text-start">
                <button type="submit" class="btn btn-primary">Lưu lại <i class="ph-paper-plane-tilt ms-2"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>
<script src="{{ asset('assets/js/vendor/uploaders/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/uploader_bootstrap.js') }}"></script>

<script src="{{ asset('assets/js/vendor/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/form_select2.js') }}"></script>

<script src="{{ asset('assets/js/vendor/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/form_tags.js') }}"></script>

<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/js/vendor/editors/ckeditor/ckeditor_classic.js') }}"></script>
<script src="{{ asset('assets/demo/pages/editor_ckeditor_classic.js') }}"></script>
<script>
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
</script>
@include('ckfinder::setup')
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>

<!-- Nếu cần, bạn có thể thêm các script bổ sung riêng cho trang này -->
@endsection