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
        $(document).on('scroll', function() {
            var offset = $('header').offset().top;
            if (offset > 50) {
                $('header').addClass('affix');
            }
            else {
                $('header').removeClass('affix');
            }
        });
        $(document).on('click', '#open-btn', function () {
            $('.hidden-menu').removeClass('d-none');
        });
        $(document).on('click', '#close-btn', function() {
            $('.hidden-menu').addClass('d-none');
        });
    } catch (e) {
        alert('initialize: ' + e.message);
    }
}
