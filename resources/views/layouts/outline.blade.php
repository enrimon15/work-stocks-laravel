<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Work Stocks')</title>

    <!-- All Plugins Css -->
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <!-- Custom Color -->
    <link href="{{asset('css/skin/default.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body class="green-skin">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="Loader"></div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- include here the header -->
    @include('navbar.nav')

    <!-- yields here the main content page -->
    @yield('content')

    <!-- include here the footer -->
    @include('footer.footer')
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/isotope.min.js')}}"></script>
<script src="{{asset('js/summernote.js')}}"></script>
<script src="{{asset('js/jQuery.style.switcher.js')}}"></script>
<script src="{{asset('js/counterup.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>
</html>