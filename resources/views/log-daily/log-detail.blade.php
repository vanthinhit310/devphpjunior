@extends('layouts.master')
@section('content')
    <section class="log-detail-wrapper">
        <div class="container">
            @if(isset($details))
                <div class="content text-justify">
                    <div class="title">
                        <h2 class="text-center"><i class="fal fa-hand-point-right"></i> {{$details->title}}</h2>
                        <div class="row info">
                            <div class="author">
                                <q><i class="fal fa-user-chart"></i> {{$details->private_author}}</q>
                                <span><i class="fal fa-calendar-star"></i> {{$details->cre_date}}</span>
                            </div>
                            <div class="return-list">
                                <a href="{{ URL::previous() }}">
                                    <button><i class="fal fa-list-ul"></i> Return list
                                    </button>
                                </a>
                                <a href="javascript:;">
                                    <button><i class="fal fa-file-pdf"></i> Export PDF
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="detail-content">
                        {!! $details->content !!}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
