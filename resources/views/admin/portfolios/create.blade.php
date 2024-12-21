@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">افزودن پروژه جدید</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->


            <form class="forms-sample" action="{{ route('admin.portfolios.store') }}" method="post"
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
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="ضروری" value="{{ old('title') }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">توضیح کوتاه<span style="color: red"> (تعداد کارکتر مناسب : 150 کارکتر)</span></label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">دسته بندی</label>
                                    <input type="text" class="form-control" name="category" id="category" placeholder="اختیاری" value="{{ old('category') }}">

                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">آدرس وبسایت</label>
                                    <input type="text" class="form-control" id="url" autocomplete="off" placeholder="اختیاری" name="url" value="{{ old(('url')) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">نامک</label>
                                    <input type="text" class="form-control" id="slug" autocomplete="off" placeholder="اجباری" name="slug" value="{{ old(('slug')) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">ترتیب نمایش</label>
                                    <input type="text" class="form-control" id="order" autocomplete="off" placeholder="اجباری" name="order" value="{{ old(('order')) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر<span style="color: red"> (ابعاد تصویر باید 675*375 باشد)</span></label>
                                    <div class="d-flex gap-2">

                                        <input dir="ltr" type="text" id="image_label1" class="form-control" name="thumbnail" placeholder="اختیاری"
                                               aria-label="Image" aria-describedby="button-image1">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image1">انتخاب </button>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">بنر<span style="color: red"> (ابعاد تصویر باید  500*1500  باشد)</span></label>
                                    <div class="d-flex gap-2">

                                        <input dir="ltr" type="text" id="image_label2" class="form-control" name="banner" placeholder="اختیاری"
                                               aria-label="Image" aria-describedby="button-image2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image2">انتخاب </button>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="info" class="form-label">توضیحات</label>
                                    <textarea class="ckeditor form-control" name="info" id="info" rows="5">{{ old('info') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">وضعیت</label>
                                    <select name="active" id="" class="form-select">
                                        <option value="1">فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
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
                                    <input class="form-control"  name="meta_title" id="meta_title"
                                           value="{{ old('meta_title') }}">
                                </div>


                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <input class="form-control"  name="meta_description" id="meta_description"
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
    <script src="/ckeditor/ckeditor.js"></script>

    <script>

        CKEDITOR.replace('info',{
            language: 'fa',
            contentsLangDirection:'rtl',
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            extraPlugins : 'video',
            filebrowserVideoBrowseUrl : '/file-manager/ckeditor'

        });
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image1').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label1';

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });

            document.getElementById('button-image2').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label2';

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');

            });
        });

        // input
        let inputId = '';

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }

    </script>
@endpush
