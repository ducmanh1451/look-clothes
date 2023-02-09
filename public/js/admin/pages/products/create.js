$(document).ready(function () {
    try {
        initializeCreateProducts();
        initEventsCreateProducts();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeCreateProducts() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsCreateProducts() {
    try {
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
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
