@extends('user.user_layout')
@section('meta_title', 'Look Store')

@section('asset_header')
    {{-- <link rel="stylesheet" href="{{ asset('css/avc/masters/company/company.css') }}"> --}}
@endsection

@section('banner')
    <div class="banner">
        <div class="container-fluid p-0">
            <img class="mw-100" src="images/banner.jpg" alt="">
        </div>
    </div>
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <div class="title-block">
                        <h2>Sản phẩm mới</h2>
                    </div>
                </div>
            </div>
            <div class="list-products">

            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
    {{-- <script src="{{ asset('js/avc/masters/company/company.js') }}"></script> --}}
@endsection
