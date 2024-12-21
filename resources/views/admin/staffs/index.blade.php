@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/sweetalert2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">لیست تیم</h4>



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
                                        <a href="{{ route('admin.staffs.create') }}"
                                           class="btn btn-light waves-effect waves-light"><i
                                                class="bx bx-plus me-1"></i>ایجاد عضو</a>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="table-responsive">
                                <table class="table align-middle datatable dt-responsive table-check nowrap"
                                       style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                    <tr class="bg-transparent">

                                        <th>شناسه</th>
                                        <th>اواتار</th>
                                        <th>نام</th>
                                        <th>شغل</th>
                                        <th>دسته بندی</th>


                                        <th style="width: 90px;">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($staffs as $staff)
                                        <tr>
                                            <td>{{ $staff->id }}</td>
                                            <td>
                                                @if(!is_null($staff->avatar))
                                                    <a  data-bs-toggle="modal" data-bs-target="#imagemodal{{$staff->id}}" class="showImage" data-staff="{{ $staff->id  }}">
                                                        <img  src="{{ asset($staff->avatar) }}">
                                                    </a>
                                                    <div class="modal fade" id="imagemodal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <img src="{{ asset($staff->avatar) }}" id="imagepreview" style="width: 100%; height: 100%;" >
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $staff->name }}
                                            </td>
                                            <td> {{ $staff->job }}</td>
                                            <td> {{ $staff->category ?  $staff->category->title : '' }}</td>




                                            <td>
                                                <a href="{{ route('admin.staffs.edit',$staff->id) }}"
                                                   class="btn btn-square btn-primary"><i class="bx bxs-edit"></i></a>
                                                <button class="btn btn-square btn-danger delete_staff"
                                                        data-staff="{{ $staff->id }}"><i class="bx bxs-trash"></i>
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
        $('.delete_staff').on('click', function (e) {
            var staff_id = $(this).data('staff');
            e.preventDefault();
            Swal.fire({
                title: "آیا اطمینان دارید؟",
                text: " پس از حذف قادر به بازیابی این عضو نخواهید بود!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله'
            })
                .then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/staffs/" + staff_id,
                            type: 'POST', // replaced from put

                            data: {
                                "_token": '{{ csrf_token() }}',
                                "staff": staff_id,
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
        // $(".showImage").on("click", function() {
        //     $('#imagepreview').attr('src', $('#imagesource').attr('src'));
        //     $('#imagemodal').modal('show');
        // });
    </script>
@endpush

