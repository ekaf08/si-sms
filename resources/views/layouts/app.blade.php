<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !empty($header_title) ? $header_title . '-' : '' }} School</title>

    <!-- Google Font: Popins -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        .row label {
            font-weight: 500 !important;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('/asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/asset/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/asset/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/asset/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/asset/plugins/summernote/summernote-bs4.min.css') }}">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @includeIf('layouts.navbar')

        @includeIf('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @section('breadcrumb')
                                    @php
                                        $currenturl = Request::url(); //digunakan untuk mengambil url yang saat ini aktif
                                    @endphp
                                    @if (Auth::user()->user_type == 1 && $currenturl != url('admin/dashboard'))
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Home</a></li>
                                    @elseif(Auth::user()->user_type == 2 && $currenturl != url('student/dashboard'))
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard.student') }}">Home</a>
                                        </li>
                                    @elseif(Auth::user()->user_type == 3 && $currenturl != url('teacher/dashboard'))
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard.teacher') }}">Home</a>
                                        </li>
                                    @elseif(Auth::user()->user_type == 4 && $currenturl != url('parent/dashboard'))
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard.parent') }}">Home</a></li>
                                    @endif
                                @show
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @includeIf('layouts.main')
        </div>
        <!-- /.content-wrapper -->
        @includeIf('layouts.footer')

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/asset/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/asset/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('/asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="{{ asset('/asset/plugins/tempusdominus-bootstrap-4/js/') }}tempusdominus-bootstrap-4.min.js"></script> --}}
    <!-- Summernote -->
    <script src="{{ asset('/asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/asset/dist/js/adminlte.js') }}"></script>

    @yield('script')
    @stack('custom_script')
</body>

</html>
