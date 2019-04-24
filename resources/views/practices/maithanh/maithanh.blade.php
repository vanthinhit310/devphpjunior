<style>
    .swiper-container {
        width: 300px;
        height: 400px;
        margin: 0 auto;
    }
</style>
<section class="maithanh-wrapper">
    <div class="container">
        {{--<div class="swiper-container">--}}
            {{--<!-- Additional required wrapper -->--}}
            {{--<div class="swiper-wrapper">--}}
                {{--<!-- Slides -->--}}
                {{--@foreach($garellies as $garellie)--}}
                    {{--<div class="swiper-slide"><img src="{{$garellie->link}}" alt="{{$garellie->slug}}"></div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
            {{--<!-- If we need pagination -->--}}
            {{--<div class="swiper-pagination"></div>--}}

        {{--</div>--}}


        <div class="simpleslide100">
            <div class="simpleslide100-item bg-img1" style="background-image: url('https://i.imgur.com/R14PCiU.jpg');"></div>
            <div class="simpleslide100-item bg-img1" style="background-image: url('https://i.imgur.com/0qWb8xY.jpg');"></div>
            <div class="simpleslide100-item bg-img1" style="background-image: url('https://i.imgur.com/FXWZCII.jpg');"></div>
            <div class="simpleslide100-item bg-img1" style="background-image: url('https://i.imgur.com/13kGdhw.jpg');"></div>
        </div>

        <div class="flex-col-c-sb size1 overlay1">
            <div class="flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-120">
                <h3 class="l1-txt1 txt-center p-b-35 respon1">
                    We have been in love for
                </h3>

                <div class="flex-w flex-c cd100 respon2">
                    <div class="flex-col-c wsize1 m-b-30">
                        <span id="day" class="l1-txt2 p-b-37 days"></span>
                        <span class="m1-txt2 p-r-20">Days</span>
                    </div>

                    <span class="l1-txt2 p-t-15 dis-none-sm">:</span>

                    <div class="flex-col-c wsize1 m-b-30">
                        <span id="hour" class="l1-txt2 p-b-37 hours"></span>
                        <span class="m1-txt2 p-r-20">Hours</span>
                    </div>

                    <span class="l1-txt2 p-t-15 dis-none-lg">:</span>

                    <div class="flex-col-c wsize1 m-b-30">
                        <span id="minutes" class="l1-txt2 p-b-37 minutes"></span>
                        <span class="m1-txt2 p-r-20">Minutes</span>
                    </div>

                    <span class="l1-txt2 p-t-15 dis-none-sm">:</span>

                    <div class="flex-col-c wsize1 m-b-30">
                        <span id="seconds" class="l1-txt2 p-b-37 seconds"></span>
                        <span class="m1-txt2 p-r-20">Seconds</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
