@extends('member.layouts.header')

@section('content')

    <div class="my_container">
        <div class="page_content full_width text-center">

            <h2 class="mb-2 mb-md-4 mb-lg-5">21 Day Report</h2>

            <div class="reports text-left">

                @php
                    $totalWinCount = 0;
                    $totalLoseCount = 0;
                    $totalPushCount = 0;
                    $dayCount = 0;
                @endphp

                @if (!$picks->isEmpty())

                    <div class="accordion my_row" id="reportAccordion">

                        @foreach ($distinctDays as $day)

                                @php $dayCount++ @endphp
                                <div class="my_row date ">
                                    <h2>{{$day->day->format('m-d-Y')}}</h2>
                                </div>
                                <div class="my_row day">

                                    <div class="my_row results d-flex justify-content-between">

                                        @php
                                            $dayWinCount = 0;
                                            $dayLoseCount = 0;
                                            $dayPushCount = 0;
                                            $pickNumber = 0;
                                        @endphp

                                        @foreach ($picks as $pick)
                                            @if($pick->day == $day->day && $pick->grade != Null)
                                                @php $pickNumber++; @endphp
                                                <div class="column">
                                                    <h3>Pick @php echo $pickNumber; @endphp</h3>
                                                    <p class="text-uppercase">{{$pick->grade}}</p>
                                                    @php
                                                        if($pick->grade == "w") {
                                                            $dayWinCount++;
                                                            $totalWinCount++;
                                                        } elseif($pick->grade == "l") {
                                                            $dayLoseCount++;
                                                            $totalLoseCount++;
                                                        } elseif($pick->grade == "p") {
                                                            $dayPushCount++;
                                                            $totalPushCount++;
                                                        }
                                                    @endphp
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="column">
                                            <h3>Record</h3>
                                            <h4>
                                                @php
                                                    echo $dayWinCount . "-" . $dayLoseCount . "-" . $dayPushCount;
                                                @endphp
                                            </h4>
                                        </div>
                                        <div class="column">
                                            <img class="open_accordion" src="<?php echo asset('/images/triangle-black-down.png') ?>" alt="" data-toggle="collapse" data-target="#collapse@php echo $dayCount @endphp" aria-expanded="true" aria-controls="collapse@php echo $dayCount @endphp">
                                        </div>

                                    </div>

                                    <div class="picks_wrap collapse my_row" id="collapse@php echo $dayCount @endphp" data-parent="#reportAccordion">

                                        @foreach ($picks as $pick)

                                            @if($pick->day == $day->day && $pick->grade != Null)

                                                <div class="my_row pick_row">

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <p>{{$pick->sport}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p>{{$pick->team}}</p>
                                                        </div>
                                                        <div class="col-2 col-sm-3">
                                                            <p>{{$pick->line}}</p>
                                                        </div>
                                                        <div class="col-2 col-sm-1">
                                                            <p class="text-uppercase">{{$pick->grade}}</p>
                                                        </div>
                                                    </div>

                                                </div><!-- pick_row -->
                                            @endif

                                        @endforeach
                                    </div>
                                </div><!-- my_row day -->

                        @endforeach

                    </div><!-- accordion -->

                    <div class="my_row total">
                        <h3>Record Total: @php echo $totalWinCount . "-" . $totalLoseCount . "-" .  $totalPushCount;@endphp</h3>
                        @php
                            $totalGames = $totalWinCount + $totalLoseCount;
                            $winPercent = round($totalWinCount / $totalGames, 3) * 100;
                        @endphp
                        <h3>Winning PCT: @php echo $winPercent @endphp%</h3>
                    </div>
                @else
                    <h3 class="text-center">There is nothing to report</h3>
                @endif
            </div><!-- reports -->

        </div><!-- page_content -->
    </div><!-- my_container -->

@endsection