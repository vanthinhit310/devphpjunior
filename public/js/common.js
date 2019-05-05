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
        if (jQuery('#msg-success').length) {
            var e = document.getElementById('msg-success');
            if (e.style.display === 'block') {
                e.style.display = 'none';
            }
            else {
                e.style.display = 'block';
            }
        }
    },
    showLoadingSVGReg: function () {
        if (jQuery('#msg-success-reg').length) {
            var e = document.getElementById('msg-success-reg');
            if (e.style.display === 'block') {
                e.style.display = 'none';
            }
            else {
                e.style.display = 'block';
            }
        }
    },
    showLoadingSVGLog: function () {
        if (jQuery('#msg-success-login').length) {
            var e = document.getElementById('msg-success-login');
            if (e.style.display === 'block') {
                e.style.display = 'none';
            }
            else {
                e.style.display = 'block';
            }
        }
    },
    showLoadingCreateLog: function () {
        if (jQuery('#create-log-loading').length) {
            var e = document.getElementById('create-log-loading');
            if (e.style.display === 'block') {
                e.style.display = 'none';
            }
            else {
                e.style.display = 'block';
            }
        }
    },
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
                    jQuery('#errorReg').html('<i class="fal fa-exclamation-circle"></i>Some thing went wrong. Please check again.');
                    jQuery('.username-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#email').val() === '' || jQuery('#email').val() === 'undefined') {
                    jQuery('#errorReg').html('<i class="fal fa-exclamation-circle"></i>Some thing went wrong. Please check again.');
                    jQuery('.email-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (!(Form.validateEmail(email))) {
                    jQuery('#errorReg').html('<i class="fal fa-exclamation-circle"></i>Email has wrong format. Please check again.');
                    jQuery('.email-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#password').val() === '' || jQuery('#password').val() === 'undefined') {
                    jQuery('#errorReg').html('<i class="fal fa-exclamation-circle"></i>Some thing went wrong. Please check again.');
                    jQuery('.password-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#confirm').val() === '' || jQuery('#confirm').val() === 'undefined') {
                    jQuery('#errorReg').html('<i class="fal fa-exclamation-circle"></i>Some thing went wrong. Please check again.');
                    jQuery('.confirm-reg').css('border', 'solid 1px red');
                    checkFrom = false;
                }
                if (jQuery('#password').val() !== jQuery('#confirm').val()) {
                    jQuery('#errorReg').html('<i class="fal fa-exclamation-circle"></i>Password not match. Please check again.');
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
    ,
    validateLoginForm: function () {
        if (jQuery('.submit-form-login').length) {
            jQuery('.submit-form-login').on('click', function () {
                var _checkForm = true;
                if (jQuery('#log-email').val() === '' || jQuery('#log-email').val() === 'undefined') {
                    jQuery('#errorLog').html('<i class="fal fa-exclamation-circle"></i> Email went wrong. Please check again.');
                    jQuery('.email-log-gin').css('border', 'solid 1px red');
                    _checkForm = false;
                }
                if (jQuery('#log-password').val() === '' || jQuery('#log-password').val() === 'undefined') {
                    jQuery('#errorLog').html('<i class="fal fa-exclamation-circle"></i> Password went wrong. Please check again.');
                    jQuery('.password-log-gin').css('border', 'solid 1px red');
                    _checkForm = false;
                }
                if (_checkForm === true) {
                    Loading.showLoadingSVGLog();
                    jQuery('#log-form').submit();
                }
            });
            jQuery('#log-form').on('keyup', function () {
                if (jQuery('#log-email').val() !== '') {
                    jQuery('#errorLog').html('');
                    jQuery('.email-log-gin').css('border', 'solid 1px green');
                }
                if (jQuery('#log-password').val() !== '') {
                    jQuery('#errorLog').html('');
                    jQuery('.password-log-gin').css('border', 'solid 1px green');
                }
                return true;
            });
        }
    },
    validateResetForm: function () {
        if (jQuery('.reset-password-wrapper').length) {
            jQuery('#submit-form-reset').on('click', function () {
                console.log(5);
                var check = true;
                if (jQuery('#emailReset').val() === '' || jQuery('#emailReset').val() === 'undefined') {
                    jQuery('.errorStatus').html('Something went wrong! Please try again.');
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (check === true) {
                    jQuery('.successStatus').html('Sending! Please wait...');
                    jQuery('#form-reset-password').submit();
                }
            });
            jQuery('#form-reset-password').on('keyup', function () {
                if (jQuery('#emailReset').val() !== '') {
                    jQuery('.errorStatus').html('');
                    jQuery('.field-reset').css('border', 'solid 2px green');
                }
                return true;
            });
        }
    }
    ,
    validateFormChangePassword: function () {
        if (jQuery('.change-password-wrapper').length) {
            jQuery('#submit-form-change').on('click', function () {
                var check = true;
                if (jQuery('#newPassword').val() === '' || jQuery('#newPassword').val() === 'undefined') {
                    jQuery('.errorStatus').html('Something went wrong! Please check again.')
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (jQuery('#confirm_change').val() === '' || jQuery('#confirm_change').val() === 'undefined') {
                    jQuery('.errorStatus').html('Something went wrong! Please check again.')
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (jQuery('#newPassword').val() !== jQuery('#confirmChange').val()) {
                    jQuery('.errorStatus').html('Your password and confirm do not match.');
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (check === true) {
                    jQuery('.successStatus').html('Sending. Please wait!');
                    jQuery('#form-change-password').submit();
                }
            });
            jQuery('#form-change-password').on('keyup', function () {
                if (jQuery('#newPassword').val() !== '') {
                    jQuery('.errorStatus').html('');
                    jQuery('.field-reset').css('border', 'solid 2px green');
                }
                if (jQuery('#confirmChange').val() !== '') {
                    jQuery('.errorStatus').html('');
                    jQuery('.field-reset').css('border', 'solid 2px green');
                }
                return true;
            });
        }
    }
    ,
    validateFormUpdatePassword: function () {
        if (jQuery('.update-password-wrapper').length) {
            jQuery('#submit-form-update').on('click', function () {
                var check = true;
                if (jQuery('#currentPassword_update').val() === '' || jQuery('#currentPassword_update').val() === 'undefined') {
                    jQuery('.errorStatus').html('Something went wrong! Please check again.')
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (jQuery('#newPassword_update').val() === '' || jQuery('#newPassword_update').val() === 'undefined') {
                    jQuery('.errorStatus').html('Something went wrong! Please check again.')
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (jQuery('#confirmUpdate').val() === '' || jQuery('#confirmUpdate').val() === 'undefined') {
                    jQuery('.errorStatus').html('Something went wrong! Please check again.')
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (jQuery('#newPassword_update').val() !== jQuery('#confirmUpdate').val()) {
                    jQuery('.errorStatus').html('Your password and confirm do not match.')
                    jQuery('.field-reset').css('border', 'solid 1px red');
                    check = false;
                }
                if (check === true) {
                    jQuery('.successStatus').html('Sending. Please wait!');
                    jQuery('#form-update-password').submit();
                }
            });
            jQuery('#form-update-password').on('keyup', function () {
                if (jQuery('#currentPassword_update').val() !== '') {
                    jQuery('.errorStatus').html('');
                    jQuery('.field-reset').css('border', 'solid 2px green');
                }
                if (jQuery('#newPassword_update').val() !== '') {
                    jQuery('.errorStatus').html('');
                    jQuery('.field-reset').css('border', 'solid 2px green');
                }
                if (jQuery('#confirmUpdate').val() !== '') {
                    jQuery('.errorStatus').html('');
                    jQuery('.field-reset').css('border', 'solid 2px green');
                }
                return true;
            });
        }
    },
    resetFormCreateLog: function () {
        if (jQuery('.create-log-wrapper').length) {
            jQuery('.submit-create-log').on('click', function () {
                Loading.showLoadingCreateLog();
            });
            jQuery('.reset-create-log-form').on('click', function () {
                jQuery('#createLog')[0].reset();
            });
        }
    }
};
var SwiperSlide = {
    swiperMTPage: function () {
        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            speed: 30,
            autoHeight: true,
            slidesPerView: 1,
            spaceBetween: 10,
            effect: 'fade',
            pagination: {
                el: '.swiper-pagination',
                type: 'progressbar',
            },
            autoplay: {
                delay: 1000
            }, fadeEffect: {
                crossFade: true
            }
        });

    }
};
var Timer = {
    countUpTimer: function (countFrom, id) {
        countFrom = new Date(countFrom).getTime();
        var now = new Date(),
            countFrom = new Date(countFrom),
            timeDifference = (now - countFrom);

        var secondsInADay = 60 * 60 * 1000 * 24,
            secondsInAHour = 60 * 60 * 1000;

        days = Math.floor(timeDifference / (secondsInADay));
        hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour));
        mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000));
        secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000);
        if (jQuery('#countup1').length) {
            document.getElementById('day').innerHTML = days;
            document.getElementById('hour').innerHTML = hours;
            document.getElementById('minutes').innerHTML = mins;
            document.getElementById('seconds').innerHTML = secs;
        }
        clearTimeout(Timer.countUpTimer.interval);
        Timer.countUpTimer.interval = setTimeout(function () {
            Timer.countUpTimer(countFrom, id);
        }, 1000);
    }
};
var Tooltip = {
    showTooltip: function () {
        if (jQuery('.result').length) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    }
};
var Custom = {
    getHTLMTag: function () {
        if (jQuery('.search-value').length) {
            jQuery('.search-value').on('click', function () {
                var key_word = jQuery(this).text();
                jQuery('.search-field').val(key_word);
                jQuery('#search-form').submit();
            });
        }
    },
    scrollToTopPage: function () {
        if (jQuery('.extension-content').length) {
            jQuery('.scroll-to-top').on("click", function () {
                jQuery('html, body').animate({scrollTop: 0}, 'slow', function () {
                });
            });
        }
    }

};
var CKEditor = {
    getEditorLogPage: function () {
        if (jQuery('#editorLog').length) {
            ClassicEditor.create(document.querySelector('#editorLog'), {
                toolbar: ["heading", "|", "bold", "italic", "link", "bulletedList", "numberedList", "blockQuote", "insertTable", "mediaEmbed", "undo", "redo"]
            })
                .then
                (editor => {
                    editorinstance = editor;
                })
                .catch(error => {
                    console.error(error);
                });
            jQuery('.reset-create-log-form').on('click', function () {
                // setData to editor
                editorinstance.setData('');
                //getData of editor
                // const data = editorinstance.getData();
            });
        }
    }
};
window.onload = function () {
    Timer.countUpTimer("Oct 10, 2016 19:00:00", 'countup1');
};

jQuery(document).ready(function () {
    ValidateFrom.contactForm();

    Loading.hideLoading();

    Menu.activeMenu();

    Form.validateRegisterForm();
    Form.validateLoginForm();
    Form.validateResetForm();
    Form.validateFormChangePassword();
    Form.validateFormUpdatePassword();
    Form.resetFormCreateLog();
    // SwiperSlide.swiperMTPage();


    Tooltip.showTooltip();


    Custom.getHTLMTag();
    Custom.scrollToTopPage();

    CKEditor.getEditorLogPage();

});
