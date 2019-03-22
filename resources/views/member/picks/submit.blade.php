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

            @if(!$todaysPicks->isEmpty())
                <div class="form_wrapper mb-5 row update_picks_form">
                    <h3 class="text-center w-100 pb-3">Picks You Submitted Today</h3>

                    @php $count  = 0 @endphp

                    @foreach($todaysPicks as $pick)
                        @php $count++ @endphp
                        <form class="col-12" action="{{ url('/submit-picks/update') }}" method="post">

                            {{ csrf_field() }}
                            <div class="row pick_row current_picks">
                                <div class="col-12 mb-3">
                                    <h4 class="font-weight-bold">Submitted at: {{$pick['updated_at']->format('h:i')}} EST </h4>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <p>{{$pick['sport']}}</p>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <p>{{$pick['team']}}</p>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <p>{{$pick['line']}}</p>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <p>{{$pick['game_time']}} EST</p>
                                </div>
                                <div class="col-12 col-sm-2">
                                    @if(strtotime($now) < strtotime($pick['game_time']))
                                        <button name="picks_edit" class="button black w-100 d-block edit_pick">Edit</button>
                                    @else
                                       <p>Game Started</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row pick_row text-left" style="display: none;">
                                <input type="hidden" name="pick_id" value="{{$pick['id']}}">
                                <div class="col-12">
                                    <img class="cancel" src="<?php echo asset('images/close-button.png'); ?>" alt="">
                                </div>
                                <div class="col-12 col-md-2">
                                    <label for="sport{{$count}}" class="col-form-label">{{ __('Sport') }}</label>

                                    <select class="form-control" name="sport" id="sport{{$count}}" required>
                                        <option value=""></option>
                                        <option value="NFL" @php if( $pick['sport'] == "NFL") echo 'selected' @endphp >NFL</option>
                                        <option value="NCAAF" @php if( $pick['sport'] == "NCAAF") echo 'selected' @endphp>NCAAF</option>
                                        <option value="NBA" @php if( $pick['sport'] == "NBA") echo 'selected' @endphp>NBA</option>
                                        <option value="NCAAB" @php if( $pick['sport'] == "NCAAB") echo 'selected' @endphp>NCAAB</option>
                                        <option value="MLB" @php if( $pick['sport'] == "MLB") echo 'selected' @endphp>MLB</option>
                                        <option value="NHL" @php if( $pick['sport'] == "NHL") echo 'selected' @endphp>NHL</option>
                                        <option value="GOLF" @php if( $pick['sport'] == "GOLF") echo 'selected' @endphp>GOLF</option>
                                    </select>

                                </div>

                                <div class="col-12 col-md-3">
                                    <label for="team{{$count}}" class="col-form-label">{{ __('Team') }} </label>

                                    <input id="team{{$count}}" type="text" class="form-control" name="team" value="{{$pick['team']}}" required '>

                                </div>

                                <div class="col-12 col-md-2">
                                    <label for="line{{$count}}" class="col-form-label">{{ __('Line') }}</label>

                                    <input id="line{{$count}}" type="text" class="form-control" name="line" value="{{$pick['line']}}" required '>

                                </div>
                                <div class="col-12 col-md-3 mb-4 mb-md-0">
                                    <label for="time{{$count}}" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                    <input id="time{{$count}}" type="text" class="timepicker form-control" name="time" value="{{$pick['game_time']}}"/>
                                </div>
                                <div class="col-12 col-md-2 d-flex submit_button_wrap">
                                    <div class="align-self-end w-100">
                                        <div class="text-center">
                                            <button name="picks_update" class="button red d-block w-100" disabled>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @endforeach
                </div>
            @endif

            <div class="content_wrap full_width form_wrapper picks_form d-inline-block">

                <form class="full_width" action="{{ url('/submit-picks/save') }}" method="post">

                    {{ csrf_field() }}

                    <h3 class="text-center">Make your new pick below and submit for user to see</h3>
                    <div class="form-group my_row">
                        <p>Type in Format: Sport (eg. NFL) - City and Team (eg. St. Louis Cardinals) - Line (eg. -.75)</p>
                    </div>

                    <div class="picks_wrap full_width">

                        <div class="form-group my_row d-block d-sm-flex align-content-center pick_content">

                            <div class="info_wrap pick_submit m-auto d-block d-md-flex justify-content-between">
                                <div class="column">
                                    <label for="sport" class="col-form-label">{{ __('Sport') }}</label>

                                    <select class="form-control" name="sport" id="sport" required>
                                        <option value=""></option>
                                        <option value="NFL" @php if( old('sport') == "NFL") echo 'selected' @endphp>NFL</option>
                                        <option value="NCAAF" @php if( old('sport') == "NCAAF") echo 'selected' @endphp>NCAAF</option>
                                        <option value="NBA" @php if( old('sport') == "NBA") echo 'selected' @endphp>NBA</option>
                                        <option value="NCAAB" @php if( old('sport') == "NCAAB") echo 'selected' @endphp>NCAAB</option>
                                        <option value="MLB" @php if( old('sport') == "MLB") echo 'selected' @endphp>MLB</option>
                                        <option value="NHL" @php if( old('sport') == "NHL") echo 'selected' @endphp>NHL</option>
                                        <option value="GOLF" @php if( old('sport') == "GOLF") echo 'selected' @endphp>GOLF</option>
                                    </select>

                                    @if ($errors->has('sport'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('sport') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="column">
                                    <label for="team" class="col-form-label">{{ __('Team') }} </label>

                                    <input id="team" type="text" class="form-control" name="team" value="{{ old('team') }}" required '>

                                    @if ($errors->has('team'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('team') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="column">
                                    <label for="line" class="col-form-label">{{ __('Line') }}</label>

                                    <input id="line" type="text" class="form-control" name="line" value="{{ old('line') }}" required '>

                                    @if ($errors->has('line'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('line') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="column">
                                    <label for="time" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                    <input id="time" type="text" class="timepicker form-control" name="time" value="{{ old('time') }}"/>

                                    @if ($errors->has('time'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!-- picks_wrap -->

                    <div class="form-group my_row mt-4">
                        <div class="submit_button_wrap">
                            <div id="form_submit_span" class="mb-2 text-center">
                                <button name="picks_submit" id="picks_submits" class="button red d-block w-100">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div><!-- .container -->

@endsection