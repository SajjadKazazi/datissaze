@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ویرایش پروژه</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.portfolios.update',$portfolio->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
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
                                    <input type="text" class="form-control" name="title" id="title" placeholder="ضروری" value="{{ $portfolio->title }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">توضیح کوتاه<span style="color: red"> (تعداد کارکتر مناسب : 150 کارکتر)</span></label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{ $portfolio->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">دسته بندی</label>
                                    <input type="text" class="form-control" name="category" id="category" placeholder="اختیاری" value="{{ $portfolio->category}}">

                                </div>

                                <div class="mb-3">
                                    <label for="url" class="form-label">آدرس وبسایت</label>
                                    <input type="text" class="form-control" id="url" autocomplete="off" placeholder="اختیاری" name="url" value="{{ $portfolio->url }}">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">نامک</label>
                                    <input type="text" class="form-control" id="slug" autocomplete="off" placeholder="اجباری" name="slug" value="{{ $portfolio->slug  }}">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">ترتیب نمایش</label>
                                    <input type="text" class="form-control" id="order" autocomplete="off" placeholder="اجباری" name="order" value="{{ $portfolio->order }}">
                                </div>
                                <div class="mb-3">

                                    <label class="form-label" for="avatar">تصویر<span style="color: red"> (ابعاد تصویر باید 675*375 باشد)</span></label>
                                    <div class="d-flex gap-2">
                                        @if(!is_null($portfolio->thumbnail) && !empty($portfolio->thumbnail))
                                            <a data-bs-toggle="modal" data-bs-target="#imagemodal{{$portfolio->id}}"
                                               class="showImage" data-staff="{{ $portfolio->id  }}">
                                                <img style="width: 70px;" src="{{ asset($portfolio->thumbnail) }}">
                                            </a>
                                            <div class="modal fade" id="imagemodal{{$portfolio->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($portfolio->thumbnail) }}" id="imagepreview"
                                                                 style="width: 100%; height: 100%;">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <input dir="ltr" type="text" id="image_label1" class="form-control" name="thumbnail"
                                               aria-label="Image" aria-describedby="button-image1" value="{{ $portfolio->thumbnail }}">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image1">
                                            انتخاب
                                        </button>
                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label" for="avatar">بنر<span style="color: red"> (ابعاد تصویر باید  500*1500  باشد)</span></label>
                                    <div class="d-flex gap-2">
                                        @if(!is_null($portfolio->banner) && !empty($portfolio->banner))
                                            <a data-bs-toggle="modal" data-bs-target="#banner{{$portfolio->id}}"
                                               class="showImage" data-staff="{{ $portfolio->id  }}">
                                                <img style="width: 70px;" src="{{ asset($portfolio->banner) }}">
                                            </a>
                                            <div class="modal fade" id="banner{{$portfolio->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <img src="{{ asset($portfolio->banner) }}" id="imagepreview"
                                                                 style="width: 100%; height: 100%;">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <input dir="ltr" type="text" id="image_label2" class="form-control" name="banner"
                                               aria-label="Image" aria-describedby="button-image2" value="{{ $portfolio->banner }}">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image2">
                                            انتخاب
                                        </button>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="info" class="form-label">توضیحات</label>
                                    <textarea class="ckeditor form-control" name="info" id="info" rows="5">{{ $portfolio->info }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">وضعیت</label>
                                    <select name="active" id="" class="form-select">
                                        <option value="1"{{ $portfolio->active == 1 ? 'selected' : '' }}>فعال</option>
                                        <option value="0" {{ $portfolio->active == 0 ? 'selected' : '' }}>غیرفعال</option>
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
                                    <input class="form-control" name="meta_title" id="meta_title" required
                                           value="{{ $portfolio->meta ? $portfolio->meta->meta_title : '' }}">
                                </div>


                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <input class="form-control" name="meta_description" id="meta_description" required
                                           value="{{ $portfolio->meta ? $portfolio->meta->meta_description : '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="meta_canonical" class="form-label">Meta Canonical</label>
                                    <input class="form-control" name="meta_canonical" id="meta_canonical"
                                           value="{{ $portfolio->meta ? $portfolio->meta->meta_canonical : '' }}">
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
