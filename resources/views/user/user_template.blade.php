<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    {{-- Common User --}}
    <link rel="stylesheet" href="css/user/common/common.css">
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
            {{-- Main Navbar --}}
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3 main-navbar">
                    <div class="container-fluid">
                        <a class="navbar-brand logo" href="#">
                            <img class="img-fluid" src="images/logo.png">
                        </a>
                        <div class="navbar-collapse justify-content-between">
                            <div class="main-menu">
                                <ul class="navbar-nav">
                                    <li class="nav-item level0-item">
                                        <a class="nav-link" aria-current="page" href="#">Sản phẩm mới</a>
                                    </li>
                                    <li class="nav-item level0-item">
                                        <a class="nav-link" href="#">Bộ sưu tập</a>
                                    </li>

                                    <li class="nav-item level0-item">
                                        <a class="nav-link" href="#">Sale</a>
                                    </li>
                                    <li class="nav-item level0-item">
                                        <a class="nav-link" href="#">Về chúng tôi</a>
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
                                <a class="func-item" href="#">Đăng nhập</a>
                                <a class="func-item" href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            {{-- Sub Navbar --}}
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3 sub-navbar">
                    <div class="container-fluid">
                        <div class="navbar-collapse justify-content-between">
                            <div class="main-funcs d-flex align-items-center justify-content-between">
                                <a class="func-item" href="#" id="open-btn">
                                    <i class="fa-solid fa-bars"></i>
                                </a>
                                <a class="navbar-brand logo" href="#">
                                    <img class="img-fluid" src="images/logo.png">
                                </a>
                                <a class="func-item" href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        {{-- End Header --}}

        <div class="hidden-menu d-none">
            <div class="container-fluid p-3 d-flex flex-column">
                <div class="hidden-box-search">
                    <form id="form-search" class="form-search" name="form-search" method="post">
                        <input class="input-search" type="text" id="keyword" name="keyword" autocomplete="off">
                        <a class="btn-search">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </div>
                <div class="hidden-box-search">
                    DEF
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- Common User --}}
    <script src="js/user/common/common.js"></script>
</body>

</html>
