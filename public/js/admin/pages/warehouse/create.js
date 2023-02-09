$(document).ready(function () {
    try {
        initializeCreateWarehouse();
        initEventsCreateWarehouse();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeCreateWarehouse() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsCreateWarehouse() {
    try {
        // change color
        $(document).on('change', '.color', function () {
            $('.color').prop('checked', false);
            $(this).prop('checked', true);
            $('#color_hidden').val($(this).val());
        });        
        // change size
        $(document).on('change', '.size', function () {
            $('.size').prop('checked', false);
            $(this).prop('checked', true);
            $('#size_hidden').val($(this).val());
        });
        //
        // $(document).on('blur', '#product_id', function () {
        //     var id = $('#product_id').val();
        //     $.ajax({
        //         type: "GET",
        //         url: `/admin/warehouse/${id}`,
        //         success: function (response) {
        //             if (response.data.length != 0 && response.status == '201') {
        //                 $('.modal [name="product_nm"]').val(response.data[0].product_nm);
        //                 $(response.data).each(function () {
        //                     $(`#color_${this.color_id}`).attr('disabled', true);
        //                     $(`#size_${this.size_id}`).attr('disabled', true);
        //                 });
        //             }
        //             else {
        //                 Swal.fire({
        //                     text: "Sản phẩm không tồn tại",
        //                     confirmButtonColor: '#3085d6',
        //                     confirmButtonText: 'Đóng'
        //                   }).then((result) => {
        //                     if (result.isConfirmed) {
        //                         $('.modal [name="product_id"]').val('');
        //                         $('.modal [name="product_nm"]').val('');
        //                         $('.modal .color').prop('checked', false);
        //                         $('.modal .size').prop('checked', false);
        //                         $('.modal .color').attr('disabled', false);
        //                         $('.modal .size').attr('disabled', false);
        //                         $('.modal [name="product_id"]').focus();
        //                     }
        //                 });
        //             }
        //         }
        //     });
        // });
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
