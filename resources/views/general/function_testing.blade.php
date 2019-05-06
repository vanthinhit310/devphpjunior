@extends('layouts.master')
@section('content')
    <section class="test-pages-wrapper">
        <div class="container">
            <div class="row">
                <div class="test-content">
                    <form action="{{route('test.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <select name="city" id="cityTest" class="custom-select">
                                <option value=""> City</option>
                                @if(isset($cities))
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                @endif
                            </select>

                            <select name="district" id="districtTest" class="custom-select">
                                <option value=""> District</option>
                            </select>

                            <select name="ward" id="wardTest" class="custom-select">
                                <option value=""> Ward</option>
                            </select>
                        </div>
                        <button type="submit"> submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
