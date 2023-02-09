@extends('admin.admin_template')
@section('meta_title', $title)

@section('asset_header')
    <link rel="stylesheet" href="{{ asset('css/admin/pages/orders/index.css') }}">
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
                        <div class="card-body">
                            <div class="table-div">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px" scope="col">ID</th>
                                            <th style="width: 200px" scope="col">Tên khách hàng</th>
                                            <th style="width: 200px" scope="col">Số điện thoại</th>
                                            <th style="width: 200px" scope="col">Email</th>
                                            <th style="width: 150px" scope="col">Địa chỉ</th>
                                            <th style="width: 150px" scope="col">Tỉnh/Thành</th>
                                            <th style="width: 150px" scope="col">Quận/Huyện</th>
                                            <th style="width: 150px" scope="col">Phường/Xã</th>
                                            <th style="width: 250px" scope="col">Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <th scope="row">
                                                    <a href="{{ route('find-order-by-id', $item->id) }}">
                                                        {{ $item->id }}
                                                    </a>
                                                </th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->phone_number }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->province }}</td>
                                                <td>{{ $item->district }}</td>
                                                <td>{{ $item->ward }}</td>
                                                <td>{{ $item->remarks }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $orders->previousPageUrl() }}"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    @foreach ($orders->links()->elements[0] as $key => $item)
                                        <li class="page-item">
                                            @if ($key == $orders->currentPage())
                                                <a class="page-link page-link-selected"
                                                    href="{{ $item }}">{{ $key }}</a>
                                            @else
                                                <a class="page-link" href="{{ $item }}">{{ $key }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                    <li class="page-item"><a class="page-link" href="{{ $orders->nextPageUrl() }}"><i
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
    {{-- <script src="{{ asset('js/admin/pages/warehouse/warehouse.js') }}"></script> --}}
    {{-- @include('admin.pages.warehouse.create') --}}
@endsection
