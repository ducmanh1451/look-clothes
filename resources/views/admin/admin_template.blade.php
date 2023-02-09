<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>AdminLTE 3 | Starter</title> --}}
    <title>@yield('meta_title', 'AdminLTE')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    {{-- Sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/css/sweetalert2.min.css') }}">
    {{-- Common Admin --}}
    <link rel="stylesheet" href="{{ asset('css/admin/common/common.css') }}">
    @yield('asset_header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="logout-btn" class="nav-link" type="button">
                        <i class="fas fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('get-dashboard-view') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-home"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('get-product-view') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-cart-shopping"></i>
                                <p>
                                    Sản phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('get-warehouse-view') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-warehouse"></i>
                                <p>
                                    Kho hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('get-order-view') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-bag-shopping"></i>
                                <p>
                                    Đơn hàng
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('get-customer-view') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Khách hàng
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <footer class="main-footer">
            <strong>Copyright &copy; by manhnd.</strong> All rights
            reserved.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    {{-- Sweetalert2 --}}
    <script src="{{ asset('plugins/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
    {{-- Common Admin --}}
    <script src="{{ asset('js/admin/common/common.js') }}"></script>
    @yield('asset_footer')
</body>

</html>
