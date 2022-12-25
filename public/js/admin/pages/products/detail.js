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
        // click delete-img-btn
        $(document).on('click', '.delete-img-btn', function(e) {
            $(this).parents('.item').remove();
        });
        // preview images before upload
        $(document).on('change', '#image', function(e) {
            if (e.target.files.length > 0) {
                $.each(e.target.files, function(key, value){
                    var url = URL.createObjectURL(value);
                    var html = `<div class="item col-3">
                                    <div class="delete-img-btn">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <img class="w-100"
                                        src="${url}">
                                </div>`;
                    $('.images .row').append(html);
                });
            }
        });
        
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
