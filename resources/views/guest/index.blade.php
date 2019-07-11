@extends('guest.layouts.header')

@section('content')
    <div class="home_section page_content_home">
        <div class="hero full_width">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slide one"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide two"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide three"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide four"></div>
                    </div>
                </div>
            </div><!-- carousel -->
            <div class="hero_text">
                <div class="my_container">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <h2 class="text-uppercase mb-4">THERE IS NO SUCH THING AS A LOCK!</h2>
                            <h2 class="mb-4 sub_title">Don’t buy the bullshit, winning is about longterm success!</h2>
                            <div style="width:50%;height:0;padding-bottom:25%;position:relative; margin: 0 auto;"><iframe src="https://giphy.com/embed/mQvZiYEB2elvq" width="100%" height="100%" style="position:absolute; left:0; margin: 0 auto;" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p></p>
                            <h3><a class="text_link" href="/register">Signup NOW</a> and Get 7 Free Days</h3>
                            <div class="d-flex justify-content-center mb-5">
                                <h4 class="mr-3">Winner</h4>
                                <img class="mr-3 checkmark my-auto" src="<?php echo asset('images/check.png'); ?>" alt="">
                                <h4 class="mr-3">Winner</h4>
                                <img class="mr-3 checkmark my-auto" src="<?php echo asset('images/check.png'); ?>" alt="">
                                <h4>Chicken Dinner</h4>
                            </div>
                            <div class="button_wrap">
                                <a class="button yellow" href="/register">Join Now For Free!</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 mt-5 mt-md-0">
                            <div class="button_content">
                                <a class="row no-gutters cta_button" href="/register">
                                    <span class="col-7 text-left my-auto">7-Day Access</span>
                                    <span class="amount col-3 text-right my-auto pr-3">FREE</span>
                                    <span class="cta col-2 text-center">CLICK<br>HERE!</span>
                                </a>
                                <p>Free for 7 days then you will be asked to upgrade to keep access.</p>
                                <a class="row no-gutters cta_button" href="http://1.jvax157.pay.clickbank.net/?cbskin=24677" target="cb">
                                    <span class="col-6 text-left my-auto">30-Day Access</span>
                                    <span class="col-2 text-center small my-auto">One Time<br>Promo</span>
                                    <span class="amount col-2 text-right my-auto pr-3">$50</span>
                                    <span class="cta col-2 text-center">CLICK<br>HERE!</span>
                                </a>
                                <p>Your initial charge will be $50.00. You will then be charged $100.00 monthly.</p>
                                {{--<a class="row no-gutters cta_button" href="#" target="cb">
                                    <span class="col-7 text-left my-auto">30-Day Access</span>
                                    <span class="amount col-3 text-right my-auto pr-3">$100</span>
                                    <span class="cta col-2 text-center">CLICK<br>HERE!</span>
                                </a>
                                <p>Your initial charge will be $100.00. You will then be charged $100.00 monthly.</p>--}}
                                <img class="mt-5" src="<?php echo asset('images/payment-logos.png'); ?>" alt="">
                            </div>
                            @php
                                $winCount = 0;
                                $loseCount = 0;
                                $pushCount = 0;
                                $winPercent = 0;
                            @endphp
                            @if(!$picks->isEmpty())
                                @foreach ($picks as $pick)
                                    @php
                                        if($pick->grade == "w") {
                                            $winCount++;
                                        } elseif($pick->grade == "l") {
                                            $loseCount++;
                                        } elseif($pick->grade == "p/c") {
                                            $pushCount++;
                                        }
                                    @endphp
                                @endforeach
                                @php
                                    $totalGames = $winCount + $loseCount;
                                    $winPercent = round($winCount / $totalGames, 3) * 100
                                @endphp
                            @endif
                            <div class="row mt-2">
                                <div class="col-12">
                                    <h3>Our Last 21 Days:</h3>
                                    <h4 class="w-100 mb-4">Record: {{$winCount}}-{{$loseCount}}-{{$pushCount}}</h4>
                                    <h4 class="w-100">Winning PCT: {{$winPercent}}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- hero_text -->
            <div class="down_arrow">
                <p>MORE INFO</p>
                <a class="more_info" href="#method">
                    <img class="w-auto mx-auto" src="<?php echo asset('images/down-arrow.png'); ?>" alt="">
                </a>
            </div>
        </div><!-- hero -->
        <div class="full_width content_wrap" id="method">
            <div class="my_container">
                <div class="row text_wrap">
                    <div class="col-12">
                        <p><span>5-Star Lock, 10-Star Lock, 20-Star Guaranteed Lock, SEC Lock-of-the-Year, destroy you’re bookie weekend.</span></p>
                        <p>If you are reading this, you have probably seen these “Tout” declarations.  All Gimmicks.  Think about it.  You’re checking out the Don Best Schedule Booklet when you come across a banner proclaiming “Big 10 Pick of the Year.”  Really?!  The Booklet was printed a month prior to the schedule even starting!  Yet people fall for it.  Why?  Because they want a winner.</p>
                        <p><span>Let’s face it, sports gambling is exciting!</span>  Sports gambling is fun.  But sports gambling is tough business.  The best services, touts, game pickers, whatever you want to call them, have winning percentages of 58-61 percent.  That’s right, and these guys are the best in the business. </p>
                        <p>Most services provide less than 50 percent winners, and thus lose you money.  In other words, you’re paying for someone to pick losers for you.  As if paying the book isn’t bad enough!</p>
                        <p>Back in the day of phone calls to the Book, a friend of mine had business cards with his phone number and a line stating “Eleven to a Dime, Any Ol’ Time!”  Don’t let anyone try to tell you winning money on sports is easy pickens, it’s not.  But yet, you can win.</p>
                        <p>My partner and I are retired bookmakers with <span>over 70 years combined experience involving sports gambling.</span></p>
                        <p>We chose to get back in the game by offering this service. We’ve pretty much seen it all!</p>
                        <p>It’s a much different business these days compared to just 10 or 15 years ago.  The Internet has enabled line moves to occur almost simultaneously across the casinos and sports books.  Placing wagers can be a 24/7 proposition.  There are more games (many with teams you haven’t even heard of), more available lines, prop bets, even in-game wagering.  Hell, this year there were over 400 prop bets on the Super Bowl.  400!!  We have witnessed hot/cold streaks, winning/losing seasons, good/bad years.  But one thing hasn’t changed, and that’s what it takes to win. </p>
                        <p>You were curious, you’ve come this far, so take advantage of our <a href="/register">FREE 7 DAY TRIAL</a> and convince yourself.  You will be able to login and get access to our picks immediately.  Picks are submitted daily.  In addition to the picks, you will be able to follow a revolving 21 day history, with win percentage, and this is a no-strings attached offer.  If you like what you see, take the next step and sign up for our introductory rate at just $50 for 30 days.  So what are you waiting for?  Sign on and get started now.  <span>Becoming a winner is in your sights.</span> </p>
                        <a class="text-uppercase" href="/register">JOIN NOW TO LEARN MORE ABOUT OUR EXPERT METHOD AND IDEOLOGY</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- home_section -->

@stop
