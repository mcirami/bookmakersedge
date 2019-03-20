@extends('guest.layouts.header')

@section('content')
    <div class="my_container">

        <div class="page_content">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto login_box">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login" class="col-12 col-form-label">{{ __('Username or E-Mail') }}</label>

                            <div class="col-12">
                                <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>

                                @if ($errors->has('login'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12 col-md-6 mb-4 mb-md-0">
                                <button type="submit" class="button black w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="button red w-100 d-block text-center" href="/register">Sign Up Now!</a>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-4">
                            <div class="col-12 text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection