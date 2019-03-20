@extends("member.layouts.header")

@section('content')

    <div class="row">

        <div class="form_wrapper col-11 col-md-8 col-lg-6 mx-auto">

            <form id="checkout_form" class="update_form" action="{{ url('/account/update') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="username" class="col-form-label">{{ __('Username') }} <sup>*</sup></label>

                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email" class="col-form-label">{{ __('Email Adress') }} <sup>*</sup></label>

                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <div class="submit_button_wrap">
                            <div id="form_submit_span">
                                <button name="update_submit" id="update_submit" class="button red">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div><!-- form_wrapper -->
    </div><!-- row -->
@endsection
