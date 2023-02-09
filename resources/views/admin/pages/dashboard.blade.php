@extends('admin.admin_template')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/dashboard.css') }}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card" style="background-color: #17a2b8">
                        <div class="card-body">
                            <a class="cart-item" href="{{ route('get-product-view') }}">
                                <p class="card-text">
                                    SẢN PHẨM
                                </p>
                                <i class="fa-solid fa-cart-shopping card-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card" style="background-color: #28a745">
                        <div class="card-body">
                            <a class="cart-item" href="{{ route('get-warehouse-view') }}">
                                <p class="card-text">
                                    KHO HÀNG
                                </p>
                                <i class="fa-solid fa-warehouse card-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card" style="background-color: #ffc107">
                        <div class="card-body">
                            <a class="cart-item" href="{{ route('get-order-view') }}">
                                <p class="card-text">
                                    ĐƠN HÀNG
                                </p>
                                <i class="fa-solid fa-bag-shopping card-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('asset_footer')

@endsection
