<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page_title') | Laravel</title>

        <!-- ✅ Google Font: Poppins -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">

        <!-- ✅ Custom global font and color overrides -->
        <style>
            body,
            .main-header,
            .main-sidebar,
            .content-wrapper,
            h1, h2, h3, h4, h5, h6 {
                font-family: 'Poppins', sans-serif !important;
            }

            h1, h2, h3 {
                color: #d4af37 !important; /* Gold titles */
            }

            .main-header {
                background-color: #000 !important;
                border-bottom: 2px solid #d4af37;
            }

            .main-sidebar {
                background-color: #111 !important;
            }

            .sidebar a {
                color: #d4af37 !important;
            }

            .sidebar a:hover {
                background-color: #222 !important;
                color: #fff !important;
            }

            .nav-sidebar > .nav-item > .nav-link.active {
                background-color: #d4af37 !important;
                color: #000 !important;
            }

            .card-header {
                background-color: #000;
                color: #d4af37;
                border-bottom: 1px solid #d4af37;
            }

            .btn-primary {
                background-color: #000;
                color: #d4af37;
                border: 1px solid #d4af37;
            }

            .btn-primary:hover {
                background-color: #d4af37;
                color: #000;
            }
        </style>

        @stack('styles')
    </head>
    <body class="@yield('page_layout')">
        <!-- Navbar -->
        @yield('page_top_navigation')
        <!-- /.navbar -->

        <!-- Sidebar -->
        @yield('page_side_navigation')

        {{-- Page Content --}}
        @yield('page_content_wrapper')

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        
        @stack('scripts')
    </body>
</html>
