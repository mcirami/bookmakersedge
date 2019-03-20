@extends("member.layouts.header")

@section('content')

    <div class="row">

        <div class="form_wrapper col-11 col-md-8 col-lg-6 mx-auto">

            <form id="checkout_form" class="update_form" action="{{ url('/account/change-password') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="currentPassword" class="col-12 col-form-label">{{ __('Current Password') }} <sup>*</sup></label>

                    <div class="col-12">
                        <input id="currentPassword" type="password" class="form-control{{ $errors->has('currentPassword') ? ' is-invalid' : '' }}" name="currentPassword" required>

                        @if ($errors->has('currentPassword'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('currentPassword') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password" class="col-12 col-form-label">{{ __('New Password') }} <sup>*</sup></label>

                    <div class="col-12">
                        <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>

                        @if ($errors->has('new_password'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password_confirm" class="col-12 col-form-label">{{ __('Confirm New Password') }} <sup>*</sup></label>

                    <div class="col-12">
                        <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirm" required>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-12">
                        <div class="submit_button_wrap">
                            <div id="form_submit_span">
                                <button name="update_submit" id="update_submit" class="button red">Change Password</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div><!-- form_wrapper -->
    </div><!-- row -->
@endsection
