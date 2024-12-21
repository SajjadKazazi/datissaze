
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset($settings->favicon) }}">

    {{--    <meta name="description" content="{{ $settings->site_description }}">--}}
{{--    <title> {{ $settings->site_name }} </title>--}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=6') }}">

</head>
<body>

<x-front.header.nav/>

@yield('content')

<x-front.footer.section/>

<script src="/bundle.js?v=5"></script>

</body>
</html>
