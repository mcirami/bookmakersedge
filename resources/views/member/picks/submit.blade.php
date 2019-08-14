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
                    <div class="col-12">
                        <h3 class="text-center w-100 pb-3">Picks You Submitted Today</h3>

                        @foreach($todaysPicks as $pick)

                            <pick :attributes="{{$pick}}" inline-template v-cloak>

                                <div class="row no-gutters pick_row current_picks">
                                    <div class="col-12">
                                        <div v-if="editing">

                                            <div class="row text-left">

                                                <div class="col-12 col-md-3">
                                                    <label for="sport" class="col-form-label">{{ __('Sport') }}</label>

                                                    <select class="form-control" name="sport" id="sport" v-model="sport" required>
                                                        <option value=""></option>
                                                        <option value="NFL" >NFL</option>
                                                        <option value="NCAAF">NCAAF</option>
                                                        <option value="NBA">NBA</option>
                                                        <option value="NCAAB">NCAAB</option>
                                                        <option value="MLB">MLB</option>
                                                        <option value="NHL" >NHL</option>
                                                        <option value="GOLF">GOLF</option>
                                                    </select>

                                                </div>

                                                <div class="col-12 col-md-4">
                                                    <label for="team" class="col-form-label">{{ __('Team') }} </label>

                                                    <input id="team" type="text" class="form-control" name="team" v-model="team" required>

                                                </div>

                                                <div class="col-12 col-md-2">
                                                    <label for="line" class="col-form-label">{{ __('Line') }}</label>

                                                    <input id="line" type="text" class="form-control" name="line" v-model="line" required>

                                                </div>
                                                <div class="col-12 col-md-3 mb-4 mb-md-0">
                                                    <label for="game_time" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                                    <input id="game_time" type="text" class="timepicker form-control" name="game_time" v-model="game_time"/>
                                                </div>
                                                <div class="col-12">
                                                    <label for="comment" class="col-form-label w-100 text-left">{{ __('Comment') }}</label>
                                                    <textarea class="w-100 form-control" name="comment" id="comment" rows="3" v-model="comment"></textarea>
                                                </div>
                                                <div class="col-12 submit_button_wrap mt-4">

                                                    <button name="picks_update" class="button red update_pick d-block float-left mb-2 mb-md-0" @click="update">Update</button>
                                                    <button name="cancel_update" class="button yellow cancel_update d-block float-right" @click="cancel">Cancel</button>

                                                </div>
                                            </div>


                                        </div><!-- if editing -->
                                        <div v-else>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h4 class="font-weight-bold">Submitted at: {{$pick['updated_at']->format('h:i')}} EST </h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <p class="text-center text-sm-left" v-text="sport"></p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-center text-sm-left" v-text="team"></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <p class="text-center text-sm-left" v-text="line"></p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-center text-sm-left">
                                                                <span v-text="game_time"></span> EST</p>
                                                        </div>
                                                    </div>
                                                    @if($pick['comment'])
                                                        <div class="row">
                                                            <div class="col-12 display_comment pt-3">
                                                                <p v-text="comment"></p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    @if(strtotime($now) < strtotime($pick['game_time']))
                                                        <button name="picks_edit" class="button black edit_pick float-left mb-2 mb-md-0" @click="editing = true">Edit</button>
                                                        <button name="pick_delete" class="button yellow delete_pick float-right" @click="destroy">Delete</button>
                                                    @else
                                                        <p class="m-auto">Game Started</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- col-12 -->
                                </div><!-- pick_row -->

                            </pick>

                        @endforeach
                    </div>
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

                        <div class="form-group my_row d-block d-sm-flex align-content-center pick_content mb-0">

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

                                    <input id="team" type="text" class="form-control" name="team" value="{{ old('team') }}" required autocomplete='off'>

                                    @if ($errors->has('team'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('team') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="column">
                                    <label for="line" class="col-form-label">{{ __('Line') }}</label>

                                    <input id="line" type="text" class="form-control" name="line" value="{{ old('line') }}" required autocomplete='off'>

                                    @if ($errors->has('line'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('line') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="column">
                                    <label for="game_time" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                    <input id="game_time" type="text" class="timepicker form-control" name="game_time" value="
                                        @if ($lastPick['game_time'] != null)
                                            {{$lastPick['game_time']}}
                                        @else
                                            {{ old('game_time') }}
                                        @endif
                                            "/>

                                    @if ($errors->has('time'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('game_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- picks_wrap -->
                        </div><!-- pick_content -->
                        <div class="forum-group my_row px-4 pb-4 text_area">
                            <label for="comment" class="col-form-label w-100 text-left">{{ __('Comment') }}</label>
                            <textarea class="w-100 form-control" name="comment" id="comment" rows="3"></textarea>
                        </div>
                        @if ($errors->has('comment'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
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