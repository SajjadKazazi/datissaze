@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> تنظیمات متن های پیش فرض</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.communication_DefaultText_save') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">تنظیمات متن های پیش فرض</h5>
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
                                    <label for="title" class="form-label">متن پیش فرض قسمت خدمات</label>
                                    <input type="text" class="form-control" name="services_text" id="services_text" placeholder="ضروری" value="{{ $settings->services_text }}">

                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">متن پیش فرض قسمت پروژه ها</label>
                                    <input type="text" class="form-control" name="projects_text" id="projects_text" placeholder="ضروری" value="{{ $settings->projects_text }}">
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">متن پیش فرض قسمت صفحات</label>
                                    <input type="text" class="form-control" name="pages_text" id="pages_text" placeholder="ضروری" value="{{ $settings->pages_text }}">
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

                window.open('/file-manager/fm-button', 'fm', 'width=900,height=400');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>
@endpush
