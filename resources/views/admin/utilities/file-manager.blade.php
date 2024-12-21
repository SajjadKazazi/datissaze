@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<link rel="stylesheet" href="{{ asset('/css/all/bootstrap-icons.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">مدیریت فایل ها</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <div id="fm" style="height: 600px"></div>
                </div>
            </div><!-- end row-->

            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@endpush
