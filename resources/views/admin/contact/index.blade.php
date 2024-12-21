@extends('admin.layouts.admin')
<link rel="stylesheet" href="{{ asset('/css/all/sweetalert2.min.css') }}">

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">لیست درخواست های تماس با ما</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


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

                                <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                    <tr class="bg-transparent">

                                        <th>شناسه</th>
                                        <th>نام</th>
                                        <th>نوع درخواست</th>

                                        <th>تلفن همراه</th>
                                        <th>پیام</th>

                                        <th style="width: 90px;">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>
                                                {{ $contact->name }}
                                            </td>
                                            <td>
                                                {{ \App\Enumoration\ContactType::persian[$contact->subject_type] }}
                                            </td>

                                           

                                            <td>
                                                {{ $contact->mobile }}
                                            </td>

                                            <td>
                                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#message{{$contact->id}}"  data-contact="{{ $contact->id  }}">
                                                نمایش پیام
                                                </button>
                                                <div class="modal fade" id="message{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-body">
                                                                <p class="w-100" style="white-space: pre-wrap"> {{ $contact->message }}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-square btn-danger delete_contact" data-contact="{{ $contact->id }}"><i class="bx bxs-trash"></i></button>
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
        $('.delete_contact').on('click', function (e) {
            var contact_id = $(this).data('contact');
            e.preventDefault();
            Swal.fire({
                title: "آیا اطمینان دارید؟",
                text: " پس از حذف قادر به بازیابی این درخواست نخواهید بود!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله'
            })
                .then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/contacts/" + contact_id,
                            type: 'POST', // replaced from put

                            data: {
                                "_token": '{{ csrf_token() }}',
                                "portfolio": contact_id,
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

