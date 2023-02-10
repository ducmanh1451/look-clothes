@php
    use App\Models\Colors;
@endphp
@extends('user.user_layout')
@section('meta_title', $title)

@section('asset_header')
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
                <div class="list-products row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 list-item" product_id="{{ $product['id'] }}">
                            <a href="" class="p-image" title="{{ $product['title'] }}">
                                @php
                                    $image_arr = explode(' ', str_replace(',', '', $product['image']));
                                @endphp
                                <img src="{{ asset('images/database/' . $image_arr[0]) }}" alt=""
                                    class="img-fluid">
                            </a>
                            <h3 class="p-name">
                                <a href="{{ route('detail-products', $product['id']) }}" title="{{ $product['title'] }}"
                                    class="name">{{ $product['product_nm'] }}</a>
                                @if ($product['is_new_product'] == 1) 
                                <img style="width: 20px; height: 20px" src="{{ asset('images/system/new-product.png')}}" alt="">
                                @endif
                            </h3>
                            @if ($product['discount'] != 0)
                            <p class="p-price">{{ $product['price'] }} VND
                                <span style="color: red">SALE {{ $product['discount']*100 }}%</span>
                            </p>
                            @else
                            <p class="p-price">{{ $product['price'] }} VND</p>
                            @endif
                            <p class="p-box-color">
                                @php
                                    $color_arr = explode(' ', str_replace(',', '', $product['color']));
                                    $title = $product['title'];
                                @endphp
                                @foreach ($color_arr as $color_item)
                                    <a class="p-color" href="" title="{{ $title }}"
                                        style="background:  {{ Colors::getColorHexCode($color_item) }};"></a>
                                @endforeach
                            </p>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}"><i
                                            class="fas fa-chevron-left"></i></a>
                                </li>
                                @foreach ($products->links()->elements[0] as $key => $item)
                                    <li class="page-item">
                                        @if ($key == $products->currentPage())
                                            <a class="page-link page-link-selected"
                                                href="{{ $item }}">{{ $key }}</a>
                                        @else
                                            <a class="page-link" href="{{ $item }}">{{ $key }}</a>
                                        @endif
                                    </li>
                                @endforeach
                                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}"><i
                                            class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
@endsection
