@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ویرایش سرویس</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="forms-sample" action="{{ route('admin.services.update',$service->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">اطلاعات ثبت سرویس</h5>
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
                                    <input type="text" class="form-control" name="title" id="title" placeholder="ضروری" value="{{ $service->title }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">توضیح کوتاه<span style="color: red"> (تعداد کارکتر مناسب : 150 کارکتر)</span></label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{ $service->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">نامک</label>
                                    <input type="text" class="form-control" id="slug" autocomplete="off" placeholder="ضروری" name="slug" value="{{ $service->slug }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="avatar">تصویر </label>

                                    <div class="d-flex gap-2 align-items-center">
                                        @if(!is_null($service->image))
                                            <div class="col-lg-2">
                                                <a id="showImage">
                                                    <img id="imagesource" class="img-thumbnail" style="width: 100px" src="{{ asset($service->image) }}">
                                                </a>
                                                <!-- Creates the bootstrap modal where the image will appear -->
                                                <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-body">
                                                                <img src="" id="imagepreview" style="width: 100%; height: 100%;" >
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                        <div class="col-lg-10 d-flex gap-2">
                                            <input dir="ltr" type="text" id="image_label" class="form-control" name="image"
                                                   aria-label="Image" aria-describedby="button-image">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">محتوا</label>
                                    <textarea class="ckeditor form-control" name="body" id="body" rows="5">{{ $service->body }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نمایش در صفحه اصلی</label>
                                    <select name="is_home" id="is_home" class="form-select">
                                        <option value="1"{{ $service->is_home == 1 ? 'selected' : '' }}>فعال</option>
                                        <option value="0" {{ $service->is_home == 0 ? 'selected' : '' }}>غیرفعال</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">وضعیت</label>
                                    <select name="active" id="" class="form-select">
                                        <option value="1"{{ $service->active == 1 ? 'selected' : '' }}>فعال</option>
                                        <option value="0" {{ $service->active == 0 ? 'selected' : '' }}>غیرفعال</option>
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
                                           value="{{ $service->meta ? $service->meta->meta_title : '' }}">
                                </div>


                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <input class="form-control" name="meta_description" id="meta_description" required
                                           value="{{ $service->meta ? $service->meta->meta_description : '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="meta_canonical" class="form-label">Meta Canonical</label>
                                    <input class="form-control" name="meta_canonical" id="meta_canonical"
                                           value="{{ $service->meta ? $service->meta->meta_canonical : '' }}">
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
        CKEDITOR.replace('body',{
            language: 'fa',
            contentsLangDirection:'rtl',
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            extraPlugins : 'video',
            filebrowserVideoBrowseUrl : '/file-manager/ckeditor'

        });

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
