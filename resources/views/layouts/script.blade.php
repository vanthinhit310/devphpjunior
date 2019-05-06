<section class="footer-wrapper">
    
</section>
<?php $time = time() ?>
<!-- Scripts -->
<script src="{{asset('js/jquery.3.3.1.min.js?ver='.$time)}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/swiper.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/common.js?ver='.$time)}}"></script>
<script src="{{asset('js/ajax.function.js?ver='.$time)}}"></script>
<script src="{{asset('js/parallax.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
{{--SCRIPT TEMPLATE--}}
<script type='text/javascript' src='{{asset('js/jquery/jquery-migrate.min.js')}}'></script>
<script>
    (function ( $ ) {
        "use strict";

        $(function () {
            var masterslider_d1da = new MasterSlider();

            // slider controls

            // slider setup
            masterslider_d1da.setup("slider_1", {
                width           : 1000,
                height          : 500,
                space           : 0,
                start           : 1,
                grabCursor      : true,
                swipe           : true,
                mouse           : true,
                layout          : "fullscreen",
                wheel           : false,
                autoplay        : true,
                instantStartLayers:false,
                loop            : true,
                shuffle         : false,
                preload         : 2,
                heightLimit     : true,
                autoHeight      : false,
                smoothHeight    : true,
                endPause        : false,
                overPause       : true,
                fillMode        : "fill",
                centerControls  : true,
                layersMode      : "center",
                hideLayers      : false,
                fullscreenMargin: 0,
                speed           : 20,
                dir             : "h",
                parallaxMode    : 'swipe',
                view            : "basic"
            });



            // $("head").append( "<link rel='stylesheet' id='ms-fonts'  href='http://fonts.googleapis.com/css?family=Montserrat:regular,700%7CCrimson+Text:regular' type='text/css' media='all' />" );

            window.masterslider_instances = window.masterslider_instances || {};
            window.masterslider_instances["5_d1da"] = masterslider_d1da;
        });

    })(jQuery);
</script>
<script type='text/javascript' src='{{asset('js/plugins/LayerSlider/static/js/greensock.js')}}'></script>
<script type='text/javascript' src='{{asset('js/all.js')}}'></script>
<script type='text/javascript' src='{{asset('js/brands.js')}}'></script>
<script type='text/javascript' src='{{asset('js/fontawesome.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/light.js')}}'></script>
<script type='text/javascript' src='{{asset('js/regular.js')}}'></script>
<script type='text/javascript' src='{{asset('js/solid.js')}}'></script>
<script type='text/javascript' src='{{asset('js/v4-shims.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/LayerSlider/static/js/layerslider.kreaturamedia.jquery.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/LayerSlider/static/js/layerslider.transitions.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/core.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/widget.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/mouse.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/resizable.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/draggable.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/position.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/jquery/ui/dialog.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/wpdialog.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/js_composer/assets/js/js_composer_front.js')}}'></script>
<script type='text/javascript' src='{{asset('js/vendor/fancybox-2.1.5/jquery.fancybox.pack.js')}}'></script>
<script type='text/javascript' src='{{asset('js/vendor/fancybox-2.1.5/helpers/jquery.fancybox-media.js')}}'></script>
<script type='text/javascript' src='{{asset('js/vendor/owl-carousel/owl.carousel.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins.js')}}'></script>
<script type='text/javascript' src='{{asset('js/theme.js')}}'></script>
<script type='text/javascript' src='{{asset('js/masterslider.min.js')}}'></script>
<script src="{{asset('js/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('js/vendor/countdowntime/moment.min.js')}}"></script>
<script src="{{asset('js/vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
<script src="{{asset('js/vendor/countdowntime/countdowntime.js')}}"></script>
<script src="{{asset('js/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script src="{{asset('js/ckeditor.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
