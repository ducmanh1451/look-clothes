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
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}

function initEvents() {
    try {
        // click logout btn
        $(document).on('click', '#logout-btn', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/logout",
                dataType: "json",
                success: function (response) {
                    if (response['status'] == 201) {
                        window.location = '/login';
                    }
                }
            });
        });
      
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}
