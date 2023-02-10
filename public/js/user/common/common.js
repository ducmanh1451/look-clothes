jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
});

$(document).ready(function () {
    try {
        initialize();
        initEvents();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initialize() {
    try {
        getCartShopping();
        $(this).scrollTop(0);
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}

function initEvents() {
    try {
        // scroll header fixed
        $(document).on('scroll', function() {
            var offset = $('header').offset().top;
            if (offset > 50) {
                $('header').addClass('affix');
            }
            else {
                $('header').removeClass('affix');
            }
        });
        // open hidden box
        $(document).on('click', '#btn-open-hidden-box', function () {
            $('.hidden-menu').removeClass('d-none');
        });
        // close hidden box
        $(document).on('click', '#btn-close-hidden-box', function() {
            $('.hidden-menu').addClass('d-none');
        });
        // click navigation
        $(document).on('click', '.category-parent', function() {
            var category_parent_id = $(this).attr('category-parent-id');
            var path_nm = window.location.pathname;
            window.location = `${path_nm}?parent-id=${category_parent_id}`;
        });
        // click navigation
        $(document).on('click', '.category', function() {
            var category_id = $(this).attr('category-id');
            var path_nm = window.location.pathname;
            if (path_nm != '/san-pham') {
                path_nm = '/san-pham';
            }
            window.location = `${path_nm}?category-id=${category_id}`;
        });
        // click search btn
        $(document).on('click', '.btn-search', function() {
            var string = $(this).parents('.search-box').find('.input-search').val();
            var path_nm = window.location.pathname;
            // window.location = `${path_nm}?string=${string}`;
            // window.location = `san-pham/?string=${string}`;
            window.location = location.origin + '/' + `san-pham/?string=${string}`;
        });
        // click on delete product from cart shopping
        $(document).on('click', '.close-icon', function(e) {
            e.preventDefault();
            var index = $(this).parents('.item').attr('index');
            $.ajax({
                type: "POST",
                url: "/update-cart-shopping",
                data: {index: index},
                dataType: "json",
                success: function (response) {
                    if (response['status'] == 201) {
                        $('#collapse-cart').collapse('hide');
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
                }
            });
        });
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}

function getCartShopping()
{
    $.ajax({
        type: "GET",
        url: "/cart-shopping",
        dataType: "html",
        success: function (response) {
            $('#collapse-cart').empty();
            $('#collapse-cart').html(response);
        }
    });
}