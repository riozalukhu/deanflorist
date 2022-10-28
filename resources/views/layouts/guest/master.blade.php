<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FloSun - Flower Shop HTML5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('guests/images/favicon.ico') }}">

    <!-- CSS
        ============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/vendor/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/vendor/font.awesome.min.css') }}">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/vendor/linearicons.min.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/plugins/swiper-bundle.min.css') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/plugins/animate.min.css') }}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/plugins/jquery-ui.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/plugins/nice-select.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('guests/css/plugins/magnific-popup.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('guests/css/style.css') }}">

</head>

<body>
    @include('layouts.guest.header')
    @yield('content')
    @include('layouts.guest.footer')
    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
    <!-- Scroll to Top End -->
    @include('layouts.guest.script')
</body>

</html>
