@extends('admin.layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ویرایش اسلایدر</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-4">
                                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-light waves-effect waves-light"><i class="bx bx-list-check me-1"></i>مشاهده اسلایدر ها</a>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="col-lg-8 offset-2">
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
                                <div class="card">
                                    <div class="card-body">


                                        <form class="forms-sample" action="{{ route('admin.sliders.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <label for="title" class="form-label">عنوان</label>
                                                <input class="form-control" name="title" id="title" value="{{ $slider->title }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="avatar">تصویر<span style="color: red"> (ابعاد تصویر باید 1500*577 باشد)</span></label>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <div class="col-lg-2">
                                                        <a  data-bs-toggle="modal" data-bs-target="#imagemodal{{$slider->id}}" class="showImage" data-staff="{{ $slider->id  }}">
                                                            <img style="width: 100px" src="{{ asset($slider->img) }}">
                                                        </a>
                                                        <div class="modal fade" id="imagemodal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        <img src="{{ asset($slider->img) }}" id="imagepreview" style="width: 100%; height: 100%;" >
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10 d-flex gap-2">
                                                        <input dir="ltr" type="text" id="image_label" class="form-control" name="img"
                                                               aria-label="Image" aria-describedby="button-image" value="{{ $slider->img }}">
                                                        <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب </button>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="order" class="form-label">ترتیب نمایش</label>
                                                <input class="form-control" name="order" id="order" value="{{ $slider->order }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="order" class="form-label">لینک</label>
                                                <input class="form-control" name="action" type="url" id="action" value="{{ $slider->action }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">نمایش</label>
                                                <select name="visibility" id="visibility" class="form-select">
                                                    <option value="1"{{ $slider->visibility == 1 ? 'selected' : '' }}>فعال</option>
                                                    <option value="0" {{ $slider->visibility == 0 ? 'selected' : '' }}>غیرفعال</option>
                                                </select>
                                            </div>


                                            <button type="submit" class="btn btn-primary me-2">ذخیره</button>


                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- end table responsive -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>




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