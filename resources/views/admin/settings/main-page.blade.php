@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/dragula.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/all/example.css') }}">
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">مدیریت تنظیمات صفحه اصلی</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.mainPage_settings_save') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">تنظیمات صفحه اصلی</h5>
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
                                    <label for="title" class="form-label">نام سایت</label>
                                    <input type="text" class="form-control" name="site_name" id="site_name"
                                           placeholder="ضروری" value="{{ $settings->site_name }}">

                                </div>


                                <div class="mb-3">
                                    <label for="site_description" class="form-label">توضیح کوتاه درباره سایت</label>
                                    <textarea class="form-control" name="site_description" id=site_description"
                                              rows="5">{{ $settings->site_description }}</textarea>
                                </div>

{{--                                <div class="mb-3">--}}
{{--                                    <div class='parent'>--}}
{{--                                        <div class='wrapper'>--}}
{{--                                            <div id='sortable' class='container'>--}}
{{--                                                <div>Clicking on these elements triggers a regular <code>click</code> event you can listen to.</div>--}}
{{--                                                <div>Try dragging or clicking on this element.</div>--}}
{{--                                                <div>Note how you can click normally?</div>--}}
{{--                                                <div>Drags don't trigger click events.</div>--}}
{{--                                                <div>Clicks don't end up in a drag, either.</div>--}}
{{--                                                <div>This is useful if you have elements that can be both clicked or dragged.</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                </div>--}}


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
    <script src="{{ asset('/js/all/dragula.min.js') }}"></script>
    <script src="{{ asset('/js/all/example.min.js') }}"></script>

    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            language: 'fa',
            contentsLangDirection: 'rtl',

        });
        document.addEventListener("DOMContentLoaded", function () {

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
