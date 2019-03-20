

<footer id="global_footer" class="site_footer">
    <div class="my_container">
        <div class="content_wrap">
            <div class="logo">
                <a href="/">Book Makers Edge</a>
            </div>
            <div class="columns_wrap">
                <div class="column">
                    <div class="footer_menu">
                        <nav role="navigation">
                            <ul>
                                <li><a href="/">Home</a></li>
                                @role('provider')
                                    <li><a href="/submit-picks">Submit Picks</a></li>
                                @endrole
                                @role('provider')
                                    <li><a href="/grade-picks">Grade Picks</a></li>
                                @endrole
                                @role('subscriber')
                                    <li><a href="/our-method-member">Our Method</a></li>
                                @endrole
                                <li><a href="/reports">Reports</a></li>
                                <li><a href="/account">Account</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="copy">
            <ul>
                <li>
                    <p>&copy; Copyright Book Makers Edge LLC</p>
                </li>
                <li>
                    <a href="/">bookmakersedge.com</a>
                </li>
                <li>
                    <a href="/privacy-policy">Privacy Policy</a>
                </li>
                <li>
                    <a href="/terms-of-service">Terms Of Service</a>
                </li>
                <li>
                    <p>All Rights Reserved</p>
                </li>
            </ul>
        </div>
    </div><!-- .container -->
</footer>