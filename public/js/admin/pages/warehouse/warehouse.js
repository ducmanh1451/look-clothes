$(document).ready(function () {
    try {
        initializeWarehouse();
        initEventsWarehouse();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeWarehouse() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsWarehouse() {
    try {
        // click search
        $(document).on('click', '#search-btn', function(e) {
            e.preventDefault();
            var product_nm = $('[name="product_nm"]').val();
            if (product_nm != '') {
                var path_nm = window.location.pathname;
                window.location = `${path_nm}?product_nm=${product_nm}`;
            }
        });
        
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
