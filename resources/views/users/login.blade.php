<section class="modal-wrapper">
    <div class="modal fade" id="register-form" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="reg-form" action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h2 class="modal-title text-center">Register user</h2>
                    </div>
                    <div class="modal-body">
                        <div class="field username-reg">
                            <i class="fas fa-user-tag"></i>
                            <input style="transform: translateX(-4px);" type="text" name="username" id="username" placeholder="Your name"/>
                        </div>
                        <div class="field email-reg">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="email" id="email" placeholder="Email"/>
                        </div>
                        <div class="field password-reg">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>
                        <div class="field confirm-reg">
                            <i class="fas fa-key"></i>
                            <input style="transform: translateX(-2px);" type="password" name="confirm" id="confirm" placeholder="Confirm password"/>
                        </div>

                    </div>
                    <div class="error"><span id="errorReg" class="text-danger"></span></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default submit-form"> <i class="far fa-paper-plane"></i> Registers</button>
                        <div id="msg-success-reg" style="display: none"><img class="loadingAnimate" src="{{asset('images/loading.svg')}}" alt="Loading"><p>Sending...</p></div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</section>
