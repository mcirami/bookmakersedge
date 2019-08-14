@extends('guest.layouts.header')

@section('content')
    <div class="my_container">
        <div class="page_content full_width form_wrapper">
            <div class="panel panel-default">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">

                    <form id="checkout_form" class="register" action="{{ url('/subscription-register') }}" method="post">

                        {{ csrf_field() }}

                        <h3 class="text-center">Complete the form to subscribe for 30 days!</h3>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name" class="col-form-label">{{ __('First Name') }}</label>

                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="col-form-label">{{ __('Last Name') }}</label>

                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-12 col-form-label">{{ __('Username') }} <sup>*</sup></label>
                            <div class="col-12">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label">{{ __('E-Mail Address') }} <sup>*</sup></label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-form-label">{{ __('Password') }} <sup>*</sup></label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-12 col-form-label">{{ __('Confirm Password') }} <sup>*</sup></label>

                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-12">
                                <div class="submit_button_wrap">
                                    <div id="form_submit_span" class="mb-2">
                                        <button name="payment_submit" id="payment_submit" class="button red float-left">Sign Up</button>
                                        <p class="w-100 float-left"><small>(you will be redirected to ClickBank to enter your payment information)</small></p>
                                    </div>
                                    <p class="terms w-100 float-left">By clicking "Sign Up and Pay Now" you agree to our <a target="_blank" href="/privacy-policy">Privacy Policy</a>, <a target="_blank" href="/terms-of-service">Terms of Service</a>.
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- form_wrapper -->
    </div><!-- my_container -->
@endsection