$(document).ready(function () {
    try {
        initializeOrders();
        initEventsOrders();
    } catch (e) {
        alert('ready' + e.message);
    }
});

function initializeOrders() {
    try {
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsOrders() {
    try {
        
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
