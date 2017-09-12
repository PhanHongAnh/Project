<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <title>Retaurant</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="{{asset('css/ie7.css')}}">
    <![endif]-->
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="{{asset('css/ie6.css')}}">
    <![endif]-->
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">

    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="/public/js/jquery-3.2.1.min.js"></script>--}}
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</head>
<body>
@yield('content')
<div id="footer" class="container"> <!-- start of footer -->
    <div>
        <ul class="navigation">
            <li><a href="http://localhost:8000/trangchu">Home</a></li>
            <li><a href="http://localhost:8000/booking">Booking</a></li>
            <li><a href="http://localhost:8000/blog">Blog</a></li>
            <li><a href="http://localhost:8000/about">About</a></li>
            <li class="last"><a href="http://localhost:8000/contact">Contact</a></li>
        </ul>
        <span>&copy; Thế giới quả là rộng lớn và còn có rất nhiều việc phải làm.</span>
    </div>
</div>
@yield('script')
</body>