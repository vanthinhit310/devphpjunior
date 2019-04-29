@extends('layouts.master')
@section('content')
<section class="change-password-wrapper">
    <div class="main">
        <div class="reset-pass">
            <form id="form-change-password" action="{{route('process.change-Password')}}" method="post">
                @csrf
                <input type="hidden" name="email" value="{{session('email')}}">
                <h2 class="title text-capitalize">Change password</h2>
                <div class="form-email">
                    <div class="field-reset row">
                        <i class="fal fa-unlock-alt"></i>
                        <input type="password" name="new_password" id="newPassword" placeholder="New password"/>
                    </div>
                    <div class="field-reset row">
                        <i class="fal fa-fingerprint"></i>
                        <input type="password" name="confirm" id="confirmChange" placeholder="Confirm"/>
                    </div>
                    <div><span class="errorStatus" style="color: red; font-size: 12px"></span></div>
                    <button type="button" id="submit-form-change"><i class="fal fa-pen-square"></i> Update
                    </button>
                    <div><span class="successStatus" style="color: green; font-size: 12px;"></span></div>
                </div>
            </form>
        </div>
    </div>
</section>
<section style="height: 190px"></section>
@endsection
