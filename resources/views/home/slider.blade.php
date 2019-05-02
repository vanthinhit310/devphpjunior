<section class="slider-wrapper">
    <div class="header-hero-section" id="hero-section">
        <!-- MasterSlider -->
        <div id="P_slider_1" class="master-slider-parent ms-parent-id-5">
            <!-- MasterSlider Main -->
            <div id="slider_1" class="master-slider ms-skin-default">
                @if($sliders)
                    @foreach($sliders as $slider)
                        <div class="ms-slide" data-delay="3" data-fill-mode="fill">
                            <img class="img-fluid w-100" src="{{asset('images/blank.gif')}}" alt="" title=""
                                 data-src="{{Voyager::image($slider->image)}}"/>
                            <div class="ms-layer msp-cn-5-21" data-effect="t(true,n,-150,n,n,n,n,n,n,n,n,n,n,n,n)"
                                 data-ease="easeOutQuint" data-offset-x="-12" data-offset-y="-114" data-origin="mc">
                                {{$slider->name}}
                            </div>
                            <div class="ms-layer msp-cn-5-22" data-effect="t(true,n,150,n,n,n,n,n,n,n,n,n,n,n,n)"
                                 data-ease="easeOutQuint" data-offset-x="-23" data-offset-y="-16" data-origin="mc">
                                {{$slider->title}}
                            </div>
                            <div class="ms-layer msp-cn-5-23" data-effect="t(true,n,-150,n,n,n,n,n,n,n,n,n,n,n,n)"
                                 data-ease="easeOutQuint" data-offset-x="-13" data-offset-y="100" data-origin="mc">
                                {{$slider->description}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- END MasterSlider Main -->
        </div>
        <!-- END MasterSlider -->
    </div>

</section>
