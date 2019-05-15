
@extends('layouts.master')
@section('content')
    <section class="wife-wrapper">
        <div class="container">
            <div class="main-content">
                <h3 class="text-center text-uppercase">our memories</h3>
                <div class="swiper-container wife">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    @if(isset($galleries) && $galleries != null)
                        <!-- Slides -->
                            @foreach($galleries as $g)
                                {{--<div class="swiper-slide"><img src="{{asset($garellie->link)}}" alt="Wife"></div>--}}
                                <div class="swiper-slide wife-slide"
                                     style="background-image:url({{asset($g->link)}})"></div>
                            @endforeach
                        @endif
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <hr>
            <br>
            <div class="wife-gallery" id="data-zone">
                @if(isset($galleries) && $galleries != null)
                    @foreach($galleries as $gallery)
                        <a href="javascript:;" class="gallery-image">
                            <figure><img src="{{asset($gallery->link)}}" alt="Sample photo"></figure>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
