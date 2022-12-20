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
        // init select2
        $('.js-example-basic-single').select2({
            width: null
        });
        // get all provinces
        $.ajax({
            type: "GET",
            url: "https://vn-public-apis.fpo.vn/provinces/getAll?limit=-1",
            dataType: "json",
            success: function (response) {
                var html = '';
                response.data.data.forEach(element => {
                    html += `<option value="${element.code}">${element.name}</option>`;
                });
                $('[name="province"]').append(html);
            }
        });
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}

function initEventsOrders() {
    try {
        // get all districts when select province
        $('[name="province"]').on('select2:select', function (e) {
            var province_cd = $(this).find('option:selected').val();
            $.ajax({
                type: "GET",
                url: `https://vn-public-apis.fpo.vn/districts/getByProvince?provinceCode=${province_cd}&limit=-1`,
                dataType: "json",
                success: function (response) {
                    var html = '';
                    response.data.data.forEach(element => {
                        html += `<option value="${element.code}">${element.name}</option>`;
                    });
                    $('[name="district"]').empty();
                    $('[name="district"]').append(html);
                }
            });
        });
        // get all wards when select district
        $('[name="district"]').on('select2:select', function (e) {
            var district_cd = $(this).find('option:selected').val();
            $.ajax({
                type: "GET",
                url: `https://vn-public-apis.fpo.vn/wards/getByDistrict?districtCode=${district_cd}&limit=-1`,
                dataType: "json",
                success: function (response) {
                    var html = '';
                    response.data.data.forEach(element => {
                        html += `<option value="${element.code}">${element.name}</option>`;
                    });
                    $('[name="ward"]').empty();
                    $('[name="ward"]').append(html);
                }
            });
        });
        // click confirm-btn
        $(document).on('click', '#confirm-btn', function (e) {
            e.preventDefault();
            var obj = {};
            $('.bs-input').each(function () {
                var name = $(this).attr('name');
                obj[name] = $(this).val();
            });
            $('.js-example-basic-single').each(function () {
                var name = $(this).attr('name');
                obj[name] = $(this).find('option:selected').text();
            });
            obj['list-products'] = [];
            $('.list-item').each(function (index) {
                var sub_obj = {};
                var inputs = $(this).find('input:hidden');
                inputs.each(function (index) {
                    var name = $(this).attr('name');
                    sub_obj[name] = $(this).val(); 
                });
                obj['list-products'][index] = sub_obj;
            })
            obj['list-products'] = JSON.stringify(obj['list-products']);
            $.ajax({
                type: "POST",
                url: "/store-order",
                data: obj,
                dataType: "json",
                success: function (response) {
                    if (response['status'] == 201) {
                        Swal.fire({
                            icon: 'success',
                            title: `${response['message']}`,
                            confirmButtonText: 'Đóng',
                          }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = '/san-pham';
                            } 
                        });
                    }
                }
            });
        });
    } catch (e) {
        alert('initializeDetail: ' + e.message);
    }
}
