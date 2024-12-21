@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/sweetalert2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">لیست سرویس ها</h4>



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
                                        <a href="{{ route('admin.services.create') }}"
                                           class="btn btn-light waves-effect waves-light"><i
                                                class="bx bx-plus me-1"></i>ایجاد سرویس</a>
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
                                        <th>تصویر</th>
                                        <th>عنوان</th>
                                        <th>نامک</th>

                                        <th>تاریخ ایجاد</th>

                                        <th style="width: 90px;">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($services as $service)
                                        <tr>

                                            <td>{{ $service->id }}</td>
                                            <td>
                                                @if(!is_null($service->image))
                                                    <a  data-bs-toggle="modal" data-bs-target="#imagemodal{{$service->id}}" class="showImage" data-staff="{{ $service->id  }}">
                                                        <img  src="{{ asset($service->image) }}">
                                                    </a>
                                                    <div class="modal fade" id="imagemodal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <img src="{{ asset($service->image) }}" id="imagepreview" style="width: 100%; height: 100%;" >
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    بدون تصویر
                                                @endif
                                            </td>

                                            <td>
                                                {{ $service->title }}
                                            </td>
                                            <td>
                                                {{ $service->slug }}
                                            </td>

                                            <td>{{ $service->created_at ?\Morilog\Jalali\Jalalian::forge($service->created_at) : 'نامشخص'  }}</td>


                                            <td>
                                                <a href="{{ route('admin.services.edit',$service->id) }}"
                                                   class="btn btn-square btn-primary"><i class="bx bxs-edit"></i></a>
                                                <button class="btn btn-square btn-danger delete_service"
                                                        data-service="{{ $service->id }}"><i class="bx bxs-trash"></i>
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
        $('.delete_service').on('click', function (e) {
            var service_id = $(this).data('service');
            e.preventDefault();
            Swal.fire({
                title: "آیا اطمینان دارید؟",
                text: " پس از حذف قادر به بازیابی این سرویس نخواهید بود!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله'
            })
                .then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/services/" + service_id,
                            type: 'POST', // replaced from put

                            data: {
                                "_token": '{{ csrf_token() }}',
                                "service": service_id,
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

