<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Maxmedia">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/maxmedia/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/maxmedia/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/maxmedia/footer.css') }}">
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    @yield('content')
<script type="text/javascript" src="{{ asset('js/admin/jquery1.9.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/maxmedia/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@yield('script')
</body>
</html>