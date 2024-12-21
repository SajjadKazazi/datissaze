<!doctype html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8"/>
    <title>پنل مدیریت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="پنل مدیریت" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="/css/all/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>

    <!-- preloader css -->
    <link rel="stylesheet" href="/css/all/preloader.min.css" type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="/css/all/bootstrap-rtl.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="/css/all/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="/css/all/app-rtl.min.css" id="app-style" rel="stylesheet" type="text/css"/>

</head>
<style type="text/css">
    @font-face {
        font-family: "iransans";
        src: url("/fonts/IRANSansWeb_Light.woff2") format("woff2");
        src: url("/fonts/IRANSansWeb_Light.woff") format("woff");
    }

    * body {
        font-family: iransans;

    }</style>
<body style="background-image: url('/assets/images/bg.jpg')">

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- end page title -->
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-12 col-xl-6 mx-auto">
                                    <div class="card">
                                        <div class="row">

                                            <div class="col-md-12 ps-md-0">
                                                <div class="auth-form-wrapper px-4 py-5">
                                                    <h5 class="text-muted fw-normal mb-4">لطفا جهت ورود به پنل مدیریت نام
                                                        کاربری و رمز عبور خود را وارد کنید</h5>
                                                    <form class="forms-sample" action="{{ route('admin_login_post') }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <div class="mb-3">
                                                            <label for="userEmail" class="form-label">نام کاربری</label>
                                                            <input type="text" class="form-control" id="userEmail" name="email"
                                                                   placeholder="نام کاربری">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="userPassword" class="form-label">رمز عبور</label>
                                                            <input  type="password" class="form-control" name="password"
                                                                   id="userPassword" autocomplete="current-password"
                                                                   placeholder="رمز عبور">
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                   id="authCheck">
                                                            <label class="form-check-label" for="authCheck">
                                                                مرا بخاطر بسپار
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <button type="submit"
                                                               class="btn btn-primary me-2 mb-2 mb-md-0 text-white">ورود</button>

                                                        </div>

                                                    </form>
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger mt-3">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>


    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->


</body>

</html>
