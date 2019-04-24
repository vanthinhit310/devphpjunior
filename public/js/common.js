var ValidateFrom = {
    contactForm: function () {
        if (jQuery('#submit-contact-form').length) {
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
                if (grecaptcha.getResponse() == "") {
                    jQuery('#msg').html('Google re-captcha is required!');
                    return false;
                }
                Loading.showLoadingSVG();
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
    hideLoading: function () {
        if (jQuery('.loading').length) {
            setTimeout(function () {
                jQuery('.loading').fadeOut();
            }, 2000);
        }
    },
    showLoadingSVG: function () {
        var e = document.getElementById('msg-success');
        if (e.style.display === 'block') {
            e.style.display = 'none';
        }
        else {
            e.style.display = 'block';
        }
    },
    showLoadingSVGReg: function () {
        var e = document.getElementById('msg-success-reg');
        if (e.style.display === 'block') {
            e.style.display = 'none';
        }
        else {
            e.style.display = 'block';
        }
    }

};
var Menu = {
    activeMenu: function () {
        if (jQuery('#main-menu-wrapper').length) {
            jQuery('ul.menu li a').each(function () {
                var isActive = this.pathname === location.pathname;
                jQuery(this).parent().toggleClass('current-menu-item', isActive);
            });
        }
    }
};
var Form = {
    validateRegisterForm: function () {
        if (jQuery('.submit-form').length) {
            jQuery('.submit-form').on('click', function () {
                var checkFrom = true;
                var email = jQuery('#email').val();
                if (jQuery('#username').val() === '' || jQuery('#username').val() === 'undefined') {
                    jQuery('#errorReg').html('Some thing went wrong. Please check again.');
                    jQuery('.username-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#email').val() === '' || jQuery('#email').val() === 'undefined') {
                    jQuery('#errorReg').html('Some thing went wrong. Please check again.');
                    jQuery('.email-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (!(Form.validateEmail(email))) {
                    jQuery('#errorReg').html('Email has wrong format. Please check again.');
                    jQuery('.email-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#password').val() === '' || jQuery('#password').val() === 'undefined') {
                    jQuery('#errorReg').html('Some thing went wrong. Please check again.');
                    jQuery('.password-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#confirm').val() === '' || jQuery('#confirm').val() === 'undefined') {
                    jQuery('#errorReg').html('Some thing went wrong. Please check again.');
                    jQuery('.confirm-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#password').val() !== jQuery('#confirm').val()) {
                    jQuery('#errorReg').html('Password not match. Please check again.');
                    jQuery('.confirm-reg').css('border', 'solid 1px red');
                    jQuery('.password-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (checkFrom === true) {
                    Loading.showLoadingSVGReg();
                    jQuery('#reg-form').submit();
                }
            });
            jQuery('#reg-form').on('keyup', function () {
                if (jQuery('#username').val() !== '') {
                    jQuery('#errorReg').html('');
                    jQuery('.username-reg').css('border', 'solid 2px green');
                }
                if (jQuery('#email').val() !== '') {
                    jQuery('#errorReg').html('');
                    jQuery('.email-reg').css('border', 'solid 2px green');
                }
                if (jQuery('#password').val() !== '') {
                    jQuery('#errorReg').html('');
                    jQuery('.password-reg').css('border', 'solid 2px green');
                }
                if (jQuery('#confirm').val() !== '') {
                    jQuery('#errorReg').html('');
                    jQuery('.confirm-reg').css('border', 'solid 2px green');
                }
                return true;
            });
        }
    },
    validateEmail: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
};
window.onload = function () {

};

jQuery(document).ready(function () {
    ValidateFrom.contactForm();

    Loading.hideLoading();

    Menu.activeMenu();

    Form.validateRegisterForm();

});
