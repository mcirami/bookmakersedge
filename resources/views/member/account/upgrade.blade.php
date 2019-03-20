@extends("member.layouts.header")

@php
    $subscriptionName = $user->subscriptions[0]['name'];
@endphp


@section('content')
    <div class="my_container">
        <div class="page_content full_width">

            <div class="levels_table">

                @foreach ($plans as $plan)

                    <div class="column @auth @if ($user->subscribed($subscriptionName) && $subscriptionName === $plan->name && !$user->subscription($subscriptionName)->cancelled())current_membership @endif @endauth">
                        <div class="full_width">
                            @if($plan->name === "Annual")
                                <div class="highlight">
                                    <img src="<?php echo asset('storage/site-images/bass-clef.png') ?>"><p>Most Bass For Your Buck!</p>
                                </div>
                            @endif
                            <div class="column_heading full_width">
                                <h4>Only ${{ number_format($plan->cost, 2) }}
                                    @if($plan->name === "Monthly")
                                        /month
                                    @elseif($plan->name === "3 Months")
                                        /3 months
                                    @elseif($plan->name === "6 Months")
                                        /6 months
                                    @elseif($plan->name === "Annual")
                                        /year
                                    @endif
                                </h4>
                            </div>
                        </div>
                        <div class="full_width cost">
                            <h3>{{ $plan->name }}</h3>
                            <p>Recuring</p>
                            <p>Bass Nation Membership</p>
                            @auth
                                @if ($user->subscribed($subscriptionName) && $subscriptionName === $plan->name && !$user->subscription($subscriptionName)->cancelled())
                                    <div class="button_wrap full_width">
                                        <a class="yellow button round_button" href="#">Your Level</a>
                                    </div>
                                @else
                                    <div class="button_wrap full_width">
                                        <form action="{{ url('subscription/upgrade') }}" method="post">
                                            <input type="hidden" name="plan" value="{{ $plan->braintree_plan }}">
                                            <button type="submit" class="yellow button round_button">Change Level</button>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <div class="description full_width">
                            <ul>
                                <li>
                                    <p>ALL Complete Lessons</p>
                                </li>
                                <li>
                                    <p>Lesson Commenting</p>
                                </li>
                                <li>
                                    <p>Bass Nation Forum Access</p>
                                </li>
                                <li>
                                    <p>Member Directory</p>
                                </li>
                                <li>
                                    <p>Messaging System</p>
                                </li>
                            </ul>
                        </div>

                        {{--@if ($plan->description)
                            <p>{{ $plan->description }}</p>
                        @endif--}}
                    </div>


                @endforeach

            </div>
        </div>

    </div>
@endsection