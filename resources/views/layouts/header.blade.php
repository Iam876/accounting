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

    <!-- Twitter Meta Tags (if needed) -->
    <!--
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dreamstechnologies">
    <meta name="twitter:title" content="Finance & Accounting Admin Website Templates | othello">
    <meta name="twitter:description" content="othello is a Sales, Invoices & Accounts Admin template for accountants or companies with various features.">
    <meta name="twitter:image" content="{{ asset('assets/img/othello.jpg') }}">
    -->

    <!-- Facebook Meta Tags (if needed) -->
    <!--
    <meta property="og:url" content="https://othello.dreamstechnologies.com/">
    <meta property="og:title" content="Finance & Accounting Admin Website Templates | othello">
    <meta property="og:description" content="othello is a Sales, Invoices & Accounts Admin template for accountants or companies with various features.">
    <meta property="og:image" content="{{ asset('assets/img/othello.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/img/othello.jpg') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    -->

    <title>Othello - Bootstrap Admin HTML Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">

    <!-- Toatr CSS -->
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/toatr.css')}}"> --}}
    
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/lightbox/glightbox.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/jquery-3.7.1.min') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
