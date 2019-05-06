var Address = {
    getListDistrict: function () {
        if (jQuery('.address-select-custom').length) {
            jQuery('#city').on('change', function () {
                jQuery('#district').children('option').remove();
                var cityValue = jQuery(this).val();
                jQuery.ajax({
                    url: 'get-list-district',
                    data: {
                        id: cityValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.districts;
                        array_data.forEach(function (element) {
                            jQuery('#district').append('<option value="'+element.id+'" selected="selected">'+element.name+'</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    },
    getListWard:function () {
        if (jQuery('.address-select-custom').length){
            jQuery('#district').on('change', function () {
                jQuery('#ward').children('option').remove();
                var districtValue = jQuery(this).val();
                jQuery.ajax({
                    url: 'get-list-ward',
                    data: {
                        id: districtValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.wards;
                        array_data.forEach(function (element) {
                            jQuery('#ward').append('<option value="'+element.id+'" selected="selected">'+element.name+'</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    },
    getListDistrictTest: function () {
        if (jQuery('.test-content').length) {
            jQuery('#cityTest').on('change', function () {
                jQuery('#districtTest').children('option').remove();
                var cityValue = jQuery(this).val();
                jQuery.ajax({
                    url: 'get-district',
                    data: {
                        id: cityValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.districts;
                        array_data.forEach(function (element) {
                            jQuery('#districtTest').append('<option value="'+element.id+'" selected="selected">'+element.name+'</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    },
    getListWardTest:function () {
        if (jQuery('.test-content').length){
            jQuery('#districtTest').on('change', function () {
                jQuery('#wardTest').children('option').remove();
                var districtValue = jQuery(this).val();
                jQuery.ajax({
                    url: 'get-ward',
                    data: {
                        id: districtValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.wards;
                        array_data.forEach(function (element) {
                            jQuery('#wardTest').append('<option value="'+element.id+'" selected="selected">'+element.name+'</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    }
};

jQuery(document).ready(function () {

});

window.onload = function () {
    Address.getListDistrict();
    Address.getListWard();
    // Address.getListDistrictTest();
    // Address.getListWardTest();
};
