@extends('auth.layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center verify_page">
        <div class="col-md-8">
            <div class="verify_box">
                <h3 class="text-capitalize">{{ __('Verify Your Email Address') }}</h3>

                <div class="content_wrap">

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p>{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
