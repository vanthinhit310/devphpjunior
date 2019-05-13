<script>
    var get_more_wife_image = '{{route('process.loadWifeImage')}}';
</script>
@extends('layouts.master')
@section('content')
    <section class="wife-wrapper">
        <div class="container">
            <div class="main-content">
                <h3 class="text-center text-uppercase">our memories</h3>
                <div class="swiper-container wife">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    @if(isset($garellies) && $garellies != null)
                        <!-- Slides -->
                            @foreach($garellies as $garellie)
                                {{--<div class="swiper-slide"><img src="{{asset($garellie->link)}}" alt="Wife"></div>--}}
                                <div class="swiper-slide wife-slide"
                                     style="background-image:url({{asset($garellie->link)}})"></div>
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
            @if(isset($gallery))
                <div class="load-more" id="wife-remove">
                    <button id="wife-load-more" data-id="{{$gallery->id}}">Load more</button>
                </div>
            @endif
        </div>
    </section>
@endsection
