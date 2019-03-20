<div class="header_bottom background">
    <div class="my_container">
        <div class="menu">
            <nav class="navbar navbar-expand-md d-flex align-content-center">
                <a class="navbar-brand align-self-start logo" href="/">Book Makers Edge</a>
                <a class="mobile_menu_icon" aria-controls="navbarNav" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <div class="align-self-end justify-content-end" id="navbarNav">
                    <a class="mobile_menu_logo" href="/">Book Makers Edge</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == "guest.home") active @endif" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == "Register Free Now") active @endif" href="/register">Sign Up Free</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if(Route::currentRouteName() == "login") active @endif" href="/login">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div><!-- menu -->
    </div><!-- my_container -->
</div><!-- header_bottom -->

