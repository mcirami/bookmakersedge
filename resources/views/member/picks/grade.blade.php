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

                               {{-- <pick :attributes="{{$pick}}" inline-template v-cloak>--}}
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

                                                <pick :attributes="{{$pick}}"></pick>

                                            </div>
                                        </div><!-- info_wrap -->
                                    </div><!-- my_row form-group -->

                                {{--</pick>--}}

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
