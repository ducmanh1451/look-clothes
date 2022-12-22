$(document).ready(function () {
    try {
        initializeProducts();
        initEventsProducts();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeProducts() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsProducts() {
    try {
        // click add cart btn
        $(document).on('click', '#search-btn', function(e) {
            e.preventDefault();
            var category_id = $('#categories option:selected').val();
            if (category_id != '-1') {
                var path_nm = window.location.pathname;
                window.location = `${path_nm}?category-id=${category_id}`;
            }
        });
        
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
