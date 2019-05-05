@extends('layouts.master')
@section('content')
    <section class="profile-wrapper">
        <div class="container">
            @if(isset($user))
                <div class="profile">
                    <div class="avatar">
                        <div class="user-avatar">
                            <img class="img-fluid" src="{{$user->avatar}}" alt=""/>
                        </div>
                    </div>
                    <div class="profile-info">
                        <form action="{{route('process.updateProfile')}}" method="post" id="profileForm" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-info">
                                <label for="fullName"><i class="fal fa-user-tie"></i> Name:</label>
                                <input type="text" name="fullName" id="fullName" value="{{$user->name}}">

                                <label for="imageProfile"><i class="fal fa-user-circle"></i> Avatar:</label>
                                <input type="file" class="form-control" name="imageProfile" id="imageProfile">

                                <label for="emailProfile"><i class="fal fa-mailbox"></i> Email:</label>
                                <input type="text" name="email" readonly="readonly" id="emailProfile" value="{{$user->email}}">

                                @if(isset($profile))
                                <label for="birthDay"><i class="fal fa-birthday-cake"></i> Birth day:</label>
                                <input type="text" name="birthDay" id="birthDay" value="{{$profile->birth_day}}">

                                <label for="phoneProfile"><i class="fal fa-phone-volume"></i> Phone:</label>
                                <input type="text" name="phone" id="phoneProfile" value="{{$profile->phone}}">

                                <label for="addressProfile"><i class="fal fa-map-marker"></i> Address:</label>
                                <input type="text" name="address" id="addressProfile" value="{{$profile->address}}">

                                <label for="addressProfile"><i class="fab fa-facebook"></i> Facebook:</label>
                                <input type="text" name="facebook" id="facebookProfile" value="{{$profile->facebook_link}}">

                                <label for="addressProfile"><i class="fab fa-github"></i> Github:</label>
                                <input type="text" name="github" id="githubProfile" value="{{$profile->github_link}}">
                                    @endif
                            </div>
                            <div class="submit-profile">
                                <button type="submit"><i class="fal fa-user-edit"></i> Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
