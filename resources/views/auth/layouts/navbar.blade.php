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
                            <a class="nav-link @if(Route::currentRouteName() == "Home Page") active @endif" href="/member-home">Home</a>
                        </li>
                        @role('provider')
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == "Make Your Picks") active @endif" href="/submit-picks/">Submit Picks</a>
                        </li>
                        @endrole
                        @role('provider')
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == "Grade Your Picks") active @endif" href="/grade-picks/">Grade Picks</a>
                        </li>
                        @endrole
                        @role('subscriber')
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == "Our Method") active @endif" href="/our-method-member">Our Method</a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link  @if(Route::currentRouteName() == "Reports") active @endif" href="/reports/">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if(Route::currentRouteName() == "Account") active @endif" href="/membership-account">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div><!-- menu -->
    </div><!-- my_container -->
</div><!-- header_bottom -->

