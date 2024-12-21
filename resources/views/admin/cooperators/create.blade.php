@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">افزودن همکار جدید</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.cooperators.store') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">اطلاعات ثبت پروژه</h5>
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
                                    <label for="order" class="form-label">نام شرکت</label>
                                    <input class="form-control" name="name" id="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر<span style="color: red"> (ابعاد تصویر باید 200*200 باشد)</span></label>
                                    <div class="d-flex gap-2">

                                        <input dir="ltr" type="text" id="image_label" class="form-control" name="img"
                                               aria-label="Image" aria-describedby="button-image">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب </button>
                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary me-2">ذخیره</button>

                                <!-- end table responsive -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">اطلاعات سئو</h5>
                                <hr>


                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input class="form-control" name="meta_title" id="meta_title" required
                                           value="{{ old('meta_title') }}">
                                </div>


                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <input class="form-control" name="meta_description" id="meta_description" required
                                           value="{{ old('meta_description') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="meta_canonical" class="form-label">Meta Canonical</label>
                                    <input class="form-control" name="meta_canonical" id="meta_canonical"
                                           value="{{ old('meta_canonical') }}">
                                </div>


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

    <script>

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>
@endpush
