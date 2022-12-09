@extends('user.user_layout')
@section('meta_title', $title)

@section('asset_header')
<link rel="stylesheet" href="{{ asset('css/user/pages/detail.css') }}">
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="container-extra">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('products') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('search-products') . '?parent_id=' . $product->categories->categoryParents->id }}">
                                {{ $product->categories->categoryParents->category_parent_nm }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('search-products') . '?category_id=' . $product->categories->id }}">{{ $product->categories->category_nm }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->product_nm }}</li>
                    </ol>
                </nav>
                <div class="row mt-4 box-images">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <ul class="sub-images">
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-8">
                                <ul class="main-images">
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/data_table/10.jpg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        RIGHT DETAIL
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
<script src="{{ asset('js/user/pages/detail.js') }}"></script>
@endsection

