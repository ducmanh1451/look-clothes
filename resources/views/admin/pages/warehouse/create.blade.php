@php
    use App\Models\Categories;
    use App\Models\Colors;
    use App\Models\Sizes;
    $categories = Categories::all();
    $colors = Colors::all();
    $sizes = Sizes::all();
@endphp
{{-- <link rel="stylesheet" href="{{ asset('css/admin/pages/products/create.css') }}"> --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- Form --}}
            <form action="{{ route('create-warehouse') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-2">
                            <label for="product_id">Mã sản phẩm</label>
                            <input id="product_id" type="text" class="form-control" name="product_id">
                        </div>
                        <div class="col-10">
                            <label for="product_nm">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_nm">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="color">Màu sắc</label>
                            <div class="d-flex">
                                @foreach ($colors as $item)
                                    <div class="form-check mr-4">
                                        <input class="form-check-input color" type="checkbox"
                                            value="{{ $item->id }}" id="{{ 'color_' . $item->id }}">
                                        <label class="form-check-label" for="{{ 'color_' . $item->id }}">
                                            {{ $item->color_nm }}
                                        </label>
                                    </div>
                                @endforeach
                                <input id="color_hidden" type="hidden" name="color">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label>Size</label>
                            <div class="d-flex">
                                @foreach ($sizes as $item)
                                    <div class="form-check mr-4">
                                        <input class="form-check-input size" type="checkbox" value="{{ $item->id }}"
                                            id="{{ 'size_' . $item->id }}">
                                        <label class="form-check-label" for="{{ 'size_' . $item->id }}">
                                            {{ $item->size_nm }}
                                        </label>
                                    </div>
                                @endforeach
                                <input id="size_hidden" type="hidden" name="size">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="quantity">Số lượng</label>
                            <input type="text" class="form-control" name="quantity" id="quantity">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/admin/pages/warehouse/create.js') }}"></script>
