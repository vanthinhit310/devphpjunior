var Address = {
    getListDistrictProfile: function () {
        if (jQuery('.basic-info').length) {
            jQuery('#city_profile').on('change', function () {
                jQuery('#district_profile').children('option').remove();
                var cityValue = jQuery(this).val();
                jQuery.ajax({
                    url: get_district_url,
                    data: {
                        id: cityValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.districts;
                        array_data.forEach(function (element) {
                            jQuery('#district_profile').append('<option value="' + element.id + '" selected="selected">' + element.name + '</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    },
    getListWardProfile: function () {
        if (jQuery('.basic-info').length) {
            jQuery('#district_profile').on('change', function () {
                jQuery('#ward_profile').children('option').remove();
                var districtValue = jQuery(this).val();
                jQuery.ajax({
                    url: get_ward_url,
                    data: {
                        id: districtValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.wards;
                        array_data.forEach(function (element) {
                            jQuery('#ward_profile').append('<option value="' + element.id + '" selected="selected">' + element.name + '</option>');
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
    Address.getListDistrictProfile();
    Address.getListWardProfile();
};
