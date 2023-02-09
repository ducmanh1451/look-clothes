$(document).ready(function () {
    try {
        initializeOrdersDetail();
        initEventsOrdersDetail();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeOrdersDetail() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsOrdersDetail() {
    try {
        // delete
        $(document).on('click', '#btn-delete', function () {
            Swal.fire({
                title: 'Bạn muốn xóa đơn hàng này?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "/admin/orders/delete",
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
                                        window.location = '/admin/orders';
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
