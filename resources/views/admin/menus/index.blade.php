@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/sweetalert2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">لیست منوها</h4>



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
                                                class="btn btn-light waves-effect waves-light" data-bs-toggle="modal"
                                                data-bs-target="#create_category"><i
                                                class="bx bx-plus me-1"></i>ایجاد منو جدید
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="create_category" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('admin.menus.store') }}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">ایجاد منوی
                                                                جدید</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                       class="form-label">والد</label>
                                                                <select name="parent_id" id="parent_id" class="form-select">
                                                                    <option value="0"></option>

                                                                @foreach($parents as $parent)

                                                                        <option
                                                                            value="{{ $parent->id }}">{{ $parent->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">عنوان</label>
                                                                <input class="form-control" name="title" id="title"
                                                                       value="{{ old('title') }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">ترتیب
                                                                    نمایش</label>
                                                                <input class="form-control" name="order" id="order"
                                                                       value="{{ old('order') }}" required>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">آدرس منو</label>
                                                                <input class="form-control" name="url" id="url"
                                                                       dir="ltr"
                                                                       value="{{ old('url') }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">نمایش
                                                                    منو در</label>
                                                                <select name="type" id="" class="form-select">
                                                                    <option value="HEADER">هدر</option>
                                                                    <option value="FOOTER">فوتر</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">وضعیت
                                                                    نمایش</label>
                                                                <select name="visibility" id="" class="form-select">
                                                                    <option value="1">فعال</option>
                                                                    <option value="0">غیرفعال</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">ذخیره
                                                                تغییرات
                                                            </button>
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
                                        <th>والد</th>
                                        <th>عنوان</th>
                                        <th>آدرس</th>
                                        <th>نوع</th>
                                        <th>ترتیب</th>
                                        <th>وضعیت نمایش</th>
                                        <th>تاریخ ایجاد</th>
                                        <th style="width: 90px;">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($menus as $menu)

                                        <tr>
                                            <td>{{ $menu->id }}</td>
                                            <td> {{ $menu->parent ? $menu->parent->title : '' }}</td>
                                            <td> {{ $menu->title }}</td>
                                            <td> {{ $menu->url }}</td>
                                            <td> {{ $menu->type }}</td>
                                            <td> {{ $menu->order }}</td>
                                            <td>
                                                {!!   $menu->visibility ? '<div class="badge badge-soft-success font-size-12">فعال</div>' : '<div class="badge badge-soft-danger font-size-12">غیرفعال</div>' !!}
                                            </td>
                                            <td>{{ $menu->created_at ?\Morilog\Jalali\Jalalian::forge($menu->created_at) : 'نامشخص'  }}</td>

                                            <td>

                                                <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit_menu{{$menu->id}}"
                                                        class="btn btn-square btn-primary"><i class="bx bxs-edit"></i>
                                                </button>
                                                <div class="modal fade" id="edit_menu{{$menu->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('admin.menus.update',$menu->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ویرایش منو {{ $menu->title }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                               class="form-label">والد</label>
                                                                        <select name="parent_id" id="parent_id"
                                                                                class="form-select">

                                                                            @foreach($parents->where('id','!=',$menu->id) as $parent)
                                                                                <option value="0"></option>

                                                                                <option
                                                                                    {{ $menu->parent_id == $parent->id ? 'selected' : '' }} value="{{ $parent->id }}">{{ $parent->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="title"
                                                                               class="form-label">عنوان</label>
                                                                        <input class="form-control" name="title"
                                                                               id="title"
                                                                               value="{{ $menu->title }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">ترتیب
                                                                            نمایش</label>
                                                                        <input class="form-control" name="order"
                                                                               id="order"
                                                                               value="{{ $menu->order }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">آدرس
                                                                            منو</label>
                                                                        <input class="form-control" name="url" id="url"
                                                                               dir="ltr"
                                                                               value="{{ $menu->url }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                               class="form-label">نمایش
                                                                            منو در</label>
                                                                        <select name="type" id="" class="form-select">
                                                                            <option
                                                                                {{ $menu->type == 'HEADER' ? 'selected' : '' }} value="HEADER">
                                                                                هدر
                                                                            </option>
                                                                            <option
                                                                                {{ $menu->type == 'FOOTER' ? 'selected' : '' }} value="FOOTER">
                                                                                فوتر
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                               class="form-label">وضعیت
                                                                            نمایش</label>
                                                                        <select name="visibility" id=""
                                                                                class="form-select">
                                                                            <option value="1">فعال</option>
                                                                            <option value="0">غیرفعال</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">ذخیره
                                                                        تغییرات
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                                <button class="btn btn-square btn-danger delete_menu"
                                                        data-menu="{{ $menu->id }}"><i class="bx bxs-trash"></i>
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

    <script>
        $('.delete_menu').on('click', function (e) {
            var menu_id = $(this).data('menu');
            e.preventDefault();
            Swal.fire({
                title: "آیا اطمینان دارید؟",
                text: " پس از حذف قادر به بازیابی این منو نخواهید بود!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله'
            })
                .then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/menus/" + menu_id,
                            type: 'POST', // replaced from put

                            data: {
                                "_token": '{{ csrf_token() }}',
                                "menu": menu_id,
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

