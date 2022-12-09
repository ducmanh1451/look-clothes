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
        $(this).scrollTop(0);
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}

function initEvents() {
    try {
        $(document).on('scroll', function() {
            var offset = $('header').offset().top;
            if (offset > 50) {
                $('header').addClass('affix');
            }
            else {
                $('header').removeClass('affix');
            }
        });
        $(document).on('click', '#btn-open-hidden-box', function () {
            $('.hidden-menu').removeClass('d-none');
        });
        $(document).on('click', '#btn-close-hidden-box', function() {
            $('.hidden-menu').addClass('d-none');
        });
        $(document).on('click', '.category-parent', function() {
            var category_parent_id = $(this).attr('category-parent-id');
            var path_nm = window.location.pathname;
            window.location = `${path_nm}?parent-id=${category_parent_id}`;
        });
        $(document).on('click', '.category', function() {
            var category_id = $(this).attr('category-id');
            var path_nm = window.location.pathname;
            window.location = `${path_nm}?category-id=${category_id}`;
        });
        $(document).on('click', '.btn-search', function() {
            var string = $(this).parents('.search-box').find('.input-search').val();
            var path_nm = window.location.pathname;
            // window.location = `${path_nm}?string=${string}`;
            window.location = `san-pham/?string=${string}`;
        });
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}
