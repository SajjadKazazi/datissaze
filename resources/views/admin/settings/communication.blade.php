@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">مدیریت تنظیمات راه های ارتباطی</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.communication_settings_save') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">راه های ارتباطی</h5>
                                <hr>
                                <div class="row">
                                    {{--                                <div class="col-sm">--}}
                                    {{--                                    <div class="mb-4">--}}
                                    {{--                                        <a href="{{ route('admin.news.index') }}" class="btn btn-light waves-effect waves-light"><i class="bx bx-list-check me-1"></i>مشاهده اخبار</a>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
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
                                    <label for="address" class="form-label">آدرس</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="ضروری" value="{{ $settings->address }}">

                                </div>

                                <div class="mb-3">
                                    <label for="tel" class="form-label">تلفن </label>
                                    <input type="tel" class="form-control" name="tel" id="tel" placeholder="ضروری" value="{{ $settings->tel }}">

                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">تلفن همراه </label>
                                    <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="ضروری" value="{{ $settings->mobile }}">

                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">ایمیل </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ضروری" value="{{ $settings->email }}">

                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">کد پستی </label>
                                    <input type="tel" class="form-control" name="postal_code" id="postal_code" placeholder="ضروری" value="{{ $settings->postal_code }}">

                                </div>


                                <button type="submit" class="btn btn-primary me-2">ذخیره</button>

                                <!-- end table responsive -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">شبکه های اجتماعی</h5>
                                <hr>
                                <div class="row">
                                    {{--                                <div class="col-sm">--}}
                                    {{--                                    <div class="mb-4">--}}
                                    {{--                                        <a href="{{ route('admin.news.index') }}" class="btn btn-light waves-effect waves-light"><i class="bx bx-list-check me-1"></i>مشاهده اخبار</a>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
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
                                    <label for="telegram" class="form-label">تلگرام </label>
                                    <input type="text" dir="ltr" class="form-control" name="telegram" id="telegram" placeholder="telegram"  value="{{ $settings->telegram }}">

                                </div>
                                <div class="mb-3">
                                    <label for="whatsapp" class="form-label">واتس اپ </label>
                                    <input type="text" dir="ltr" class="form-control" name="whatsapp" id="whatsapp" placeholder="whatsapp"  value="{{ $settings->whatsapp }}">

                                </div>

                                <div class="mb-3">
                                    <label for="instagram" class="form-label">اینستاگرام </label>
                                    <input type="text" dir="ltr" class="form-control" name="instagram" id="instagram" placeholder="instagram" value="{{ $settings->instagram }}">

                                </div>

                                <div class="mb-3">
                                    <label for="facebook" class="form-label">فیس بوک </label>
                                    <input type="text" dir="ltr" class="form-control" name="facebook" id="facebook" placeholder="facebook" value="{{ $settings->facebook }}">

                                </div>
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">بله </label>
                                    <input type="text" dir="ltr" class="form-control" name="bale" id="bale" placeholder="bale" value="{{ $settings->bale }}">

                                </div>

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
