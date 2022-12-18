<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('meta_title', 'Look Store')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    {{-- Sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/css/sweetalert2.min.css') }}">
    {{-- Common User --}}
    <link rel="stylesheet" href="{{ asset('css/user/common/common.css') }}">
    @yield('asset_header')
</head>

<body>
    <div id="page">
        <div class="promotion-head">
            <div class="description">
                SALE UP TO 50%
            </div>
        </div>
        {{-- Header --}}
        <header>
            <div class="container-fluid p-0 main-navbar">
                <nav class="navbar navbar-expand-lg navbar-light pt-4 pb-4">
                    <div class="container-fluid">
                        <a class="navbar-brand logo" href="{{ route('products') }}">
                            <img class="img-fluid" src="{{ asset('images/logo.png') }}">
                        </a>
                        <div class="navbar-collapse justify-content-between position-relative">
                            {{-- Default Menu --}}
                            <div class="main-menu">
                                <ul class="navbar-nav">
                                    <li class="level0-item">
                                        <a class="nav-link" aria-current="page" href="{{ route('new-products') }}">Sản phẩm
                                            mới</a>
                                    </li>
                                    <li class="level0-item">
                                        <a class="nav-link" href="{{ route('search-products') }}">Bộ sưu tập</a>
                                        @php
                                            use App\Models\CategoryParents;
                                            use App\Models\Categories;
                                            $categoryParents = CategoryParents::all();
                                        @endphp
                                        <ul class="level1-list p-0">
                                            @foreach ($categoryParents as $categoryParentItem)
                                                <li class="level1-item border-bottom">
                                                    <a class="category-parent"
                                                        category-parent-id="{{ $categoryParentItem->id }}">
                                                        {{ $categoryParentItem->category_parent_nm }}
                                                    </a>
                                                    @php
                                                        $categories = Categories::where('category_parent_id', $categoryParentItem->id)->get();
                                                    @endphp
                                                    <ul class="level2-list p-0">
                                                        @foreach ($categories as $category)
                                                            <li class="level2-item border-bottom">
                                                                <a class="category"
                                                                    category-id="{{ $category->id }}">{{ $category->category_nm }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                            <li class="level1-item border-bottom">
                                                <a class="category-parent">Picked by Look</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="level0-item">
                                        <a class="nav-link" href="{{ route('sale-products') }}">Sale</a>
                                    </li>
                                    <li class="level0-item">
                                        <a class="nav-link" href="/gioi-thieu">Về chúng tôi</a>
                                        <ul class="level1-list p-0">
                                            <li class="level1-item border-bottom">
                                                <a href="/bao-quan-san-pham">Bảo quản</a>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/he-thong-cua-hang">Cửa hàng</a>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/tuyen-dung">Tuyển dụng</a>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/gioi-thieu">Về chúng tôi</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-funcs d-flex align-items-center">
                                <div class="search-box func-item">
                                    <input class="input-search" type="text" id="keyword" name="keyword"
                                        autocomplete="off">
                                    <a class="btn-search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                                <a class="func-item" href="/dang-nhap">Đăng nhập</a>
                                <a class="func-item open-cart-btn" data-bs-toggle="collapse" href="#collapse-cart" role="button">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                            <div id="collapse-cart" class="collapse collapse-cart">
                                {{-- @include('user.pages.cart_shopping') --}}
                            </div>
                            {{-- End Default Menu --}}
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container-fluid p-0 sub-navbar">
                <nav class="navbar navbar-expand-lg navbar-light pt-4 pb-4">
                    <div class="container-fluid">
                        <div class="main-funcs d-flex align-items-center justify-content-between w-100">
                            <a class="func-item" id="btn-open-hidden-box">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                            <a class="navbar-brand logo" href="/">
                                <img class="img-fluid" src="{{ asset('images/logo.png') }}">
                            </a>
                            <a class="func-item open-cart-btn">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        {{-- End Header --}}

        {{-- Banner --}}
        @yield('banner')
        {{-- End Banner --}}

        {{-- Main Content --}}
        @yield('content')
        {{-- End Main Content --}}

        {{-- Hidden Menu --}}
        <div class="hidden-menu d-none">
            <div class="container-fluid p-3 d-flex flex-column">
                <div class="search-box d-flex justify-content-between border-bottom">
                    <a id="btn-search btn-search-hidden" class="icon-box-hidden pr-5">
                        <i class="fa fa-search"></i>
                    </a>
                    <input class="input-search input-search-hidden" type="text" id="keyword" name="keyword"
                        autocomplete="off" placeholder="Gõ từ khóa tìm kiếm">
                    <a id="btn-close-hidden-box" class="icon-box-hidden">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="nav-hidden-item border-bottom">
                    <a class="level0-hidden-item" href="{{ route('new-products') }}">Sản phẩm mới</a>
                </div>
                <div class="nav-hidden-item border-bottom">
                    <a class="level0-hidden-item" href="{{ route('search-products') }}">Bộ sưu tập</a>
                    <a class="nav-hidden-angle-down" data-bs-toggle="collapse" data-bs-target="#collection">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>
                <div class="border-bottom pb-0 collapse" id="collection" style="margin-left: 15px !important">
                    <ul class="navbar-nav navbar-hidden">
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item">Shirts/Top</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item">Pants</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/sweater-p1">Sweater</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/ao-khoac-p1">Coats & Jackets</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/picked-by-look">Picked by Look</a>
                        </li>
                        <li class="nav-hidden-item">
                            <a class="level1-hidden-item" href="/accessories">Accessories</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-hidden-item border-bottom">
                    <a class="level0-hidden-item" href="{{ route('sale-products') }}">Sale</a>
                </div>
                <div class="nav-hidden-item border-bottom">
                    <a class="level0-hidden-item" href="/gioi-thieu">Về chúng tôi</a>
                    <a class="nav-hidden-angle-down" data-bs-toggle="collapse" data-bs-target="#aboutus">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>
                <div class="border-bottom pb-0 collapse" id="aboutus" style="margin-left: 15px !important">
                    <ul class="navbar-nav navbar-hidden">
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/bao-quan-san-pham">Bảo quản</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/he-thong-cua-hang">Cửa hàng</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/tuyen-dung">Tuyển dụng</a>
                        </li>
                        <li class="nav-hidden-item">
                            <a class="level1-hidden-item" href="/gioi-thieu">Về chúng tôi</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-hidden-item pt-4">
                    <a class="level0-hidden-item" href="/dang-nhap">Đăng nhập</a>
                </div>
            </div>
        </div>
        {{-- End Hidden Menu --}}

        {{-- Footer --}}
        <footer>
            <div class="container-fluid">
                <div class="container-extra">
                    <div class="row pt-5">
                        <div class="col-12">
                            <div class="border-top">
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-lg-2 col-md-6 col-xs-12">
                            <ul class="menu-footer">
                                <li>
                                    <a href="#">Chính sách vận chuyển</a>
                                </li>
                                <li>
                                    <a href="#">Chính sách thanh toán</a>
                                </li>
                                <li>
                                    <a href="#">Chính sách hỗ trợ</a>
                                </li>
                                <li>
                                    <a href="#">Hệ thống dịch vụ </a>
                                </li>
                                <li>
                                    <a href="#">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xs-12">
                            <ul class="menu-footer">
                                <li>
                                    <a href="#">Facebook</a>
                                </li>
                                <li>
                                    <a href="#">Instagram</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-12 regis-ministry-menu">
                            <div class="row justify-content-end">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    Theo dõi chúng tôi để nhận thông tin mới
                                </div>
                                <div class="col-lg-4 regis-ministry-img">
                                    <ul class="menu-footer">
                                        <li>
                                            <a href="/">
                                                <img src="{{ asset('images/regis-ministry.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <span>© LOOK 2020. All rights reserved</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- End Footer --}}
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Sweetalert2 --}}
    <script src="{{ asset('plugins/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
    {{-- Common User --}}
    <script src="{{ asset('js/user/common/common.js') }}"></script>
    @yield('asset_footer')
</body>

</html>
