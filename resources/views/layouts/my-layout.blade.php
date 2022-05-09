<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | E-Shopper</title>
    <link href="/themes/Eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/Eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="/themes/Eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="/themes/Eshopper/css/price-range.css" rel="stylesheet">
    <link href="/themes/Eshopper/css/animate.css" rel="stylesheet">
    <link href="/themes/Eshopper/css/main.css" rel="stylesheet">
    <link href="/themes/Eshopper/css/responsive.css" rel="stylesheet">

    {{ $style ?? '' }}

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    @include('partials.header')


    {{ $slider ?? '' }}

    {{ $banner ?? '' }}

    <section>
        <div class="container">
            {{ $slot }}
        </div>
    </section>

    @include('partials.footer')

    <script src="/themes/Eshopper/js/jquery.js"></script>
    <script src="/themes/Eshopper/js/bootstrap.min.js"></script>
    <script src="/themes/Eshopper/js/jquery.scrollUp.min.js"></script>
    <script src="/themes/Eshopper/js/price-range.js"></script>
    <script src="/themes/Eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('themes/Eshopper/js/main.js') }}"></script>

    <script src="{{ asset('js/common.js') }}"></script>

    {{ $script ?? '' }}
</body>
</html>
