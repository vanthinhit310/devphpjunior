@extends('layouts.master')
@section('content')
    <section class="search-results-wrapper">
        <div class="container">
            @if(isset($search_count) && $search_count > 0)
                <div class="search-result-content">
                    <div class="title">
                        @if(isset($search_key))
                            <h2 class="text-uppercase">
                                Có {{$search_count ?? '0'}} kết quả tìm kiếm cho từ khóa "{{$search_key}}"
                            </h2>
                        @endif
                    </div>
                    <div class="row">
                        <div class="left-info col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="left-content">
                                @if(isset($search_results))
                                    @foreach($search_results as $result)
                                        <div class="result">
                                            <a href="{{route('app.post')}}/{{$result->getPostCategory->slug}}/{{$result->slug}}" data-placement="bottom" data-toggle="tooltip" title="{{$result->title}}">
                                                <h3 class="text-capitalize">{{substr(strip_tags($result->title), 0, 65)}}...</h3>
                                            </a>
                                            <p class="description">{{$result->description}}</p>
                                            <span class="tag">{{$result->key_work}}</span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="right-info col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div id="search-2" class="beau-main-sidebar clearfix widget_search">
                                <form method="get" id="search-form" class="search-form" action="{{route('process.search')}}">
                                    <label>
                                        <input type="text" class="search-field"
                                               placeholder="Enter key word here &hellip;"
                                               value="" name="search"/>
                                    </label>
                                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="right-content">
                                <h3 class="top-search-title text-uppercase">hot key words</h3>
                                <div class="top-search-content">
                                    @if(isset($hot_keys))
                                        @foreach($hot_keys as $hot_key)
                                            <a class="search-value" href="javascript:;">{{$hot_key->key}}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-danger notify">No results for this key word! Please try another key word!</p>
                <button class="go-back" type="button"><a href="{{ URL::previous() }}"><i class="fal fa-arrow-square-left"></i> Back</a></button>
            @endif
        </div>
    </section>
@endsection
