@php
    use App\Models\Categories;
    use App\Models\Colors;
    use App\Models\Sizes;
    $categories = Categories::all();
    $colors = Colors::all();
    $sizes = Sizes::all();
@endphp
<link rel="stylesheet" href="{{ asset('css/admin/pages/products/create.css') }}">
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
            <form action="{{ route('create-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="" for="product_nm">Tên sản phẩm</label>
                            <input id="product_nm" type="text" class="form-control" name="product_nm">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">
                            <label class="" for="category_id">Loại sản phẩm</label>
                            <select name="category_id" id="category_id" class="custom-select">
                                <option value="-1">Chọn loại sản phẩm</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_nm }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="">Màu sắc</label>
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
                        <label class="">Size</label>
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
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-2">
                            <label class="" for="price">Đơn giá</label>
                            <input id="price" type="text" class="form-control" name="price">
                        </div>
                        <div class="col-2">
                            <label for="discount">Giảm giá</label>
                            <input id="discount" type="text" class="form-control" name="discount">
                        </div>
                        <div class="col-4">
                            <label for="">Sản phẩm mới</label>
                            <div class="d-flex align-items-center" style="height: 60%">
                                <div class="form-check mr-4">
                                    <input data-value="1" class="form-check-input is_new_product" type="radio"
                                        id="check-new-product-1" />
                                    <label class="form-check-label" for="check-new-product-1">Có</label>
                                </div>
                                <div class="form-check mr-4">
                                    <input data-value="0" class="form-check-input is_new_product" type="radio"
                                        id="check-new-product-2" />
                                    <label class="form-check-label" for="check-new-product-2">Không</label>
                                </div>
                            </div>
                            <input id="is_new_product_hidden" type="hidden" name="is_new_product">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="" for="image">Ảnh</label>
                            <input id="image" type="file" class="form-control mb-2" name="images[]"
                                multiple />
                            <div class="images-box thumbnail d-none">
                            </div>
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

<script src="{{ asset('js/admin/pages/products/create.js') }}"></script>
