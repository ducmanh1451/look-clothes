@php
    use App\Models\Products;
    use App\Models\Colors;
    use App\Models\Sizes;
@endphp
@extends('user.user_layout')
@section('meta_title', $title)

@section('asset_header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection__rendered {
            line-height: 40px !important;
            text-indent: 10px !important
        }

        .select2-container .select2-selection--single {
            height: 40px !important;
            border-radius: 16px !important;
            border-color: #d9d9d9 !important;
        }

        .select2-dropdown--above,
        .select2-dropdown--below {
            border: 1px solid #d9d9d9 !important;
        }

        .select2-selection__arrow {
            height: 40px !important;
        }
    </style>
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
                    <div class="col-7">
                        <div class="row mt-3">
                            <div class="col-12">
                                <h3>Thông tin vận chuyển</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <input class="bs-input" type="text" name="" placeholder="Họ tên">
                            </div>
                            <div class="col-6">
                                <input class="bs-input" type="text" name="" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input class="bs-input" type="text" name="" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input class="bs-input" type="text" name="" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <select class="js-example-basic-single w-100" name="province">
                                    <option value="-1">Chọn Tỉnh/Thành</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="js-example-basic-single w-100" name="district">
                                    <option value="-1">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="js-example-basic-single w-100" name="ward">
                                    <option value="-1">Chọn Phường/Xã</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="cart-items" style="overflow: unset; max-height: unset">
                            @foreach ($products as $key => $item)
                                <div class="row item" index="{{ $key }}">
                                    <div class="col-3 pl-0">
                                        <img src="http://127.0.0.1:8000/images/data_table/10.jpg" alt="">
                                    </div>
                                    <div class="col-9">
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
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
