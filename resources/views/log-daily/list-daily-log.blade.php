@extends('layouts.master')
@section('content')
    <section class="list-log-daily-wrapper">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2 class="text-center text-uppercase"><i class="fal fa-cannabis"></i> logs daily <i class="fal fa-cannabis"></i></h2>
                </div>
                <div class="row log">
                    <div class="col"></div>
                    <div id="load-data" class="text-center text-justify col-8 log-content">
                        @if(isset($logs))
                            @foreach($logs as $log)
                                <div class="each-log">
                                    <h3 class="title text-capitalize"><i class="fab fa-hotjar"></i> {{$log->title}}
                                    </h3>
                                    <div class="log-body">
                                        @if(strlen(strip_tags($log->content)) > 100)
                                            <span>{{substr(strip_tags($log->content), 0, 100)}} ...</span>
                                        @else
                                            <span>{{substr(strip_tags($log->content), 0, 100)}}</span>
                                        @endif
                                    </div>
                                    <span class="author"><i
                                            class="fal fa-user-chart"></i> Write by : <strong>{{$log->private_author}}</strong></span>
                                    <span class="cre-date"><i
                                            class="fal fa-calendar-star"></i> <strong>{{$log->cre_date}}</strong></span>
                                    <a href="javascript:;">
                                        <span class="read-more"><i class="fal fa-comment-dots"></i> Read more</span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        @if(isset($log))
                            <div id="remove-row">
                                <button id="btn-more" data-id="{{$log->id}}"
                                        class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                    Load More
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
