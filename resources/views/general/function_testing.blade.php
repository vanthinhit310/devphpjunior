@extends('layouts.master')
@section('content')
    <section class="test-pages-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="{{route('test.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="file" name="imageTest" class="form-control">
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="submit">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
            </div>
        </div>
    </section>
@endsection
