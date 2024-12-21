<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>پنل مدیریت | داشبورد </title>

    <!-- Favicons -->
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    {{--    @vite('resources/css/admin/admin.css','build')--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">--}}


    <style type="text/css">
        @font-face {
            font-family: "iransans";
            src: url("{{ asset('/fonts/IRANSansWeb_Light.woff2') }}") format("woff2");
            src: url("{{ asset('/fonts/IRANSansWeb_Light.woff') }}") format("woff");
        }

        * body {
            font-family: iransans;

        }
        .navbar-brand-box{
            background: #c7c5d1;!important;
        }
    </style>
    @yield('style')
</head>
<body>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ url()->current() }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset($settings->site_logo) }}" alt="" height="24">
                    </span>
                        <span class="logo-lg">
                        <img src="{{ asset($settings->site_logo) }}" alt="" height="24"> <span class="logo-txt">پنل مدیریت</span>
                    </span>
                    </a>

                    <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset($settings->site_logo) }}" alt="" height="24">
                    </span>
                        <span class="logo-lg">
                        <img src="{{ asset($settings->site_logo) }}" alt="" height="24"> <span class="logo-txt">فوداتکو</span>
                    </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>


            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="search" class="icon-lg"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="جستجو ..."
                                           aria-label="Search Result">

                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                class="mdi mdi-logout font-size-16 align-middle me-1"></i>خروج</a>

                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" data-key="t-menu">منو</li>



                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="camera"></i>
                            <span data-key="t-camera">اسلایدر</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.sliders.index') }}">
                                    <span data-key="t-calendar">لیست اسلایدرها</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.sliders.create') }}">
                                    <span data-key="t-chat">افزودن اسلایدر جدید</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="layers"></i>
                            <span data-key="t-apps">پروژه ها</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.portfolios.index') }}">
                                    <span data-key="t-calendar">لیست پروژه ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.portfolios.create') }}">
                                    <span data-key="t-chat">افزودن پروژه جدید</span>
                                </a>
                            </li>

                        </ul>
                    </li>
{{--                    <li>--}}
{{--                        <a href="javascript: void(0);" class="has-arrow">--}}
{{--                            <i data-feather="edit"></i>--}}
{{--                            <span data-key="t-apps">مقالات</span>--}}
{{--                        </a>--}}
{{--                        <ul class="sub-menu" aria-expanded="false">--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('admin.articles.index') }}">--}}
{{--                                    <span data-key="t-calendar">لیست مقالات</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('admin.articles.create') }}">--}}
{{--                                    <span data-key="t-chat">افزودن مقاله جدید</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="flag"></i>
                            <span data-key="t-apps">مقالات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.articles.index') }}">
                                    <span data-key="t-calendar">لیست مقالات</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.articles.create') }}">
                                    <span data-key="t-chat">افزودن مقاله جدید</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.articles.categories.index')  }}">
                                    <span data-key="t-chat">لیست دسته بندی مقالات</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="flag"></i>
                            <span data-key="t-apps">اخبار</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.news.index') }}">
                                    <span data-key="t-calendar">لیست اخبار</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news.create') }}">
                                    <span data-key="t-chat">افزودن خبر جدید</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.news.categories.index') }}">
                                    <span data-key="t-chat">لیست دسته بندی اخبار</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="menu"></i>
                            <span data-key="t-apps">خدمات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.services.index') }}">
                                    <span data-key="t-calendar">لیست خدمات</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.services.create') }}">
                                    <span data-key="t-chat">افزودن خدمت جدید</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="users"></i>
                            <span data-key="t-apps">مدیریت تیم</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.staffs.index') }}">
                                    <span data-key="t-calendar">لیست تیم</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.staffs.create') }}">
                                    <span data-key="t-chat">افزودن عضو جدید</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.Staffs.categories.index') }}">
                                    <span data-key="t-chat">لیست دسته بندی تیم</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="server"></i>
                            <span data-key="t-server"> شرکت های همکار</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.cooperators.index') }}">
                                    <span data-key="t-calendar">لیست شرکت ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.cooperators.create') }}">
                                    <span data-key="t-chat">افزودن شرکت جدید</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file"></i>
                            <span data-key="t-files"> صفحات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.pages.index') }}">
                                    <span data-key="t-calendar">لیست صفحات</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pages.create') }}">
                                    <span data-key="t-chat">افزودن صفحه جدید</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.menus.index') }}">
                            <i data-feather="list"></i>
                            <span data-key="t-dashboard">مدیریت منو</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.admin_file_manager') }}">
                            <i data-feather="file-text"></i>
                            <span data-key="t-dashboard">مدیریت فایل</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ url('/admin/contacts') }}">
                            <i data-feather="mail"></i>
                            <span data-key="t-dashboard">تماس با ما</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/resumes') }}">
                            <i data-feather="download"></i>
                            <span data-key="t-dashboard">رزومه های ارسالی</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-apps">تنظیمات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.general_settings') }}">
                                    <span data-key="t-calendar">عمومی</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.mainPage_settings') }}">
                                    <span data-key="t-calendar">صفحه اصلی</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.communication_settings') }}">
                                    <span data-key="t-calendar">راه های ارتباطی</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.DefaultText_settings') }}">
                                    <span data-key="t-calendar">متن های پیش فرض</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i data-feather="log-out"></i>
                            <span data-key="t-log-out">خروج</span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('content')


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                        ۲۰۲۲
                        ©
                    </div>
                    <div class="col-sm-6">
{{--                        <div class="text-sm-end d-none d-sm-block">--}}
{{--                            طراحی وتوسعه با <a href="#!" class="text-decoration-underline">فوداتکو</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center bg-dark p-3">

            <h5 class="m-0 me-2 text-white">سفارشی سازی تم</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0"/>

        <div class="p-4">
            <h6 class="mb-3">چیدمان</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                <label class="form-check-label" for="layout-vertical">عمومی</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                <label class="form-check-label" for="layout-horizontal">افقی</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">حالت چیدمان</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                <label class="form-check-label" for="layout-mode-light">روشن</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                <label class="form-check-label" for="layout-mode-dark">تاریک</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">عرض طرح بندی</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild"
                       onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                <label class="form-check-label" for="layout-width-fuild">کامل</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed"
                       onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                <label class="form-check-label" for="layout-width-boxed">باکس</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">طرح بندی</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                       value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                <label class="form-check-label" for="layout-position-fixed">ثابت</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
                       value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                <label class="form-check-label" for="layout-position-scrollable">اسکرول</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">رنگ تاب بار</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light"
                       onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">روشن</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark"
                       onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">تاریک</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">اندازه سایدبار</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                       value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">پیش فرض</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                       value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                <label class="form-check-label" for="sidebar-size-compact">فشرده</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small"
                       onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">کوچک</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">رنگ سایدبار</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light"
                       onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">روشن</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark"
                       onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">تاریک</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand"
                       onchange="document.body.setAttribute('data-sidebar', 'brand')">
                <label class="form-check-label" for="sidebar-color-brand">برند</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">جهت نمایش</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                       value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">چپ چین</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                       value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">راست چین</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div>

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script src="{{ mix('js/admin.js') }}"></script>

@stack('script')
{{--@vite('resources/js/admin/admin.js','build')--}}

<!-- JAVASCRIPT -->
{{--<script src="assets/libs/jquery/jquery.min.js"></script>--}}
{{--<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="assets/libs/metismenu/metisMenu.min.js"></script>--}}
{{--<script src="assets/libs/simplebar/simplebar.min.js"></script>--}}
{{--<script src="assets/libs/node-waves/waves.min.js"></script>--}}

{{--<!-- pace js -->--}}
{{--<script src="assets/libs/pace-js/pace.min.js"></script>--}}
{{--<script src="assets/vendors/flatpickr/flatpickr.min.js"></script>--}}
{{--<script src="assets/vendors/apexcharts/apexcharts.min.js"></script>--}}
{{--<!-- endinject -->--}}
{{--<script src="style/js/dashboard-light.js"></script>--}}
{{--<script src="assets/vendors/feather-icons/feather.min.js"></script>--}}
{{--<script src="style/js/template.js"></script>--}}

{{--<script src="assets/js/app.js"></script>--}}

</body>

</html>
