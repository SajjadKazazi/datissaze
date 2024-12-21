@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/sweetalert2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">لیست صفحات</h4>



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
                                        <a href="{{ route('admin.pages.create') }}"
                                           class="btn btn-light waves-effect waves-light"><i
                                                class="bx bx-plus me-1"></i>ایجاد صفحه جدید</a>
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
                                        <th style="width: 90px;">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($pages as $page)
                                        <tr>


                                            <td>{{ $page->id }}</td>

                                            <td> {{ $page->title }}</td>

                                            <td> {{ $page->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.edit',$page->id) }}"
                                                   class="btn btn-square btn-primary"><i class="bx bxs-edit"></i></a>
                                                <button class="btn btn-square btn-danger delete_page"
                                                        data-page="{{ $page->id }}"><i class="bx bxs-trash"></i>
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
        $('.delete_page').on('click', function (e) {
            var page_id = $(this).data('page');
            e.preventDefault();
            Swal.fire({
                title: "آیا اطمینان دارید؟",
                text: " پس از حذف قادر به بازیابی این صفحه نخواهید بود!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله'
            })
                .then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/pages/" + page_id,
                            type: 'POST', // replaced from put

                            data: {
                                "_token": '{{ csrf_token() }}',
                                "page": page_id,
                                "_method": 'DELETE'
                            },
                            success: function (data) {
                                // $("#comment"+comment_id).remove();
                                if(data.success){
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

