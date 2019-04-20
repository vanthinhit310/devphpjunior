<section class="header-wrapper">

    <div id="mobile-menu-container">
        <div id="mobile-menu-wrapper" class="mobile-menu">
            <ul id="menu-main-menu" class="menu">
                <li class="menu-item current-menu-item menu-item-has-children current_page_item"><a href="{{route('app.home')}}">Home.<span class="caret"></span></a></li>
                <li class="menu-item"><a href="{{route('app.about')}}">About Us.</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="{{route('app.blog')}}">Blog.<span class="caret"></span></a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="javascript:;">Project.<span class="caret"></span></a>
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
                        <input type="text" placeholder="Search Here ..." name="s" autocomplete="off" spellcheck="false" />
                        <label><i class='fa fa-search'></i></label>
                        <input type="submit" class="hidden" />
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
                <a class="logo" href="#">
                    <img src="images/logo.png" alt="Logo" />
                </a>
            </div>

            <div class="nav-wrapper">
                <div id="main-menu-wrapper" class="main-menu">
                    <ul id="menu-main-menu-1" class="menu">
                        <li class="menu-item current-menu-item menu-item-has-children current_page_item"><a href="{{route('app.home')}}">Home.<span class="caret"></span></a></li>
                        <li class="menu-item"><a href="{{route('app.about')}}">About Us.</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="{{route('app.blog')}}">Blog.<span class="caret"></span></a>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="javascript:;">Project.<span class="caret"></span></a>
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
                        </li>
                        <li class="menu-item"><a href="{{route('app.contacts')}}">Contact.</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</section>
