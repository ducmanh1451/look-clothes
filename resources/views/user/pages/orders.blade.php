@php
    use App\Models\Colors;
    use App\Models\Sizes;
    use App\Models\Products;
    use Illuminate\Support\Facades\Cache;
@endphp
@extends('user.user_layout')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/pages/orders.css') }}">
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="container-extra">
                <div class="row">
                    <div class="col-12">
                        <div class="title-block">
                            <h2>{{ $title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="row mt-3">
                            <div class="col-12">
                                <h3>Thông tin vận chuyển</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-12 mb-3">
                                <input class="bs-input" type="text" name="name" placeholder="Họ tên">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input class="bs-input" type="text" name="phone_number" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input class="bs-input" type="text" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input class="bs-input" type="text" name="address"
                                    placeholder="Địa chỉ (Ví dụ: 103 Vạn Phúc, Phường Vạn Phúc)">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 col-12 mb-3">
                                <select class="js-example-basic-single" name="province">
                                    <option value="-1">Chọn Tỉnh/Thành</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <select class="js-example-basic-single" name="district">
                                    <option value="-1">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <select class="js-example-basic-single" name="ward">
                                    <option value="-1">Chọn Phường/Xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input class="bs-input" type="text" name="remark"
                                    placeholder="Ghi chú thêm (Ví dụ: Giao hàng giờ hành chính)">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <button id="confirm-btn" class="bs-button">
                                    Xác nhận
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        @php
                            $check_cart_empty = empty(Cache::get('cart_shopping'));
                        @endphp
                        @if ($check_cart_empty == false)
                            <div class="cart-items mt-5" style="overflow: unset; max-height: unset">
                                @foreach ($products as $key => $item)
                                    @php
                                        $product = Products::find($item['id']);
                                        $image_arr = explode(' ', str_replace(',', '', $product['image']));
                                    @endphp
                                    <div class="row item list-item" index="{{ $key }}">
                                        <input class="product-id" value="{{ $item['id'] }}" type="hidden" name="id">
                                        <input class="size" value="{{ $item['size'] }}" type="hidden" name="size">
                                        <input class="color" value="{{ $item['color'] }}" type="hidden" name="color">
                                        <input class="quantity" value="{{ $item['quantity'] }}" type="hidden"
                                            name="quantity">
                                        <div class="col-sm-3 col-12 pl-0">
                                            <img src="{{ asset('images/data_table/' . $image_arr[0]) }}" alt="">
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="item-info">
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ $item['product_nm'] }}</span>
                                                    <i class="fas fa-times close-icon"></i>
                                                </div>
                                                <div class="d-flex mt-4 row">
                                                    <div class="col-4">
                                                        <span>Size</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>{{ Sizes::getSizeName($item['size']) }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4 row">
                                                    <div class="col-4">
                                                        <span>Màu sắc</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>{{ Colors::getColorName($item['color']) }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4 row">
                                                    <div class="col-4">
                                                        <span>Số lượng</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>{{ $item['quantity'] }}</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>{{ $item['money'] }} VND</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="total">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="border-top"></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <h5 style="font-size: 13px">TỔNG HÓA ĐƠN</h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="total-money">
                                            {{ $total_price }} VND
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row mt-5">
                                <p>Giỏ hàng đang trống!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/user/pages/orders.js') }}"></script>
@endsection
