<section class="modal-wrapper-log">
    <div class="modal fade" id="sign-in-form" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="log-form" action="{{route('process.login')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h2 class="modal-title text-center">Sign in</h2>
                    </div>
                    <div class="modal-body">
                        <div class="field email-log-gin">
                            <i class="fal fa-envelope"></i>
                            <input type="text" name="emaillog" id="log-email" placeholder="Email"/>
                        </div>
                        <div class="field password-log-gin">
                            <i class="fal fa-lock-alt"></i>
                            <input type="password" name="password" id="log-password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="error"><span id="errorLog" class="text-danger"></span></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default submit-form-login"> <i class="fal fa-sign-in"></i> Sign in</button>
                        <div id="msg-success-login" style="display: none"><img class="loadingAnimate" src="{{asset('images/loading.svg')}}" alt="Loading"><p>Sending...</p></div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</section>
