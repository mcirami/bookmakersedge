@extends('member.layouts.header')

@section('content')

    <div class="my_container">
        <div class="member_home page_content full_width">
            @php
                $firstName = $user->first_name ;
                $username = $user->username;
            @endphp

            <h2>Welcome To Book Makers Edge, @php if ($firstName != NULL) { echo $firstName; } else { echo $username; } @endphp!</h2>

            <div class="full_width mt-5">

                <div class="reports text-left">

                    <h3 class="text-center">Today's Picks</h3>
                    <div class="my_row date text-center mb-3 pb-3">
                        <h2>{{$date}}</h2>
                    </div>
                    @foreach ($distinctDays as $day)

                        @if ($day->day->format('m-d-Y') == $date)


                            <div class="my_row">

                                @foreach ($picks as $pick)

                                    @if($pick->day == $day->day)

                                        <div class="my_row pick_row">

                                            <div class="row">
                                                <div class="col-2">
                                                    <p>{{$pick->sport}}</p>
                                                </div>
                                                <div class="col-4 col-sm-5">
                                                    <p>{{$pick->team}}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{$pick->line}}</p>
                                                </div>
                                                <div class="col-4 col-sm-3">
                                                    <p>{{$pick->game_time}} EST</p>
                                                </div>
                                                <div class="col-12">
                                                    <p>{{$pick->comment}}</p>
                                                </div>
                                            </div>

                                        </div><!-- pick_row -->
                                    @endif

                                @endforeach
                            </div><!-- pick_row -->

                        @endif

                    @endforeach

                </div><!-- reports -->
            </div>
        </div>
    </div><!-- .container -->

@endsection