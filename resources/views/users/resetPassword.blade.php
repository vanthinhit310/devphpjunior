@extends('layouts.master')
@section('content')
    <section class="reset-password-wrapper">
        <div class="reset-pass">
            <form id="form-reset-password" action="{{route('process.reset')}}" method="post">
                @csrf
                <h2 class="title text-capitalize">Get new password</h2>
                <div class="form-email">
                    <div class="field-reset row">
                        <i class="fal fa-envelope"></i>
                        <input type="text" name="email_reset" id="emailReset" placeholder="Your email"/>
                    </div>
                    <div><span class="errorStatus" style="color: red; font-size: 12px"></span></div>
                    <button type="button" id="submit-form-reset"><i class="fal fa-arrow-circle-right"></i> Get new
                        password
                    </button>
                    <div><span class="successStatus" style="color: green; font-size: 12px;"></span></div>
                </div>
            </form>
        </div>
    </section>
    <section style="height: 200px"></section>
@endsection
