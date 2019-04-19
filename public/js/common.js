var Header = {
    croll_effect: function () {
        if (jQuery(".header-wrapper").length) {
            window.onscroll = function () {
                if (
                        document.body.scrollTop > 50 ||
                        document.documentElement.scrollTop > 50
                        ) {
                    jQuery(".header-wrapper").addClass("scroll");
                } else {
                    jQuery(".header-wrapper").removeClass("scroll");
                }
            };
        }
    },
};
$(document).ready(function(){
    Header.croll_effect();
});

window.onload= function(){

};