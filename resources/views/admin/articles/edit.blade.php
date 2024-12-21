@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/select2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ویرایش مقاله</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.articles.update',$article->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">اطلاعات ثبت مقاله</h5>
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
                                    <input class="form-control" name="title" id="title" value="{{ $article->title }}">
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">نامک</label>
                                    <input class="form-control" name="slug" id="slug" value="{{ $article->slug  }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">دسته بندی</label>
                                    <select multiple="multiple" name="categories[]" id="categories" class="form-select">
                                        @foreach($categories as $category)
                                            <option {{ in_array($category->id , $news_categories) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="avatar">توضیح کوتاه<span style="color: red"> (تعداد کارکتر مناسب : 150 کارکتر)</span></label>
{{--                                    <textarea class="form-control" name="description" id="description" rows="5">{{ $article->description }}</textarea>--}}
                                    <textarea type="text" rows="4" id="description" name="description" maxlength="191" class="form-control">{{ $article->description}}</textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">محتوای مقاله</label>
                                    <textarea class="ckeditor form-control" name="body" id="body" rows="5">{{ $article->body }}</textarea>
                                </div>

                            <div class="mb-3">

                                <label class="form-label" for="avatar">تصویر<span style="color: red"> (ابعاد تصویر باید 270*400 باشد)</span></label>
                                <div class="d-flex gap-2">
                                    @if(!is_null($article->thumbnail) && !empty($article->thumbnail))
                                        <a data-bs-toggle="modal" data-bs-target="#imagemodal{{$article->id}}"
                                           class="showImage" data-staff="{{ $article->id  }}">
                                            <img style="width: 70px;" src="{{ asset($article->thumbnail) }}">
                                        </a>
                                        <div class="modal fade" id="imagemodal{{$article->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <img src="{{ asset($article->thumbnail) }}" id="imagepreview"
                                                             style="width: 100%; height: 100%;">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <input dir="ltr" type="text" id="image_label" class="form-control" name="avatar"
                                           aria-label="Image" aria-describedby="button-image" value="{{ $article->thumbnail }}">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">
                                        انتخاب
                                    </button>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="avatar">تصویر هدر مقاله<span style="color: red"> (ابعاد تصویر باید 410*1000 باشد)</span></label>
                                <div class="d-flex gap-2">
                                    @if(!is_null($article->page_image) && !empty($article->page_image))
                                        <a data-bs-toggle="modal" data-bs-target="#imagemodal2{{$article->id}}"
                                           class="showImage" data-staff="{{ $article->id  }}">
                                            <img style="width: 70px;" src="{{ asset($article->page_image) }}">
                                        </a>
                                        <div class="modal fade" id="imagemodal2{{$article->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <img src="{{ asset($article->page_image) }}" id="imagepreview"
                                                             style="width: 100%; height: 100%;">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                        <input dir="ltr" type="text" id="image2" class="form-control" value="{{ $article->page_image }}"
                                               name="page_image" placeholder="اختیاری"
                                               aria-label="Image" aria-describedby="page-image-button">
                                        <button class="btn btn-outline-secondary" type="button" id="page-image-button">
                                            انتخاب
                                        </button>
                                </div>


                            </div>



                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">وضعیت</label>
                                    <select name="active" id="visibility" class="form-select">
                                        <option value="1"{{ $article->active == 1 ? 'selected' : '' }}>فعال</option>
                                        <option value="0" {{ $article->active == 0 ? 'selected' : '' }}>غیرفعال</option>
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
                                <input class="form-control" name="meta_title" id="meta_title" value="{{ $article->meta ? $article->meta->meta_title :'' }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input class="form-control" name="meta_description" id="meta_description" value="{{ $article->meta ? $article->meta->meta_description : '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_canonical" class="form-label">Meta Canonical</label>
                                <input class="form-control" name="meta_canonical" id="meta_canonical" value="{{ $article->meta ? $article->meta->meta_canonical :'' }}">
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
    <script src="{{ asset('/js/all/select2.min.js') }}"></script>

    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        // CKEDITOR.replace('description', {
        //     language: 'fa',
        //     contentsLangDirection:'rtl',
        //     filebrowserImageBrowseUrl: '/file-manager/ckeditor',
        //     extraPlugins : 'video',
        //     filebrowserVideoBrowseUrl : '/file-manager/ckeditor'
        //
        // });
        CKEDITOR.replace('body', {
            language: 'fa',
            contentsLangDirection:'rtl',
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            extraPlugins : 'video',
            filebrowserVideoBrowseUrl : '/file-manager/ckeditor'

        });
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image1';

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
            });

            document.getElementById('page-image-button').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image2';

                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');

            });
        });

        // input
        let inputId = '';

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }


        $(document).ready(function() {
            $('#categories').select2();
        });
    </script>
@endpush
