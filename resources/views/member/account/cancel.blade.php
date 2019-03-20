@extends('member.layouts.header')

@section('content')

    <div class="container">

        <div class="page_content text-center">

            <div id="account_cancel" class="content_wrap">

                <h2>Are you sure you want to cancel?</h2>
                <div class="copy_wrap">
                    <h4>You are paying LESS THAN $2.50/week for ALL of this:</h4>
                    <ul>
                        <li><p>1 brand new lesson each week directly from Daric!</p></li>
                        <li><p>Full access to message our entire community!</p></li>
                        <li><p>Advice from our entire community in the BN Forum</p></li>
                    </ul>
                    <h3>It's a true bargain!<br>We'd love for you to stick around and grow with us!</h3>
                </div>

                <div class="full_width">
                    <form action="{{ url('subscription/cancel') }}" method="post">
                        <button type="submit" class="button red">Yes - I'm Resigning from Bass Nation</button>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="full_width">
                    <a class="button yellow" href="#">No - Go To My Profile</a>
                </div>

            </div><!-- content_wrap -->
        </div>

    </div>

@endsection