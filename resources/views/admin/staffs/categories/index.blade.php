@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/sweetalert2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">لیست دسته بندی های تیم</h4>



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
                                        <button type="button"
                                           class="btn btn-light waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create_category"><i
                                                class="bx bx-plus me-1"></i>ایجاد دسته بندی</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="create_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('admin.Staffs.categories.store') }}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">ایجاد دسته بندی جدید</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">عنوان</label>
                                                                <input class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="slug" class="form-label">نامک</label>
                                                                <input class="form-control" name="slug" id="slug" value="{{ old('slug') }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">توضیحات</label>
                                                                <textarea class="ckeditor form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
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
                            <div class="table-responsive">
                                <table class="table align-middle datatable dt-responsive table-check nowrap"
                                       style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                    <tr class="bg-transparent">
                                        <th>شناسه</th>
                                        <th>عنوان</th>
                                        <th>نامک</th>
                                        <th>تاریخ ایجاد</th>

                                        <th style="width: 90px;">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->created_at ?\Morilog\Jalali\Jalalian::forge($category->created_at) : 'نامشخص'  }}</td>

                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit_category{{$category->id}}"
                                                   class="btn btn-square btn-primary"><i class="bx bxs-edit"></i></button>
                                                <div class="modal fade" id="edit_category{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('admin.Staffs.categories.update',$category->id) }}" method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">ویرایش دسته بندی {{ $category->title }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">عنوان</label>
                                                                        <input class="form-control" name="title" id="title" value="{{ $category->title }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="slug" class="form-label">نامک</label>
                                                                        <input class="form-control" name="slug" id="slug" value="{{ $category->slug }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">توضیحات</label>
                                                                        <textarea class="ckeditor form-control" name="description" id="description" rows="5">{{ $category->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                                <button class="btn btn-square btn-danger delete_category"
                                                        data-category="{{ $category->id }}"><i class="bx bxs-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="alert alert-info"> اطلاعاتی جهت نمایش وجود ندارد</p>
                                    @endforelse


                                    </tbody>
                                </table>
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
    <script src="{{ asset('/js/all/sweetalert2.min.js') }}"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>

        CKEDITOR.replace('description',{
            language: 'fa',
            contentsLangDirection:'rtl',
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });
        </script>
    <script>
        $('.delete_category').on('click', function (e) {
            var category_id = $(this).data('category');
            e.preventDefault();
            Swal.fire({
                title: "آیا اطمینان دارید؟",
                text: " پس از حذف قادر به بازیابی این دسته بندی نخواهید بود!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله'
            })
                .then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/staffs/categories/" + category_id,
                            type: 'POST', // replaced from put

                            data: {
                                "_token": '{{ csrf_token() }}',
                                "category": category_id,
                                "_method": 'DELETE'
                            },
                            success: function (data) {
                                // $("#comment"+comment_id).remove();
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        text: data.success_msg
                                    }).then(function () {
                                        window.location.reload();
                                    });
                                }
                            },
                            error: function (error) {
                            }
                        });

                    } else {

                    }
                });


        });


    </script>
@endpush

