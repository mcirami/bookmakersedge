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

            {{--<div class="column account">

                <h3>My Account</h3>
                <div class="content_wrap full_width">

                    @php
                        $subscriptionName = $user->subscriptions[0]['name'];

                        $memberName = $user->first_name . " " . $user->last_name;
                        if($memberName != " " || $memberName != NULL){
                            echo "<p>" . $memberName . "</p>";
                        }
                    @endphp
                    <ul>
                        <li><strong>Username:</strong> {{ $user->username }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>
                </div><!-- content_wrap -->
                <div class="buttons_wrap">
                    <a class="button black" href="#">Edit Profile</a>
                    <a class="button yellow" href="#">Change Password</a>
                </div>
            </div>--}}
            {{--<div class="column membership">

                <h3>My Membership</h3>
                <div class="content_wrap full_width ">
                    <div class="my_row">
                        <p class="label">Status:</p>
                        @php
                            if ($user->subscribed($subscriptionName) && !$user->subscription($subscriptionName)->cancelled()) {
                                echo "<p class='status active'>Active</p>";
                            } else {
                                echo "<p class='status inactive'>Inactive</p>";
                            }
                        @endphp

                    </div>
                    <div class="my_row">
                        <p class="label">Billing:</p>
                        @php
                            if ($user->subscribed($subscriptionName) && !$user->subscription($subscriptionName)->cancelled()) {
                                echo "<p class='cost'>$" . $plan->cost . "/" . $plan->name . " after your " . $plan->trial_duration . " day trial</p>";
                            } elseif ($user->subscription($subscriptionName)->onGracePeriod()) {
                                echo "<p class='cost'>Your membership is set to be cancelled on: " . $user->subscriptions[0]['ends_at']->format('m-d-Y') . "</p>";
                            } else {
                                echo "<p class='cost'>Your Membership Is Cancelled (you will no longer be billed)</p>";
                            }
                        @endphp
                    </div>
                </div><!-- cotent_wrap -->
                <div class="buttons_wrap">


                    <a class="button black" href="#">Update Billing Info</a>

                    <a class="button yellow" href="{{ url('/membership-account/upgrade') }}">Upgrade</a>

	                @php

                        if (!$user->subscription($subscriptionName)->cancelled() && !$user->subscription($subscriptionName)->onGracePeriod()) {
                    @endphp
                        <a class="button red" href="{{ url('/membership-account/cancel') }}">Cancel</a>
                    @php
                        }
                    @endphp
                </div>
            </div>--}}
        </div>
    </div>

@endsection