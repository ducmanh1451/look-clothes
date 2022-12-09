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
        $(document).on('scroll', function() {
            var is_fixed = $('header').hasClass('affix');
            if (is_fixed == true) {
                $('.sub-images').addClass('sub-images-fixed');
            }
            else {
                $('.sub-images').removeClass('sub-images-fixed');
            }
        });
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}