@extends('layouts.master')
@section('content')
    <section class="update-password-wrapper">
        <div class="main">
            <div class="reset-pass">
                <form id="form-change-password" action="" method="post">
                    @csrf
                    <h2 class="title text-capitalize">Update password</h2>
                    <div class="form-email">
                        <div class="field-reset row">
                            <i class="fal fa-unlock-alt"></i>
                            <input type="password" name="current_password" id="currentPassword_update" placeholder="Current password"/>
                        </div>
                        <div class="field-reset row">
                            <i class="fal fa-unlock-alt"></i>
                            <input type="password" name="new_password" id="newPassword_update" placeholder="New password"/>
                        </div>
                        <div class="field-reset row">
                            <i class="fal fa-fingerprint"></i>
                            <input type="password" name="confirm" id="confirmUpdate" placeholder="Confirm"/>
                        </div>
                        <div><span class="errorStatus" style="color: red; font-size: 12px"></span></div>
                        <button type="button" id="submit-form-update"><i class="fal fa-pen-square"></i> Update
                        </button>
                        <div><span class="successStatus" style="color: green; font-size: 12px;"></span></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section style="height: 190px"></section>
@endsection
