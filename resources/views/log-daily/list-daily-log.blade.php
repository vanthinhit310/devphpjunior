@extends('layouts.master')
@section('content')
    <section class="list-log-daily-wrapper">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2 class="text-center text-uppercase"> logs daily </h2>
                </div>
                <div class="row log">
                    <div class="col"></div>
                    <div id="load-data" class="text-center text-justify col-8 log-content">
                        @if(isset($logs))
                            @foreach($logs as $log)
                                <div class="each-log">
                                    <a href="javascript:;">
                                        <h3 class="title text-capitalize"><i class="fab fa-hotjar"></i> {{$log->title}}
                                        </h3>
                                        <div><span>
                                                {{substr(strip_tags($log->content), 0, 500)}}
                                            </span></div>
                                        <span class="author"><i
                                                class="fal fa-user-chart"></i> Write by : {{$log->private_author}}</span>
                                        <span class="read-more">Read more <i
                                                class="fal fa-angle-double-right"></i></span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        <div id="remove-row">
                            <button id="btn-more" data-id="{{$log->id}}"
                                    class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                Load More
                            </button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
