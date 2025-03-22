<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/') }}assets/img/favicon.ico" sizes="any" type="image/x-icon">

    {{-- my css file include --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
    <title> Ajax Laravel jQurey </title>
</head>
<body>
{{--<div id="loader">--}}
{{--    <img src="{{ asset('/') }}assets/img/preloader.gif" alt="">--}}
{{--</div>--}}
<main id="content">
    @yield('content')
</main>

{{-- my js file include --}}
<script src="{{ asset('/') }}assets/js/jquery-3.7.1.min.js"></script>
{{--<script src="{{ asset('/') }}assets/js/script.js"></script>--}}
<script src="{{ asset('/') }}assets/js/all.min.js"></script>
<script src="{{ asset('/') }}assets/js/bootstrap.bundle.js"></script>
<script src="{{ asset('/') }}assets/js/bootbox.min.js"></script>
@yield('script')
</body>
</html>
