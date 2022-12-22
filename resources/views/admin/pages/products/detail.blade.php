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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3">
                                    <div class="left">
                                        <button type="button" class="btn btn-secondary">Lưu thông tin</button>
                                        <button type="button" class="btn btn-danger">Xóa sản phẩm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            use App\Models\Categories;
                            use App\Models\Colors;
                            use App\Models\Sizes;
                            $categories = Categories::all();
                            $colors = Colors::all();
                            $sizes = Sizes::all();
                        @endphp
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-1">
                                    <label for="id">ID</label>
                                    <input id="id" type="text" class="form-control" readonly>
                                </div>
                                <div class="col-11">
                                    <label for="product_nm">Tên sản phẩm</label>
                                    <input id="product_nm" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3">
                                    <label for="category_id">Loại sản phẩm</label>
                                    <select id="category_id" class="custom-select">
                                        <option value="-1">Chọn loại sản phẩm</option>
                                        @foreach ($categories as $item)
                                            <option @if (Request::get('category-id') == $item->id) selected @endif
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
                                        @foreach ($colors as $item)
                                            <div class="form-check mr-4">
                                                <input class="form-check-input" type="checkbox" value=""
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
                                        @foreach ($sizes as $item)
                                            <div class="form-check mr-4">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="{{ 'size_' . $item->id }}">
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
                                    <input id="title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label for="price">Đơn giá</label>
                                    <input id="price" type="text" class="form-control">
                                </div>
                                <div class="col-2">
                                    <label for="discount">Giảm giá</label>
                                    <input id="discount" type="text" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="">Sản phẩm mới</label>
                                    <div class="d-flex">
                                        <div class="form-check mr-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="check-new-product-1" />
                                            <label class="form-check-label" for="check-new-product-1">Có</label>
                                        </div>
                                        <div class="form-check mr-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="check-new-product-2" checked />
                                            <label class="form-check-label" for="check-new-product-2">Không</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('asset_footer')
    {{-- <script src="{{ asset('js/admin/pages/products/products.js') }}"></script> --}}
@endsection
