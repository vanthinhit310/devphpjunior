<section class="about-wrapper">
    <div id="main-container">
        <div class="page-content container page-page">
            <section class="beau-mainbar">
                <blockquote>{{$about->title}}</blockquote>
                <article id="post-19" class="post-19 page type-page status-publish hentry">
                    <div style="background-attachment: scroll !important;" class="vc_row wpb_row vc_row-fluid">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">

                                <div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        {!! $about->description !!}
                                    </div>
                                </div>
                                        <blockquote>{{$about->ps}}</blockquote>
                            </div>
                        </div>
                    </div>

                    <div style="background-attachment: scroll !important;" class="vc_row wpb_row vc_row-fluid">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">
                                <div
                                    class="beau-section-header wpb_content_element clearfix text-center separator-image"
                                    id='beau-section-header-12'>
                                    <h2 class='heading'>ESTEEMED CLIENTS</h2>
                                    <div class='separator'><img src='{{asset('images/section-divider-1.png')}}'
                                                                class='image' alt='section header separator'></div>
                                </div>

                                <div class='beau-image-carousel wpb_content_element' id='beau-image-carousel-13'
                                     data-items='4'>
                                    <div class='owl-carousel'>
                                        @foreach($favorites as $favorite)
                                        <div class='item'><img src='{{Voyager::image($favorite->logo)}}'
                                                               alt='{{$favorite->name}}'></div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </article>
            </section>

        </div>
    </div>

</section>
