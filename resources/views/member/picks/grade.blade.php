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

            @php //dd($distinctDays) @endphp
            <div class="content_wrap full_width form_wrapper grade_page picks_form d-inline-block @if($distinctDays->isEmpty())  echo 'empty' @endif">

                @if(!$distinctDays->isEmpty())

                    {{ csrf_field() }}

                    <h3 class="text-center">Grade your picks below and submit for user to see</h3>

                    @foreach ($distinctDays as $day)

                        <div class="my_row date">
                            <h2>{{$day->day->format('m-d-Y')}}</h2>
                        </div>

                        @php $count = 0 @endphp

                        @foreach ($picks as $pick)

                            @if($pick->day == $day->day)

                                <div class="form-group my_row d-block d-sm-flex align-content-center">
                                    @php $count++ @endphp

                                    {{--<input type="hidden" value="{{$pick->id}}" name="{{$pick->id}}">--}}
                                    <div class="icon_wrap mt-auto mb-4 mb-sm-auto ml-auto mr-0">
                                        <h3>@php echo $count @endphp</h3>
                                    </div>
                                    <div class="info_wrap m-auto row">
                                        <div class="col-5 col-lg-3">
                                            <label class="col-form-label">{{ __('Sport') }}</label>
                                            <p class="text-left">{{$pick->sport}}</p>
                                        </div>

                                        <div class="col-5 col-lg-3">
                                            <label class="col-form-label">{{ __('Team') }} </label>
                                            <p class="text-left">{{$pick->team}}</p>
                                        </div>

                                        <div class="col-2 col-lg-2">
                                            <label class="col-form-label">{{ __('Line') }}</label>
                                            <p class="text-left">{{$pick->line}}</p>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="pick_grade" class="col-form-label">{{ __('Grade') }}</label>
                                            @if ($pick->grade == NULL)
                                                <form action="grade-picks/{{$pick->id}}/update" method="post" class="update_grade_form">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <div class="form-group row no-gutters mb-0">
                                                        <select class="form-control col-5 mr-4 mr-lg-3 mr-xl-4" name="grade" id="pick_grade" >
                                                            <option value=NULL></option>
                                                            <option value="w">Win</option>
                                                            <option value="l">Lose</option>
                                                            <option value="p/c">Push/Cancelled</option>
                                                        </select>
                                                        <button name="pick_grade_submit" id="pick_grade_submit" class="ml-auto button red col-6 grade_update">Submit</button>
                                                    </div>
                                                </form>
                                            @else
                                                <div class="grade_info">
                                                    <div class="row no-gutters">
                                                        <p class="text-left col-6 text-capitalize mb-0">{{$pick->grade}}</p>
                                                        <button name="edit_grade" class="button black d-block edit_grade col-6">Edit Grade</button>
                                                    </div>

                                                </div>
                                                <form action="grade-picks/{{$pick->id}}/update" method="post" class="update_grade_form" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <div class="col-12">
                                                        <img class="cancel_grade_update" src="<?php echo asset('images/close-button.png'); ?>" alt="">
                                                    </div>
                                                    <div class="form-group row no-gutters mb-0">
                                                        <select class="form-control col-5 mr-4 mr-lg-3 mr-xl-4" name="grade" id="grade" >
                                                            <option value=NULL></option>
                                                            <option value="w">Win</option>
                                                            <option value="l">Lose</option>
                                                            <option value="p/c">Push/Cancelled</option>
                                                        </select>
                                                        <button name="picks_update" id="picks_update" class="ml-auto grade_update button red col-6" disabled>Submit</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div><!-- info_wrap -->
                                </div><!-- my_row form-group -->

                            @endif

                        @endforeach

                    @endforeach

                @else
                    <h3 class="text-center">There are no picks to grade</h3>
                @endif
            </div>
        </div>
    </div><!-- .container -->

@endsection
<script>
	import UpdatePickGrade from '../../../js/components/UpdatePickGrade';
	export default {
		components: {UpdatePickGrade},
	};
</script>