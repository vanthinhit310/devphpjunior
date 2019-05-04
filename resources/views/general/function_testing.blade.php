@extends('layouts.master')
@section('content')
    <section class="test-pages-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="{{route('test.search_function')}}" method="get">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="text" name="search" placeholder="key here" class="form-control">
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
            </div>
        </div>
    </section>
    <br>
    <hr>
    <section class="search-results-wrapper">
        <div class="container">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                @if(isset($articles))
                    @foreach($articles as $article)
                        <div class="result text-left">
                            <h1>Article ID : {{$article->id}}</h1>
                            <h6>{{$article->tags}}</h6>
                            <hr>
                        </div>
                    @endforeach
                @else
                    <script>swal('Error!', 'No record', 'error');</script>
                @endif

            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </section>

@endsection
