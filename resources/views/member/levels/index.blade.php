@extends("member.layouts.header")

@section('content')
    <div class="my_container">
        <div class="page_content full_width">

            <div class="levels_table">

                @foreach ($plans as $plan)

                        <div class="column">
                            <div class="full_width">
                                @if($plan->name === "Annual")
                                    <div class="highlight">
                                        <img src="<?php echo asset('storage/site-images/bass-clef.png') ?>"><p>Most Bass For Your Buck!</p>
                                    </div>
                                @endif
                                <div class="column_heading full_width">
                                    <h2>FREE {{ $plan->trial_duration }} Day Trial</h2>
                                    <p>then only ${{ number_format($plan->cost, 2) }}
                                        @if($plan->name === "Monthly")
                                            /month
                                        @elseif($plan->name === "3 Months")
                                            /3 months
                                        @elseif($plan->name === "6 Months")
                                            /6 months
                                        @elseif($plan->name === "Annual")
                                            /year
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="full_width cost">
                                <h3>{{ $plan->name }}</h3>
                                <p>Recuring</p>
                                <p>Bass Nation Membership</p>
                                <div class="button_wrap full_width">
                                    <a class="yellow button round_button" href="{{ url('/membership-level', $plan->slug) }}">Get Started</a>
                                </div>
                            </div>
                            <div class="description full_width">
                                <ul>
                                    <li>
                                        <p>FREE for 3 days</p>
                                    </li>
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
                        </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection