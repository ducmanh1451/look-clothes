@php
    use App\Models\Categories;
    use App\Models\Colors;
    use App\Models\Sizes;
    $categories = Categories::all();
    $colors = Colors::all();
    $sizes = Sizes::all();
@endphp

@extends('admin.admin_template')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/products/detail.css') }}">
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
                    <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="left">
                                            <button type="submit" class="btn btn-secondary">Lưu thông tin</button>
                                            <button type="button" class="btn btn-danger">Xóa sản phẩm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <label for="id">ID</label>
                                        <input id="id" type="text" value="{{ $product['id'] }}"
                                            class="form-control" name="id" readonly>
                                    </div>
                                    <div class="col-11">
                                        <label for="product_nm">Tên sản phẩm</label>
                                        <input id="product_nm" value="{{ $product['product_nm'] }}" type="text"
                                            class="form-control" name="product_nm">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="category_id">Loại sản phẩm</label>
                                        <select id="category_id" class="custom-select">
                                            <option value="-1">Chọn loại sản phẩm</option>
                                            @foreach ($categories as $item)
                                                <option @if ($product['category_id'] == $item->id) selected @endif
                                                    value="{{ $item->id }}">{{ $item->category_nm }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label>Màu sắc</label>
                                        <div class="d-flex">
                                            @php
                                                $color_arr = explode(' ', str_replace(',', '', $product['color']));
                                            @endphp
                                            @foreach ($colors as $item)
                                                <div class="form-check mr-4">
                                                    <input @if (in_array($item->id, $color_arr)) checked @endif
                                                        class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                        id="{{ 'color_' . $item->id }}">
                                                    <label class="form-check-label" for="{{ 'color_' . $item->id }}">
                                                        {{ $item->color_nm }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label>Size</label>
                                        <div class="d-flex">
                                            @php
                                                $size_arr = explode(' ', str_replace(',', '', $product['size']));
                                            @endphp
                                            @foreach ($sizes as $item)
                                                <div class="form-check mr-4">
                                                    <input @if (in_array($item->id, $size_arr)) checked @endif
                                                        class="form-check-input" type="checkbox"
                                                        value="{{ $item->id }}" id="{{ 'size_' . $item->id }}">
                                                    <label class="form-check-label" for="{{ 'size_' . $item->id }}">
                                                        {{ $item->size_nm }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="title">Title</label>
                                        <input id="title" value="{{ $product['title'] }}" type="text"
                                            class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <label for="price">Đơn giá</label>
                                        <input id="price" value="{{ $product['price'] }}" type="text"
                                            class="form-control" name="price">
                                    </div>
                                    <div class="col-2">
                                        <label for="discount">Giảm giá</label>
                                        <input id="discount" value="{{ $product['discount'] }}" type="text"
                                            class="form-control" name="discount">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Sản phẩm mới</label>
                                        <div class="d-flex align-items-center" style="height: 60%">
                                            <div class="form-check mr-4">
                                                <input @if ($product['is_new_product'] == 1) checked @endif
                                                    class="form-check-input" type="radio" id="check-new-product-1" />
                                                <label class="form-check-label" for="check-new-product-1">Có</label>
                                            </div>
                                            <div class="form-check mr-4">
                                                <input @if ($product['is_new_product'] == 0) checked @endif
                                                    class="form-check-input" type="radio" id="check-new-product-2" />
                                                <label class="form-check-label" for="check-new-product-2">Không</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $image_arr = explode(' ', str_replace(',', '', $product['image']));
                                @endphp
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="image">Ảnh</label>
                                        <input id="image" type="file" class="form-control" name="images[]"
                                            multiple />
                                    </div>
                                    <div class="col-12">
                                        <div class="images">
                                            <div class="row w-100">
                                                @foreach ($image_arr as $image)
                                                    <div class="item col-3">
                                                        <div class="delete-img-btn">
                                                            <i class="fas fa-times"></i>
                                                        </div>
                                                        <img class="w-100"
                                                            src="{{ asset('images/database/' . $image) }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
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
    <script src="{{ asset('js/admin/pages/products/detail.js') }}"></script>
@endsection
