<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('meta_title', 'Look Store')</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    {{-- Common User --}}
    <link rel="stylesheet" href="css/user/common/common.css">
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
                        <a class="navbar-brand logo" href="/">
                            <img class="img-fluid" src="images/logo.png">
                        </a>
                        <div class="navbar-collapse justify-content-between">
                            {{-- Default Menu --}}
                            <div class="main-menu">
                                <ul class="navbar-nav">
                                    <li class="level0-item">
                                        <a class="nav-link" aria-current="page" href="/san-pham">Sản phẩm mới</a>
                                    </li>
                                    <li class="level0-item">
                                        <a class="nav-link" href="/san-pham">Bộ sưu tập</a>
                                        <ul class="level1-list p-0">
                                            <li class="level1-item border-bottom">
                                                <a href="/ao-so-mi-p1">Shirts/Top</a>
                                                <ul class="level2-list p-0">
                                                    <li class="level2-item border-bottom">
                                                        <a href="/ao-phong">T-shirts</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/ao-so-mi-p2">Shirts</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/ao-polo">Polo Shirts</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/quan-p1">Pants</a>
                                                <ul class="level2-list p-0">
                                                    <li class="level2-item border-bottom">
                                                        <a href="/quan-short">Shorts</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/quan-p2">Pants</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/quan-jean">Jeans</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/sweater-p1">Sweater</a>
                                                <ul class="level2-list p-0">
                                                    <li class="level2-item border-bottom">
                                                        <a href="/hoodie">Hoodie</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/sweater-p2">Sweater</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/ao-khoac-p1">Coats & Jackets</a>
                                                <ul class="level2-list p-0">
                                                    <li class="level2-item border-bottom">
                                                        <a href="/ao-khoac-gio">Windbreaker</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/ao-khoac-p2">Jackets</a>
                                                    </li>
                                                    <li class="level2-item border-bottom">
                                                        <a href="/ao-khoac-ngoai">Coats</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/picked-by-look">Picked by Look</a>
                                            </li>
                                            <li class="level1-item border-bottom">
                                                <a href="/accessories">Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="level0-item">
                                        <a class="nav-link" href="/san-pham-sale">Sale</a>
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
                                    <form id="form-search" class="form-search" name="form-search" method="post">
                                        <input class="input-search" type="text" id="keyword" name="keyword"
                                            autocomplete="off">
                                        <a class="btn-search">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </form>
                                </div>
                                <a class="func-item" href="/dang-nhap">Đăng nhập</a>
                                <a class="func-item">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
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
                                <img class="img-fluid" src="images/logo.png">
                            </a>
                            <a class="func-item">
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
                <div class="hidden-box-search d-flex justify-content-between border-bottom">
                    <form id="form-search-hidden" class="form-search-hidden d-flex" name="form-search-hidden"
                        method="post">
                        <a id="btn-search-hidden" class="icon-box-hidden pr-5">
                            <i class="fa fa-search"></i>
                        </a>
                        <input class="input-search-hidden" type="text" id="keyword" name="keyword"
                            autocomplete="off" placeholder="Gõ từ khóa tìm kiếm">
                    </form>
                    <a id="btn-close-hidden-box" class="icon-box-hidden">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="nav-hidden-item border-bottom">
                    <a class="level0-hidden-item" href="/san-pham">Sản phẩm mới</a>
                </div>
                <div class="nav-hidden-item border-bottom">
                    <a class="level0-hidden-item" href="/san-pham">Bộ sưu tập</a>
                    <a class="nav-hidden-angle-down" data-bs-toggle="collapse" data-bs-target="#collection">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>
                <div class="border-bottom pb-0 collapse" id="collection" style="margin-left: 15px !important">
                    <ul class="navbar-nav navbar-hidden">
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/ao-so-mi-p1">Shirts/Top</a>
                        </li>
                        <li class="nav-hidden-item border-bottom">
                            <a class="level1-hidden-item" href="/quan-p1">Pants</a>
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
                    <a class="level0-hidden-item" href="/san-pham-sale">Sale</a>
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
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- Common User --}}
    <script src="js/user/common/common.js"></script>
    @yield('asset_footer')
</body>

</html>
