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
                    <form action="{{ route('update-warehouse') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="left">
                                            <button type="submit" class="btn btn-secondary">Lưu</button>
                                            {{-- <button id="btn-delete" type="button" class="btn btn-danger">Xóa</button> --}}
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
                                        <input id="product_nm" value="{{ $product['product_nm'] }}" type="text" disabled
                                            class="form-control" name="product_nm">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="color_nm">Màu sắc</label>
                                        <input id="color_nm" value="{{ $product['color_nm'] }}" type="text" disabled
                                            class="form-control" name="color_nm">
                                    </div>
                                    <div class="col-3">
                                        <label for="size_nm">Size</label>
                                        <input id="size_nm" value="{{ $product['size_nm'] }}" type="text" disabled
                                            class="form-control" name="size_nm">
                                    </div>
                                    <div class="col-3">
                                        <label for="quantity">Số lượng</label>
                                        <input id="quantity" value="{{ $product['quantity'] }}" type="text" class="form-control" name="quantity">
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
@endsection
