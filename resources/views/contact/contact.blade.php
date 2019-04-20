<section class="contact-wrapper">


    <div class="beau-page-title beau-page-inner">
        <div class="title-wrapper">
            <div class="title">
                Contact
            </div>
            <div class="subtitle"><em>Connect with Us</em></div>
        </div>
    </div>

    <div id="main-container">
        <div class="page-content container page-page">
            <section class="beau-mainbar">
                <h2 class="hidden">Page - Connect With Us</h2>
                <article id="post-2221" class="post-2221 page type-page status-publish hentry">
                    <div style="background-attachment: scroll !important;" class="vc_row wpb_row vc_row-fluid">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">
                                <div
                                    class="beau-section-header wpb_content_element clearfix text-center separator-image"
                                    id='beau-section-header-1'>
                                    <h2 class='heading'>HAVE A QUESTION</h2>
                                    <div class='separator'><img src='upload/section-divider-1.png' class='image'
                                                                alt='section header separator'></div>
                                </div>
                                <div class="vc_empty_space" style="height: 32px"><span
                                        class="vc_empty_space_inner"></span></div>
                                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-4">
                                        <div class="wpb_wrapper">
                                            <div class='beau-icon-box wpb_content_element clearfix text-center'
                                                 id='beau-icon-box-2'>
                                                <div class='icon'><i class='featured-icon fa fa-twitter'></i></div>
                                                <div class='content'>CALL US
                                                    <br/>
                                                    <a href="#">+1 (234) 5678</a></div>
                                            </div>
                                            <div class="vc_empty_space" style="height: 24px"><span
                                                    class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-4">
                                        <div class="wpb_wrapper">
                                            <div class='beau-icon-box wpb_content_element clearfix text-center'
                                                 id='beau-icon-box-3'>
                                                <div class='icon'><i class='featured-icon fa fa-home'></i></div>
                                                <div class='content'>VISIT US
                                                    <br/> A-45/2, Signature Towers, New York City
                                                </div>
                                            </div>
                                            <div class="vc_empty_space" style="height: 24px"><span
                                                    class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-4">
                                        <div class="wpb_wrapper">
                                            <div class='beau-icon-box wpb_content_element clearfix text-center'
                                                 id='beau-icon-box-4'>
                                                <div class='icon'><i class='featured-icon fa fa-envelope'></i></div>
                                                <div class='content'>Email Us
                                                    <br/>
                                                    <a href="mailto:support@theme-paradise.com">support@theme-paradise.com</a>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space" style="height: 24px"><span
                                                    class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background-attachment: scroll !important;"
                         class="vc_row wpb_row vc_row-fluid vc_custom_1445960801969">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">
                                <div role="form" class="wpcf7" id="wpcf7-f2229-p2221-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <form id="contact-form" role="form" action="{{route('process.sendFeedback')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <input name="fullname" id="name" type="text" value="" size="40"
                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                           aria-required="true" aria-invalid="false"
                                                           placeholder="Name:"/>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="wpcf7-form-control-wrap your-email">
                                                    <input name="mail" id="mail" type="text" value="" size="40"
                                                           class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                           aria-required="true" aria-invalid="false"
                                                           placeholder="Email:"/></span>
                                            </div>

                                        </div>
                                        {{--@if($errors->has('full-name'))--}}
                                            {{--<span class="text-danger d-block" style="font-size: 11px;"><i--}}
                                                    {{--class="fa fa-exclamation-triangle"></i>&nbsp;{{$errors->first('full-name')}}</span>--}}
                                        {{--@endif--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="wpcf7-form-control-wrap your-subject">
                                                    <input name="subject" id="subject" type="text" value="" size="40"
                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                           aria-required="true" aria-invalid="false"
                                                           placeholder="Subject:"/></span>
                                            </div>

                                            <div class="col-md-6">
                                                <span class="wpcf7-form-control-wrap your-tel">
                                                    <input type="text" id="tel" name="tel" value="" size="40"
                                                           class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel"
                                                           aria-invalid="false" placeholder="Phone Number:"/></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="wpcf7-form-control-wrap your-message">
                                                    <textarea name="comment" id="comment" cols="40" rows="10"
                                                              class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required"
                                                              aria-required="true" aria-invalid="false"
                                                              placeholder="Message:"></textarea></span>
                                            </div>
                                        </div>
                                        <div class=" row" id="cap-cha-contact">
                                            <div class="input-group">
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="msg-text">
                                                    <span id="msg" class="text-danger" style="font-size: 11px;"></span>
                                                </div>
                                                <button class="beau-button" id="submit-contact-form" value="submit"
                                                        type="submit">SUBMIT
                                                </button>
                                            </div>
                                            <span id="msg-success"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background-attachment: scroll !important;" class="vc_row wpb_row vc_row-fluid">
                    <div class="vc_col-sm-12 wpb_column vc_column_container">
                        <div class="wpb_wrapper">
                            <div
                                class="beau-section-header wpb_content_element clearfix text-center separator-image"
                                id='beau-section-header-5'>
                                <h2 class='heading'>VISIT US HERE</h2>
                            </div>
                            <div class="vc_empty_space" style="height: 32px"><span
                                    class="vc_empty_space_inner"></span></div>
                            <div class='beau-gmap-wrapper'>
                                <div id='beau-gmap-canvas-6' class='beau-gmap-canvas' data-zoom='11'
                                     data-lat='40.6743890' data-lng='-73.9455' data-tooltip='Find Us Here'
                                     data-info='At Beau, We make Simple &amp; Beautiful Designs.'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

    </div>
</div>

{{--Script for google map--}}
    <script>
        function initMap() {
            var uluru = {lat: -25.344, lng: 131.036};
            var map = new google.maps.Map(
                document.getElementById('beau-gmap-canvas-6'), {zoom: 11, center: uluru});
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWu1UBJIT3OMG3Zo9ccz93AqVT2D0lQvc&callback=initMap"></script>
    {{--Script for google map--}}

</section>
