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

            <div class="content_wrap full_width form_wrapper grade_page picks_form d-inline-block @php if($distinctDays->isEmpty())  echo 'empty' @endphp">

                @if(!$distinctDays->isEmpty())

                    <form action="{{ url('/grade-picks/save') }}" method="post">

                        {{ csrf_field() }}

                        <h3 class="text-center">Grade your picks below and submit for user to see</h3>

                            @foreach ($distinctDays as $day)

                                <div class="my_row date">
                                    <h2>{{$day->day->format('m-d-Y')}}</h2>
                                </div>

                                @php $count = 0 @endphp

                                @foreach ($picks as $pick)

                                    @if($pick->day == $day->day && $pick->grade == NULL)

                                        <div class="form-group my_row d-block d-sm-flex align-content-center">
                                            @php $count++ @endphp

                                            {{--<input type="hidden" value="{{$pick->id}}" name="{{$pick->id}}">--}}
                                            <div class="icon_wrap mt-auto mb-4 mb-sm-auto ml-auto mr-0">
                                                <h3>@php echo $count @endphp</h3>
                                            </div>
                                            <div class="info_wrap m-auto row">
                                                <div class="col-4 col-sm-2">
                                                    <label class="col-form-label">{{ __('Sport') }}</label>
                                                    <p class="text-left">{{$pick->sport}}</p>
                                                </div>

                                                <div class="col-5 col-sm-3">
                                                    <label class="col-form-label">{{ __('Team') }} </label>
                                                    <p class="text-left">{{$pick->team}}</p>
                                                </div>

                                                <div class="col-3 col-sm-3">
                                                    <label class="col-form-label">{{ __('Line') }}</label>
                                                    <p class="text-left">{{$pick->line}}</p>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label for="{{$pick->id}}" class="col-form-label">{{ __('Grade') }}</label>
                                                    <select class="form-control" name="{{$pick->id}}" id="{{$pick->id}}" >
                                                        <option value=NULL></option>
                                                        <option value="w">Win</option>
                                                        <option value="l">Lose</option>
                                                        <option value="p/c">Push/Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach

                            @endforeach


                        <div class="form-group my_row mt-4">
                            <div class="col-12">
                                <div class="submit_button_wrap">
                                    <div id="form_submit_span" class="mb-2 text-center">
                                        <button name="picks_submit" id="picks_submits" class="button red">Submit</button>
                                        <p class="text-uppercase font-weight-bold">**Submit is final and goes on permanent Reporting</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                @else
                    <h3 class="text-center">There are no picks to grade</h3>
                @endif
            </div>
        </div>
    </div><!-- .container -->

@endsection