@extends('user.user_layout')
@section('meta_title', 'Sản phẩm')

@section('asset_header')
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="container-extra">
                <h1 class="error-title">
                    KHÔNG TÌM THẤY SẢN PHẨM!
                </h1>
            </div>
        </div>
    </main>
@endsection

@section('asset_footer')
@endsection

<style>
    main {
        height: calc(100% - 379px) !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    .error-title {
        margin: 0;
        color: #999999;
        display: flex;
        justify-content: center;
    }
</style>
