@php
    use App\Models\Products;
    use App\Models\Colors;
    use App\Models\Sizes;
@endphp
@if ($cart_data)
    <div class="container-extra">
        <div class="row mt-3">
            <p>GIỎ HÀNG</p>
            <div class="cart-items">
                @foreach ($cart_data as $key => $item)
                    @php
                        $product = Products::find($item['id']);
                        $image_arr = explode(' ', str_replace(',', '', $product['image']));
                    @endphp
                    <div class="row item" index="{{ $key }}">
                        <div class="col-3 pl-0">
                            <img src="{{ asset('images/data_table/' . $image_arr[0]) }}" alt="">
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
                            {{$total_price}} VND
                        </div>
                    </div>
                </div>
            </div>
            <div class="go-to-cart mb-4">
                <a href="{{ route('orders') }}">ĐI TỚI GIỎ HÀNG</a>
            </div>
        </div>
    </div>
@else
    <div class="container-extra">
        <div class="row mt-3">
            <p>Giỏ hàng đang trống !</p>
        </div>
    </div>
@endif
