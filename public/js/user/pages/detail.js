$(document).ready(function () {
    try {
        initializeDetail();
        initEventsDetail();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeDetail() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsDetail() {
    try {
        // click add cart btn
        $(document).on('click', '.add-cart-btn', function(e) {
            e.preventDefault();
            var obj = {};
            obj['id'] = $('#product-id').val();
            obj['product_nm'] = $('#product-nm').attr('data-name');
            obj['color'] = $('#product-color').val();
            obj['size'] = $('#product-size').val();
            obj['quantity'] = Number($('[name="data-quantity"]').attr('data-quantity'));
            obj['money'] = Number($('.price').attr('data-price')) * Number(obj['quantity']);
            $.ajax({
                type: "POST",
                url: "/add-cart-shopping",
                data: obj,
                dataType: "json",
                success: function (response) {
                    if (response['status'] == 201) {
                        Swal.fire({
                            icon: 'success',
                            title: `${response['message']}`,
                            confirmButtonText: 'Đóng',
                          }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            } 
                        });
                    }
                },
                error: function (response) {
                    var check_empty = jQuery.isEmptyObject(response.responseJSON.errors);
                    if (check_empty == false) {
                        $('.alert-box').append(
                            `<div class="alert alert-warning alert-dismissible" role="alert" id="success-alert">
                                <div class="d-flex justify-content-between">
                                    <strong>Vui lòng lựa chọn các thông tin của sản phẩm! </strong>
                                    <button type="button" class="close" data-bs-dismiss="alert">x</button>
                                </div>
                            </div>`
                        );
                    }
                }
            });
        });
        
        // click add-quantity-btn
        $(document).on('click', '#add-quantity-btn', function () {
            var quantity = Number($('[name="data-quantity"]').attr('data-quantity'));
            quantity = quantity + 1; 
            $('[name="data-quantity"]').attr('data-quantity', quantity);
            $('[name="data-quantity"]').text(quantity);
        });
        // click add-quantity-btn
        $(document).on('click', '#sub-quantity-btn', function () {
            var quantity = Number($('[name="data-quantity"]').attr('data-quantity'));
            if (quantity != 0) {
                quantity = quantity - 1; 
                $('[name="data-quantity"]').attr('data-quantity', quantity);
                $('[name="data-quantity"]').text(quantity);
            } 
        });
        // choose size of product
        $(document).on('click', '.size', function () {
            $('.size').removeClass('size-active');
            $(this).addClass('size-active');
            $('[name="size"]').val($(this).attr('data-size'));
        });
        // choose color of product
        $(document).on('click', '.color', function () {
            $('.color').removeClass('color-active');
            $(this).addClass('color-active');
            $('[name="color"]').val($(this).attr('data-color'));
        });
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
