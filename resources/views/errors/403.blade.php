<style>/*======================
    404 page
=======================*/

    .page_404 {
        padding: 40px 0;
        background: #fff;
        font-family: "Arvo", serif;
    }

    .page_404 img {
        width: 100%;
    }

    .four_zero_four_bg {
        background-image: url('{{ asset('/assets/images/1.gif') }}');
        height: 400px;
        background-position: center;
    }

    .four_zero_four_bg h1 {
        font-size: 80px;
        font-family:iransans;
    }

    .four_zero_four_bg h3 {
        font-size: 80px;
        font-family:iransans;
    }
    .h2,h3,p{
        font-family:iransans;
    }
    .link_404 {
        color: #fff !important;
        padding: 10px 20px;
        background: #39ac31;
        margin: 20px 0;
        font-family:iransans;
        display: inline-block;
    }
    .contant_box_404 {
        font-family:iransans;
        margin-top: -50px;
    }</style>
<!DOCTYPE html>
<html lang="en">

<head
>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> خطا</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/css/style-rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}"/>

</head>
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
<body>
<div class="page-content">
    <div class="container-fluid">
        <section class="page_404">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-10 col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg">
                                <h1 class="text-center ">403</h1>
                            </div>
                            <div class="contant_box_404">
                                <h3 class="h2">
                                    خطای دسترسی

                                </h3>

                                <p>شما اجازه دسترسی به این صفحه را ندارید

                                </p>

                                <a href="/" class="link_404">بازگشت به صفحه اصلی</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</div>


</body>

</html>
