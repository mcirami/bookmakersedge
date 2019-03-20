@extends('member.layouts.header')

@section('content')

    <div class="my_container">
        <div class="page_content full_width picks_page text-center">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content_wrap full_width form_wrapper d-inline-block">

                <form class="picks_form full_width" action="{{ url('/submit-picks/save') }}" method="post">

                    {{ csrf_field() }}

                    <h3 class="text-center">Make your picks below and submit for user to see</h3>
                    <div class="form-group my_row">
                        <p>Type in Format: Sport (eg. NFL) - City and Team (eg. St. Louis Cardinals) - Line (eg. -.75)</p>
                    </div>

                    <div class="full_width">
                        <div class="row mb-5">
                            <div class="col-10 col-md-11 col-lg-7 mx-auto d-flex justify-content-center">
                                <a id="add_pick" class="button yellow mr-2" href="#">Add Pick</a>
                                <a id="remove_pick" class="button black" href="#">Remove Pick</a>
                            </div>
                        </div>

                    </div>

                    <div class="picks_wrap full_width">

                        <div class="form-group my_row d-block d-sm-flex align-content-center pick_content">
                            <div class="icon_wrap mt-auto mb-4 mb-sm-auto ml-auto mr-0">
                                <h3>1</h3>
                            </div>
                            <div class="info_wrap m-auto d-block d-sm-flex justify-content-between">
                                <div class="column">
                                    <label for="sport1" class="col-form-label">{{ __('Sport') }}</label>

                                    <select class="form-control" name="pick_1[sport]" id="sport1" required>
                                        <option value=""></option>
                                        <option value="NFL">NFL</option>
                                        <option value="NCAAF">NCAAF</option>
                                        <option value="NBA">NBA</option>
                                        <option value="NCAAB">NCAAB</option>
                                        <option value="MLB">MLB</option>
                                        <option value="NHL">NHL</option>
                                        <option value="GOLF">GOLF</option>
                                    </select>

                                </div>

                                <div class="column">
                                    <label for="team1" class="col-form-label">{{ __('Team') }} </label>

                                    <input id="team1" type="text" class="form-control" name="pick_1[team]" value="{{ old('team1') }}" required autofocus>

                                    {{--@if ($errors->has('teamOne'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('teamOne') }}</strong>
                                        </span>
                                    @endif--}}
                                </div>

                                <div class="column">
                                    <label for="line1" class="col-form-label">{{ __('Line') }}</label>

                                    <input id="line1" type="text" class="form-control" name="pick_1[line]" value="{{ old('line1') }}" required autofocus>

                                   {{-- @if ($errors->has('lineOne'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lineOne') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                                <div class="column">
                                    <label for="time1" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                    <input id="time1" type="text" class="timepicker form-control" name="pick_1[game_time]"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my_row d-block d-sm-flex align-content-center pick_content">
                            <div class="icon_wrap mt-auto mb-4 mb-sm-auto ml-auto mr-0">
                                <h3>2</h3>
                            </div>
                            <div class="info_wrap m-auto d-block d-sm-flex justify-content-between">
                                <div class="column">
                                    <label for="sport2" class="col-form-label">{{ __('Sport') }}</label>

                                    <select class="form-control" name="pick_2[sport]" id="sport2" required>
                                        <option value=""></option>
                                        <option value="NFL">NFL</option>
                                        <option value="NCAAF">NCAAF</option>
                                        <option value="NBA">NBA</option>
                                        <option value="NCAAB">NCAAB</option>
                                        <option value="MLB">MLB</option>
                                        <option value="NHL">NHL</option>
                                        <option value="GOLF">GOLF</option>
                                    </select>
                                </div>

                                <div class="column">
                                    <label for="team2" class="col-form-label">{{ __('Team') }} </label>

                                    <input id="team2" type="text" class="form-control" name="pick_2[team]" value="{{ old('team2') }}" required autofocus>

                                    {{--@if ($errors->has('teamTwo'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('teamTwo') }}</strong>
                                        </span>
                                    @endif--}}
                                </div>

                                <div class="column">
                                    <label for="line2" class="col-form-label">{{ __('Line') }}</label>

                                    <input id="line2" type="text" class="form-control" name="pick_2[line]" value="{{ old('line2') }}" required autofocus>

                                    {{--@if ($errors->has('lineTwo'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lineTwo') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                                <div class="column">
                                    <label for="time2" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                    <input id="time2" type="text" class="timepicker form-control" name="pick_2[game_time]"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my_row d-block d-sm-flex align-content-center pick_content">
                            <div class="icon_wrap mt-auto mb-4 mb-sm-auto ml-auto mr-0">
                                <h3>3</h3>
                            </div>
                            <div class="info_wrap m-auto d-block d-sm-flex justify-content-between">
                                <div class="column">
                                    <label for="sport3" class="col-form-label">{{ __('Sport') }}</label>

                                    <select class="form-control" name="pick_3[sport]" id="sport3" required>
                                        <option value=""></option>
                                        <option value="NFL">NFL</option>
                                        <option value="NCAAF">NCAAF</option>
                                        <option value="NBA">NBA</option>
                                        <option value="NCAAB">NCAAB</option>
                                        <option value="MLB">MLB</option>
                                        <option value="NHL">NHL</option>
                                        <option value="GOLF">GOLF</option>
                                    </select>
                                </div>

                                <div class="column">
                                    <label for="team3" class="col-form-label">{{ __('Team') }} </label>

                                    <input id="team3" type="text" class="form-control" name="pick_3[team]" value="{{ old('team3') }}" required autofocus>

                                    {{--@if ($errors->has('teamThree'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('teamThree') }}</strong>
                                        </span>
                                    @endif--}}
                                </div>

                                <div class="column">
                                    <label for="line3" class="col-form-label">{{ __('Line') }}</label>

                                    <input id="line3" type="text" class="form-control" name="pick_3[line]" value="{{ old('line3') }}" required autofocus>

                                   {{-- @if ($errors->has('lineThree'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lineThree') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                                <div class="column">
                                    <label for="time3" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                    <input id="time3" type="text" class="timepicker form-control" name="pick_3[game_time]" />
                                </div>
                            </div>
                        </div>
                    </div><!-- picks_wrap -->

                    <div class="form-group my_row mt-4">
                        <div class="col-12">
                            <div class="submit_button_wrap">
                                <div id="form_submit_span" class="mb-2 text-center">
                                    <button name="picks_submit" id="picks_submits" class="button red">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div><!-- .container -->

@endsection