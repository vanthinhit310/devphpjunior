<section class="header-wrapper">
    <div id="mobile-menu-container">
        <div id="mobile-menu-wrapper" class="mobile-menu">
            <ul id="menu-main-menu" class="menu">
                <li class="menu-item current-menu-item menu-item-has-children current_page_item"><a
                        href="{{route('app.home')}}">Home.<span class="caret"></span></a></li>
                <li class="menu-item"><a href="{{route('app.about')}}">About Us.</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a
                        href="{{route('app.blog')}}">Blog.<span class="caret"></span></a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a
                        href="javascript:;">Project.<span class="caret"></span></a>
                    <ul class="sub-menu">
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                        <li class="menu-item"><a href="javascript"><span class='resp-nav-gap'></span>Project</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="{{route('app.contacts')}}">Contact.</a></li>
                <li id="mobile-nav-search-container" class="menu-item">
                    <form class="searchform" method="get" action="#">
                        <input type="text" placeholder="Search Here ..." name="s" autocomplete="off"
                               spellcheck="false"/>
                        <label><i class='fa fa-search'></i></label>
                        <input type="submit" class="hidden"/>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <header id="beau-header" class="header-style-1">
        <nav class="container">
            <div class="mobile-nav">
                <button type="button" id="navbar-toggle" class="toggle-button" data-target="mobile-menu-container">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="logo-header">
                <a class="logo" href="{{route('app.home')}}">
                    <img src="{{asset('images/logo.svg')}}" alt="Logo"/>
                </a>
            </div>

            <div class="nav-wrapper">
                <div id="main-menu-wrapper" class="main-menu">
                    @auth
                        <ul id="menu-main-menu-1" class="menu">
                            <li class="menu-item current-menu-item menu-item-has-children current_page_item"><a
                                    href="{{route('app.home')}}">Home.<span class="caret"></span></a></li>
                            <li class="menu-item"><a href="{{route('app.about')}}">About Us.</a></li>
                            <li class="menu-item"><a href="{{route('app.blog')}}">Blog.<span class="caret"></span></a>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                                <a
                                    href="javascript:;">Project.<span class="caret"></span></a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="javascript:;"><span class='resp-nav-gap'></span>Log
                                            daily's
                                            <i class="fal fa-caret-right"></i></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{route('app.log-index')}}"><i
                                                        class="fal fa-blog"></i> Create</a></li>
                                            <li class="menu-item"><a href="{{route('app.logDailyPage')}}"><i
                                                        class="fal fa-clipboard-list-check"></i> List</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a href="javascript:;"><span class='resp-nav-gap'></span>Project
                                            <i class="fal fa-caret-right"></i></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{route('app.cropImage')}}">Crop image</a></li>
                                            <li class="menu-item"><a href="{{route('practice.qrCode')}}">QRCode</a></li>
                                            <li class="menu-item"><a href="{{route('app.wife')}}">Wife</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="{{route('app.contacts')}}">Contact.</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                                <a
                                    href="javascript:;">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a
                                            href="{{route('app.profile')}}\{{\Illuminate\Support\Facades\Auth::user()->id}}"><i
                                                class="fal fa-address-card"></i>
                                            Your profile</a></li>
                                    <li class="menu-item"><a href="{{route('process.logout')}}"><i
                                                class="fal fa-sign-out-alt"></i> Sign out</a></li>
                                    <li class="menu-item"><a href="{{route('app.update')}}"><i
                                                class="fal fa-edit"></i>
                                            Change password</a></li>
                                </ul>
                            </li>
                            <div class="header-avatar"><a
                                    href="{{route('app.profile')}}\{{\Illuminate\Support\Facades\Auth::user()->id}}"><img
                                        class="img-fluid" src="{{Auth::user()->avatar}}" alt=""></a></div>
                        </ul>
                    @else
                        <ul id="menu-main-menu-1" class="menu">
                            <li class="menu-item current-menu-item menu-item-has-children current_page_item"><a
                                    href="{{route('app.home')}}">Home.<span class="caret"></span></a></li>
                            <li class="menu-item"><a href="{{route('app.about')}}">About Us.</a></li>
                            <li class="menu-item"><a href="{{route('app.blog')}}">Blog.<span class="caret"></span></a>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                                <a
                                    href="javascript:;">Project.<span class="caret"></span></a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="javascript:;"><span class='resp-nav-gap'></span>Practices
                                            <i class="fal fa-caret-right"></i></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{route('app.cropImage')}}">Crop image</a></li>
                                            <li class="menu-item"><a href="{{route('practice.qrCode')}}">QRCode</a></li>
                                            <li class="menu-item"><a href="{{route('app.wife')}}">Wife</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="{{route('app.contacts')}}">Contact.</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a
                                    href="javascript:;"><i class="fal fa-user-secret"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a data-toggle="modal" data-target="#register-form"
                                                             href="javascript:;"><i class="fas fa-user-plus"></i>
                                            Register</a></li>
                                    <li class="menu-item"><a data-toggle="modal" data-target="#sign-in-form"
                                                             href="javascript:;"><i class="fal fa-sign-in-alt"></i> Sign
                                            in</a>
                                    </li>
                                    <li class="menu-item"><a href="{{route('process.logout')}}"><i
                                                class="fal fa-sign-out-alt"></i> Sign out</a></li>
                                    <li class="menu-item"><a href="{{route('app.reset')}}"><i
                                                class="fal fa-key"></i> Reset password</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

</section>
