<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Admin template for managing sales, payment, invoice, accounts, and expenses with various features.">
    <meta name="keywords" content="admin, bootstrap, business, management, modern, accounts, invoice, responsive, CRM">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Othello - Student Management</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Layout and Other JS -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js"></script>

</head>

<body>

    <div class="main-wrapper">
        @if (!request()->routeIs('login'))
            @include('layouts.topbar')
            @include('layouts.sidebar')
        @endif

        <!-- Main Content -->
        @yield('content')

        @if (!request()->routeIs('login'))
            @include('layouts.theme-settings')
        @endif
    </div>

    @include('layouts.footer')

</body>

</html>
