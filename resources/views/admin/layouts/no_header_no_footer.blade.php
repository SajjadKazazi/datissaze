<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'پنل مدیریت') }}</title>
    <!-- Favicons -->
        <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
{{--    @vite('resources/css/admin/admin.css','build')--}}

    <style type="text/css">
        @font-face {
            font-family: "iransans";
            src: url("{{ asset('/fonts/IRANSansWeb_Light.woff2') }}") format("woff2");
            src: url("{{ asset('/fonts/IRANSansWeb_Light.woff') }}") format("woff");
        }

        *body
        {
            font-family:iransans;

        }</style>
    @yield('style')
</head>
<body style="background-image: url('/assets/images/bg.jpg')">

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
@yield('content')



<div class="rightbar-overlay"></div>

<script src="{{ mix('js/admin.js') }}"></script>

</body>

</html>
