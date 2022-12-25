@extends('admin.admin_template')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/products/index.css') }}">
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
                                        <button type="button" class="btn btn-secondary">Thêm sản phẩm</button>
                                    </div>
                                </div>
                                @php
                                    use App\Models\Categories;
                                    $categories = Categories::all();
                                @endphp
                                <div class="col-9">
                                    <div class="right d-flex justify-content-end">
                                        <div class="col-3 d-flex justify-content-end">
                                            <button id="search-btn" type="button" class="btn btn-secondary">Lọc sản
                                                phẩm</button>
                                        </div>
                                        <div class="col-4">
                                            <select id="categories" class="custom-select">
                                                <option value="-1">Chọn loại sản phẩm</option>
                                                @foreach ($categories as $item)
                                                    <option @if (Request::get('category-id') == $item->id) selected @endif
                                                        value="{{ $item->id }}">{{ $item->category_nm }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            <th class="w-50px" scope="col">ID</th>
                                            <th class="w-200px" scope="col">Product Name</th>
                                            <th class="w-50px" scope="col">Category ID</th>
                                            <th class="w-200px" scope="col">Title</th>
                                            <th class="w-100px" scope="col">Price</th>
                                            <th class="w-100px" scope="col">Color</th>
                                            <th class="w-100px" scope="col">Size</th>
                                            <th class="w-100px" scope="col">Is New Product</th>
                                            <th class="w-300px" scope="col">Images</th>
                                            <th class="w-50px" scope="col">Discount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <th scope="row">
                                                    <a href="{{ route('get-product-by-id', $item->id) }}">
                                                        {{ $item->id }}
                                                    </a>
                                                </th>
                                                <td>{{ $item->product_nm }}</td>
                                                <td>{{ $item->category_id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->color }}</td>
                                                <td>{{ $item->size }}</td>
                                                <td>{{ $item->is_new_product }}</td>
                                                <td>
                                                    <div class="images-box">
                                                        @php
                                                            $image_arr = explode(' ', str_replace(',', '', $item['image']));
                                                        @endphp
                                                        @foreach ($image_arr as $image)
                                                            <img src="{{ asset('images/database/' . $image) }}"
                                                                alt="">
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td>{{ $item->discount }}</td>
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
    <script src="{{ asset('js/admin/pages/products/products.js') }}"></script>
@endsection
