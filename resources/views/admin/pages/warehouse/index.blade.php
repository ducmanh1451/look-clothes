@extends('admin.admin_template')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/warehouse/index.css') }}">
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
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Thêm sản phẩm
                                        </button>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="right d-flex justify-content-end">
                                        <div class="col-3 d-flex justify-content-end">
                                            <button id="search-btn" type="button" class="btn btn-secondary">Lọc sản
                                                phẩm</button>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <input @if(Request::get('product_nm')) value="{{ Request::get('product_nm') }}" @endif type="text" name="product_nm" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-div">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Mã màu</th>
                                            <th scope="col">Tên màu</th>
                                            <th scope="col">Mã size</th>
                                            <th scope="col">Tên size</th>
                                            <th scope="col">Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <th scope="row">
                                                    <a href="{{ route('find-product-by-id', $item->id) }}">
                                                        {{ $item->id }}
                                                    </a>
                                                </th>
                                                <td>{{ $item->product_id }}</td>
                                                <td>{{ $item->product_nm }}</td>
                                                <td>{{ $item->color_id }}</td>
                                                <td>{{ $item->color_nm }}</td>
                                                <td>{{ $item->size_id }}</td>
                                                <td>{{ $item->size_nm }}</td>
                                                <td>{{ $item->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
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
        </div>
    </div>
@endsection

@section('asset_footer')
    <script src="{{ asset('js/admin/pages/warehouse/warehouse.js') }}"></script>
    @include('admin.pages.warehouse.create')
@endsection
