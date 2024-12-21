@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">مدیریت تنظیمات عمومی سایت</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.general_settings_save') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">تنظیمات عمومی سایت</h5>
                                <hr>
                                <div class="row">

                                    <div class="col-sm-auto">
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('success_add'))
                                    <div class="alert alert-success mt-3">
                                        {{ session()->get('success_add') }}
                                    </div>
                                @endif
                                <!-- end row -->


                                <div class="mb-3">
                                    <label for="title" class="form-label">نام سایت (Meta Title) </label>
                                    <input type="text" class="form-control" name="site_name" id="site_name" placeholder="ضروری" value="{{ $settings->site_name }}">

                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="avatar">لوگوی سایت </label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="col-lg-2">
                                            <a  data-bs-toggle="modal" data-bs-target="#imagemodal" class="showImage">
                                                <img style="width: 100px" src="{{ asset($settings->site_logo) }}">
                                            </a>
                                            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($settings->site_logo) }}" id="imagepreview" style="width: 100%; height: 100%;" >

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 d-flex gap-2">
                                            <input dir="ltr" type="text" id="image_label" class="form-control" name="site_logo" readonly
                                                   aria-label="Image" aria-describedby="button-image" value="{{ $settings->site_logo }}">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر favicon </label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="col-lg-2">
                                            <a  data-bs-toggle="modal" data-bs-target="#imagemodal1" class="showImage">
                                                <img style="width: 100px" src="{{ asset($settings->favicon) }}">
                                            </a>
                                            <div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($settings->favicon) }}" id="imagepreview" style="width: 100%; height: 100%;" >

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 d-flex gap-2">
                                            <input dir="ltr" type="text" id="image_label10" class="form-control" name="site_logo" readonly
                                                   aria-label="Image" aria-describedby="button-image10" value="{{ $settings->favicon }}">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image10">انتخاب </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="site_description" class="form-label">توضیح کوتاه سایت (Meta Description)</label>
                                    <textarea class="form-control" name="site_description" id=site_description" rows="5">{{ $settings->site_description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر هدر صفحات</label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="col-lg-2">
                                            <a  data-bs-toggle="modal" data-bs-target="#page_header" class="showImage">
                                                <img style="width: 100px" src="{{ asset($settings->page_image) }}">
                                            </a>
                                            <div class="modal fade" id="page_header" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($settings->page_image) }}" id="imagepreview" style="width: 100%; height: 100%;" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 d-flex gap-2">
                                            <input dir="ltr" type="text" id="image_label2" class="form-control" name="page_image" readonly
                                                   aria-label="Image" aria-describedby="button-image1" value="{{ $settings->page_image }}">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image1">انتخاب </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر هدر صفحه نمونه کار</label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="col-lg-2">
                                            <a  data-bs-toggle="modal" data-bs-target="#project_page_image" class="showImage">
                                                <img style="width: 100px" src="{{ asset($settings->project_page_image ) }}">
                                            </a>
                                            <div class="modal fade" id="project_page_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($settings->project_page_image ) }}" id="imagepreview" style="width: 100%; height: 100%;" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 d-flex gap-2">

                                            <input dir="ltr" type="text" id="image_label3" class="form-control" name="project_page_image" readonly
                                                   aria-label="Image" aria-describedby="button-image2" value="{{ $settings->project_page_image  }}">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image2">انتخاب </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر هدر صفحه خدمات</label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="col-lg-2">
                                            <a  data-bs-toggle="modal" data-bs-target="#service_page_image" class="showImage">
                                                <img style="width: 100px" src="{{ asset($settings->service_page_image ) }}">
                                            </a>
                                            <div class="modal fade" id="service_page_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($settings->service_page_image ) }}" id="imagepreview" style="width: 100%; height: 100%;" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 d-flex gap-2">

                                            <input dir="ltr" type="text" id="image_label4" class="form-control" name="service_page_image" readonly
                                                   aria-label="Image" aria-describedby="button-image3" value="{{ $settings->service_page_image  }}">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image3">انتخاب </button>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">ذخیره</button>

                                <!-- end table responsive -->
                            </div>

                        </div>
                    </div>
                </div>
            </form>





            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('body',{
            language: 'fa',
            contentsLangDirection:'rtl',

        });
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label';

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });
            document.getElementById('button-image1').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label2';

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });

            document.getElementById('button-image2').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label3';


                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });
            document.getElementById('button-image3').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label4';


                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });
            document.getElementById('button-image10').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label10';


                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });
        });

        let inputId = '';

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }


    </script>
@endpush
