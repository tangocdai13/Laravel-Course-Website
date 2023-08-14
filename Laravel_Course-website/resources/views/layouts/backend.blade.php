<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $pageTitle }} - Laravel</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
</head>

<body>

<div class="main-wrapper">
    @include('parts.backend.header')
    @include('parts.backend.sidebar')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @include('parts.backend.page_title')
            @yield('content')
        </div>
    </div>

</div>


<script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/script.js') }}"></script>
</body>

</html>
