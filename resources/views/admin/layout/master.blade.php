<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/morris/morris.css') }}">
    <link href="{{ asset('assets/backend/plugins/metro/MetroJs.min.css') }}" rel="stylesheet" >

    <!-- App css -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet" type="text/css" />
    @stack('css')
</head>
<body>
    
    @include('admin.layout.partials.topbar')

<!-- Page Content-->
<div class="wrapper">
    @yield('content')
</div>
    <!-- jQuery  -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.slimscroll.min.js') }}"></script>

    <!--Plugins-->
    <script src="{{ asset('assets/backend/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/metro/MetroJs.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>  
    <script src="{{ asset('assets/backend/pages/jquery.dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>

    @stack('js')
</body>
</html>
