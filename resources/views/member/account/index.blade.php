@extends('member.layouts.header')

@section('content')

    <div class="my_container">
        <div id="member_account" class="d-block d-md-flex flex-row">

            <div class="column account mx-auto">

                <h3>My Account</h3>
                <div class="content_wrap full_width">

                    <ul>
                        <li><strong>Username:</strong> {{ $user->username }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>
                </div><!-- content_wrap -->
                <div class="buttons_wrap">
                    <a class="button black" href="/membership-account/update">Edit Info</a>
                    <a class="button yellow" href="/membership-account/change-password">Change Password</a>
                </div>
            </div>

            {{--<div class="column membership">

                <h3>My Membership</h3>
                <div class="content_wrap full_width ">
                    <p>To cancel your membership <a href="https://www.clkbank.com/#!/" target="_blank">Click Here</a> to contact Click Bank.</p>
                    <p>OR</p>
                    <p>Send us an email here: <a href="mailto:support@bookmakersedge.com">support@bookmakersedge.com</a></p>
                </div><!-- cotent_wrap -->

            </div>--}}
        </div>
    </div>

@endsection