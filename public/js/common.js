var ValidateFrom = {
    contactForm: function () {
        if (jQuery('#submit-contact-form').length) {
            var _check = true;
            jQuery('#submit-contact-form').on('click', function () {

                if (jQuery('#name').val() === '' || jQuery('#name').val() === 'undefined') {
                    jQuery('#name').css('border-bottom', 'solid 1px red');
                    jQuery('#msg').html('Something went wrong. Please check again!');
                    return false;
                }
                if (jQuery('#mail').val() === '' || jQuery('#mail').val() === 'undefined') {
                    jQuery('#mail').css('border-bottom', 'solid 1px red');
                    jQuery('#msg').html('Something went wrong. Please check again!');
                    return false;
                }
                if (jQuery('#subject').val() === '' || jQuery('#subject').val() === 'undefined') {
                    jQuery('#subject').css('border-bottom', 'solid 1px red');
                    jQuery('#msg').html('Something went wrong. Please check again!');
                }
                if (jQuery('#tel').val() === '' || jQuery('#tel').val() === 'undefined') {
                    jQuery('#tel').css('border-bottom', 'solid 1px red');
                    jQuery('#msg').html('Something went wrong. Please check again!');
                    return false;
                }
                if (jQuery('#comment').val() === '' || jQuery('#comment').val() === 'undefined') {
                    jQuery('#comment').css('border-bottom', 'solid 1px red');
                    jQuery('#msg').html('Something went wrong. Please check again!');
                    return false;
                }
                // if (grecaptcha.getResponse() == "") {
                //     jQuery('#msg').html('Google re-captcha is required!');
                //     return false;
                // }
                return true;
            });
            jQuery('#contact-form').on('keyup', function () {
                if (jQuery('#name').val() !== '') {
                    jQuery('#name').css('border-bottom', 'solid 1px green');
                    jQuery('#msg').html('');
                }
                if (jQuery('#mail').val() !== '') {
                    jQuery('#mail').css('border-bottom', 'solid 1px green');
                    jQuery('#msg').html('');
                }
                if (jQuery('#subject').val() !== '') {
                    jQuery('#subject').css('border-bottom', 'solid 1px green');
                    jQuery('#msg').html('');
                }
                if (jQuery('#tel').val() !== '') {
                    jQuery('#tel').css('border-bottom', 'solid 1px green');
                    jQuery('#msg').html('');
                }
                if (jQuery('#comment').val() !== '') {
                    jQuery('#comment').css('border-bottom', 'solid 1px green');
                    jQuery('#msg').html('');
                }
                if (grecaptcha.getResponse() != "") {
                    jQuery('#msg').html('');
                }
                return true;
            });
        }
    }
};
var Loading = {
    hideLoading:function () {
        if (jQuery('.loading').length) {
            setTimeout(function () {
                jQuery('.loading').fadeOut();
            }, 2000);
        }
    }
};

window.onload = function () {

};

jQuery(document).ready(function () {
    ValidateFrom.contactForm();

    Loading.hideLoading();
});
