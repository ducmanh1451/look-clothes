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
        $('#image').val('');
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsDetail() {
    try {
        // click delete-img-btn
        $(document).on('click', '.delete-img-btn', function(e) {
            $(this).parents('.item').remove();
        });
        // preview images before upload
        $(document).on('change', '#image', function(e) {
            if (e.target.files.length > 0) {
                $.each(e.target.files, function(key, value){
                    var url = URL.createObjectURL(value);
                    var html = `<img src="${url}">`;
                    $('.thumbnail').append(html);
                });
            }
            $('.thumbnail').removeClass('d-none');
        });
        // change color
        $(document).on('change', '.color', function () {
            var string = '';
            $('.color:checked').each(function () {
                var value = $(this).val();
                string += value + ', ';
            });
            string = string.slice(0, string.length - 2);
            $('#color_hidden').val(string);
        });
        // change size
        $(document).on('change', '.size', function () {
            var string = '';
            $('.size:checked').each(function () {
                var value = $(this).val();
                string += value + ', ';
            });
            string = string.slice(0, string.length - 2);
            $('#size_hidden').val(string);
        });
        // change is_new_product
        $(document).on('change', '.is_new_product', function () {
            $('.is_new_product').prop('checked', false);
            $(this).prop('checked', true);
            $('#is_new_product_hidden').val($(this).attr('data-value'));
        });
        // delete
        $(document).on('click', '#btn-delete', function () {
            Swal.fire({
                title: 'Bạn muốn xóa sản phẩm này?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "/admin/products/delete",
                        data: {id: $('#id').val()},
                        dataType: "json",
                        success: function (response) {
                            if (response['status'] == 201) {
                                Swal.fire({
                                    icon: 'success',
                                    title: `${response['message']}`,
                                    confirmButtonText: 'Đóng',
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = '/admin/products';
                                    } 
                                });
                            }
                        }
                    });
                }
            });
        });
        
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
