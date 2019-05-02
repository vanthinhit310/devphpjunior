<section class="footer-wrapper">
    <footer id="beau-footer" class="footer-style-1">
        <div class='footer-area'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="text-2" class="clearfix widget_text">
                            <div class="textwidget">
                                @if(isset($about))
                                    <p style="text-align: center; margin-top: 60px;"><a target="_blank" style="margin-right: 30px;" href="{{$about->facebook}}"><i
                                                class="fab fa-facebook-square"></i> FACEBOOK</a> <a target="_blank" style="margin-right: 30px;" href="{{$about->skype}}"><i
                                                class="fab fa-skype"></i>SKYPE</a> <a target="_blank" style="margin-right: 30px;" href="{{$about->github}}"><i
                                                class="fab fa-github-square"></i> GITHUB</a> <a target="_blank" href="{{$about->linkedin}}"><i
                                                class="fab fa-linkedin"></i> LINKEDIN</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-copyright-bar">
            <em>&copy; 2019 All Right Reserved, develop by me!</em>
        </div>
    </footer>

</section>
