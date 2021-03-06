@extends('member.layouts.inactive.header')

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
            <div class="hero_text inactive">
                <div class="my_container">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h2 class="text-uppercase">Sorry, Your Free Trial has expired...</h2>
                            <h3 class="d-inline-block w-100">Don't miss out! </h3>
                            <h3 class="d-inline-block w-100">If you liked what you saw, <br>take the next step and sign up! </h3>
                            <h3 class="mb-5 d-inline-block w-100">Our introductory rate is just<br> $50 for 30 days!</h3>
                            <a class="button yellow" href="http://1.jvax157.pay.clickbank.net/?cbskin=24677&email={{$email}}&name={{$name}}">Click Here To Join!</a>
                        </div>
                        <div class="col-12 col-md-4 mt-5 mt-md-0">
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
                                    <h3 class="mt-0">Our Last 21 Days:</h3>
                                    <h4 class="w-100 mb-4">Record: {{$winCount}}-{{$loseCount}}-{{$pushCount}}</h4>
                                    <h4 class="w-100">Winning PCT: {{$winPercent}}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- hero_text -->
        </div><!-- hero -->
    </div>

@endsection