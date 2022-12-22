@php
    use App\Models\Colors;
    use App\Models\Sizes;
@endphp
@extends('user.user_layout')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/user/pages/detail.css') }}">
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="container-extra">
                {{-- Alert --}}
                <div class="alert-box">
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('products') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('search-products') . '?parent-id=' . $product->categories->categoryParents->id }}">
                                {{ $product->categories->categoryParents->category_parent_nm }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('search-products') . '?category-id=' . $product->categories->id }}">{{ $product->categories->category_nm }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->product_nm }}</li>
                    </ol>
                </nav>
                <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <div class="row">
                            @php
                                $image_arr = explode(' ', str_replace(',', '', $product['image']));
                            @endphp
                            <div class="col-lg-2 sub-images-box">
                                <ul class="sub-images">
                                    @foreach ($image_arr as $item)
                                        <li>
                                            <img src="{{ asset('images/data_table/' . $item) }}" alt="">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-8">
                                <ul class="main-images">
                                    @foreach ($image_arr as $item)
                                        <li>
                                            <img src="{{ asset('images/data_table/' . $item) }}" alt="">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <div class="product-info">
                                    <input id="product-id" type="hidden" value="{{ $product['id'] }}">
                                    <h1 id="product-nm" data-name="{{ $product['product_nm'] }}" class="product-name">
                                        {{ $product['product_nm'] }}</h1>
                                    <p class="product-price">
                                        <span class="price price-no-discount"
                                            data-price="{{ $product['price'] }}">{{ $product['price'] }} VND</span>
                                    </p>
                                    <div class="border-bottom"></div>
                                    <div class="form-add-cart">
                                        @php
                                            $color_arr = explode(' ', str_replace(',', '', $product['color']));
                                            $size_arr = explode(' ', str_replace(',', '', $product['size']));
                                        @endphp
                                        <div class="items-option">
                                            <div class="title-item">Màu sắc</div>
                                        </div>
                                        <div class="choose-color-box">
                                            @foreach ($color_arr as $color)
                                                <div class="items-color">
                                                    <div class="color" data-color="{{ $color }}"
                                                        style="background-color: {{ Colors::getColorHexCode($color) }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                            <input id="product-color" type="hidden" name="color">
                                        </div>
                                        <div class="items-option">
                                            <div class="title-item">Size</div>
                                        </div>
                                        <div class="choose-size-box">
                                            @foreach ($size_arr as $size)
                                                <div class="items-size">
                                                    <div class="size" data-size="{{ $size }}">
                                                        {{ Sizes::getSizeName($size) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                            <input id="product-size" type="hidden" name="size">
                                        </div>
                                        <div class="items-option">
                                            <div class="title-item">Số lượng</div>
                                        </div>
                                        <div class="choose-quantity-box">
                                            <div class="items-quantity">
                                                <div class="quantity">
                                                    <span id="product-quantity" name="data-quantity"
                                                        data-quantity="0">0</span>
                                                </div>
                                                <div class="quantity-box-btn">
                                                    <div id="add-quantity-btn" class="add-quantity-btn">
                                                        <i class="fas fa-plus"></i>
                                                    </div>
                                                    <div id="sub-quantity-btn" class="sub-quantity-btn">
                                                        <i class="fas fa-minus"></i>
                                                    </div>
                                                </div>
                                                <div id="total-products-available" style="margin-left: 20px">
                                                </div>
                                            </div>
                                            {{-- <input id="product-quantity" type="hidden" name="quantity"> --}}
                                        </div>
                                    </div>
                                    <div class="border-bottom"></div>
                                    <div class="add-cart-btn">
                                        <a href="">THÊM VÀO GIỎ HÀNG</a>
                                    </div>
                                    <div class="delivery">
                                        <a data-bs-toggle="collapse" href="#collapse-delivery" role="button">
                                            THANH TOÁN / VẬN CHUYỂN
                                        </a>
                                        <div class="collapse mt-3" id="collapse-delivery">
                                            <ul class="p-0">
                                                <li class="mb-1">Giao hàng toàn quốc</li>
                                                <li class="mb-1">Giao hàng trong 3-5 ngày</li>
                                                <li class="mb-1">Giao hàng tiêu chuẩn đồng giá 30.000</li>
                                                <li class="mb-1">Cách thức thanh toán: COD nhận hàng rồi thanh toán</li>
                                                <li class="mb-1">Miễn phí đổi trả sản phẩm trong 7 ngày</li>
                                                <li class="mb-1">Không áp dụng với sản phẩm có giá ưu đãi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
    {{-- <script src="{{ asset('plugins/simple-scroll-follow/simple-scroll-follow.min.js') }}"></script> --}}
    <script src="{{ asset('js/user/pages/detail.js') }}"></script>
@endsection
