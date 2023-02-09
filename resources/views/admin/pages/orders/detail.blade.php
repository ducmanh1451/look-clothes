@php
    use App\Models\Products;
    use App\Models\Colors;
    use App\Models\Sizes;
@endphp

@extends('admin.admin_template')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/orders/detail.css') }}">
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
                <div class="col-lg-12">
                    <form action="{{ route('update-order') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="left">
                                            <button type="submit" class="btn btn-secondary">Lưu thông tin</button>
                                            <button id="btn-delete" type="button" class="btn btn-danger">Xóa đơn
                                                hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <label for="id">ID</label>
                                        <input id="id" type="text" class="form-control"
                                            value="{{ $order->id }}" disabled>
                                        <input id="id" type="hidden" name="id" value="{{ $order->id }}">
                                    </div>
                                    <div class="col-2">
                                        <label for="user_id">Mã khách hàng</label>
                                        <input id="user_id" type="text" class="form-control"
                                            value="{{ $order->user_id }}" disabled>
                                        <input type="hidden" name="user_id" value="{{ $order->user_id }}">
                                    </div>
                                    <div class="col-9">
                                        <label for="name">Tên khách hàng</label>
                                        <input id="name" name="customer_nm" type="text" class="form-control"
                                            value="{{ $order->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="phone_number">Số điện thoại</label>
                                        <input id="phone_number" name="phone_number" type="text" class="form-control"
                                            value="{{ $order->phone_number }}">
                                    </div>
                                    <div class="col-9">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="text" class="form-control"
                                            value="{{ $order->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="province">Danh sách sản phẩm</label>
                                        <div class="list-products">
                                            @php
                                                $products = json_decode($order->products_json);
                                            @endphp
                                            @foreach ($products as $item)
                                                @php
                                                    $image_string = Products::find($item->id)->image;
                                                    $image_arr = explode(' ', str_replace(',', '', $image_string));
                                                @endphp
                                                <div class="product">
                                                    <img src="{{ asset('images/database/' . $image_arr[0]) }}"
                                                        alt="">
                                                    <p class="product-nm">Tên sản phẩm:
                                                        {{ Products::getProductName($item->id) }}
                                                    </p>
                                                    <p class="size">Size: {{ Sizes::getSizeName($item->size) }}</p>
                                                    <p class="color">Màu sắc: {{ Colors::getColorName($item->color) }}</p>
                                                    <p class="quantity">Số lượng: {{ $item->quantity }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="address">Địa chỉ</label>
                                        <input id="address" name="address" type="text" class="form-control"
                                            value="{{ $order->address }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="province">Tỉnh/Thành</label>
                                        <input id="province" name="province" type="text" class="form-control"
                                            value="{{ $order->province }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="district">Quận/Huyện</label>
                                        <input id="district" name="district" type="text" class="form-control"
                                            value="{{ $order->district }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="ward">Phường/Xã</label>
                                        <input id="ward" name="ward" type="text" class="form-control"
                                            value="{{ $order->ward }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="remark">Ghi chú</label>
                                        <input id="remark" name="remark" type="text" class="form-control"
                                            value="{{ $order->remark }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('asset_footer')
    <script src="{{ asset('js/admin/pages/orders/detail.js') }}"></script>
@endsection
