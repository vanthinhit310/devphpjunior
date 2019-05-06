@extends('layouts.master')
@section('content')
    <section class="profile-wrapper">
        <div class="container">
            <div class="profile">
                <div class="avatar">
                    <div class="user-avatar">
                        <img class="img-fluid" src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt=""/>
                    </div>
                </div>
                <div class="profile-info">
                    <form action="{{route('process.updateProfile')}}" method="post" id="profileForm"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="basic-info">
                            <label for="fullName"><i class="fal fa-user-tie"></i> Name:</label>
                            <input type="text" name="fullName" id="fullName" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">

                            <label for="imageProfile"><i class="fal fa-user-circle"></i> Avatar:</label>
                            <input type="file" class="form-control" name="image" id="imageProfile">

                            <label for="emailProfile"><i class="fal fa-mailbox"></i> Email:</label>
                            <input type="text" name="email" readonly="readonly" id="emailProfile"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                            @if(isset($profile))
                                <label for="birthDay"><i class="fal fa-birthday-cake"></i> Birth day:</label>
                                <input type="text" name="birthDay" id="birthDay" value="{{$profile->birth_day}}">

                                <label for="phoneProfile"><i class="fal fa-phone-volume"></i> Phone:</label>
                                <input type="text" name="phone" id="phoneProfile" value="{{$profile->phone}}">

                                <div class="row address-select-custom">
                                    <select name="city" id="city_profile" class="custom-select">
                                        <option value=""> City</option>
                                        @if(isset($cities))
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <select name="district" id="district_profile" class="custom-select">
                                        <option value=""> District</option>
                                    </select>

                                    <select name="ward" id="ward_profile" class="custom-select">
                                        <option value=""> Ward</option>
                                    </select>
                                </div>

                                <label for="addressProfile"><i class="fal fa-map-marker"></i> Address:</label>
                                <input type="text" name="address" id="addressProfile" value="{{$profile->address}}">

                                <label for="addressProfile"><i class="fab fa-facebook"></i> Facebook:</label>
                                <input type="text" name="facebook" id="facebookProfile"
                                       value="{{$profile->facebook_link}}">

                                <label for="addressProfile"><i class="fab fa-github"></i> Github:</label>
                                <input type="text" name="github" id="githubProfile"
                                       value="{{$profile->github_link}}">
                            @else
                                <label for="birthDay"><i class="fal fa-birthday-cake"></i> Birth day:</label>
                                <input type="text" name="birthDay" id="birthDay">

                                <label for="phoneProfile"><i class="fal fa-phone-volume"></i> Phone:</label>
                                <input type="text" name="phone" id="phoneProfile">

                                <div class="row address-select-custom">
                                    <select name="city" id="city_profile" class="custom-select">
                                        <option value=""> City</option>
                                        @if(isset($cities))
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <select name="district" id="district_profile" class="custom-select">
                                        <option value=""> District</option>
                                    </select>

                                    <select name="ward" id="ward_profile" class="custom-select">
                                        <option value=""> Ward</option>
                                    </select>
                                </div>

                                <label for="addressProfile"><i class="fal fa-map-marker"></i> Address:</label>
                                <input type="text" name="address" id="addressProfile">

                                <label for="addressProfile"><i class="fab fa-facebook"></i> Facebook:</label>
                                <input type="text" name="facebook" id="facebookProfile">

                                <label for="addressProfile"><i class="fab fa-github"></i> Github:</label>
                                <input type="text" name="github" id="githubProfile">
                            @endif
                        </div>
                        <div class="submit-profile">
                            <button type="submit"><i class="fal fa-user-edit"></i> Update Profile</button>
                        </div>
                        <div style="display: none" id="profile-loading" class="dot-loading"><img
                                src="{{asset('images/dot.svg')}}" alt="Loading"></div>
                        @if ($errors->any())
                            <div class="error-zone">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger"><i class="fal fa-exclamation-circle"></i> {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
