<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link id="pagestyle" href="{{ asset('frontend/css/material-dashboard.css?v=3.0.2')}}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/nucleo-svg.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link href="{{ asset('admin/css/material-dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
</head>
<body>

            <div class="wrapper">
                        @include('layouts.inc.sidebar')


            <div class="main-panel">
                         @include('layouts.inc.adminnav')


            <div class="content">
                         @yield('content')
            </div>
                        @include('layouts.inc.adminfooter')
            </div>
            </div>
<!-- Scripts -->
<script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
<script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>
<script src="{{ asset('admin/js/chartjs.min.js') }}" defer></script>


@yield('script')
</body>
</html>
