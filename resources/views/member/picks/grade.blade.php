@extends('member.layouts.header')

@section('content')

    <div class="my_container">
        <div class="page_content row picks_page text-center">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="content_wrap row form_wrapper update_picks_form d-inline-block @if($distinctDays->isEmpty()) empty @endif">

                    <div class="col-12">

                        @if(!$distinctDays->isEmpty())

                            <h3 class="text-center pb-3 mb-3 sub_title">Grade your picks below and submit for user to see</h3>

                            @foreach ($distinctDays as $day)

                                <div class="row date mt-4">
                                    <div class="col-12">
                                        <h2 class="text-left">{{$day->day->format('m-d-Y')}}</h2>
                                    </div>
                                </div>

                                @php $count = 0 @endphp

                                @foreach ($picks as $pick)

                                    @if($pick->day == $day->day)

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
                                                            <div class="col-12 col-md-3">
                                                                <label for="game_time" class="col-form-label">{{ __('Game Time') }} (EST)</label>
                                                                <input id="game_time" type="text" class="timepicker form-control" name="game_time" v-model="game_time"/>
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <label for="grade" class="col-form-label">{{ __('Grade') }}</label>
                                                                <select class="form-control" name="grade" id="grade" v-model="grade">
                                                                    <option value=""></option>
                                                                    <option value="w" >Win</option>
                                                                    <option value="l">Loss</option>
                                                                    <option value="p/c">Push/Cancel</option>
                                                                </select>
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
                                                                        <h4 class="font-weight-bold font-italic text-left">Submitted at: {{$pick['updated_at']->format('h:i')}} EST </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <p v-text="sport"></p>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <p v-text="team"></p>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <p v-text="line"></p>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <p><span v-text="game_time"></span> EST</p>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <p>
                                                                            <span v-text="grade" class="text-uppercase"></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($pick['comment'])
                                                                    <div class="row">
                                                                        <div class="col-12 display_comment pt-3">
                                                                            <p v-text="comment"></p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button name="picks_edit" class="button black edit_pick float-left mb-2 mb-md-0" @click="editing = true">Edit</button>
                                                                        <button name="pick_delete" class="button yellow delete_pick float-right" @click="destroy">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- col-12 -->
                                            </div><!-- pick_row -->

                                        </pick>

                                    @endif

                                @endforeach

                            @endforeach

                        @else
                            <h3 class="text-center">There are no picks to grade</h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div><!-- .container -->

@endsection
