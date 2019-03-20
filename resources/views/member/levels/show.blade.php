@extends('member.layouts.header')

@section('content')
    <div class="my_container">
        <div class="page_content full_width form_wrapper">
            <div class="column">
                <div class="top_section full_width">
                    <h2>Complete the form to start your membership!</h2>
                    <p>Only $20/week</p>
                </div><!-- top_section -->
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

                        <form id="checkout_form" action="{{ url('/subscribe') }}" method="post">
                            <input type="hidden" name="plan" value="{{ $plan->id }}">
                            <input type="hidden" name="trial_duration" value="{{ $plan->trial_duration }}">
                            {{ csrf_field() }}
                            <input type="hidden" id="payment_method_nonce" name="payment_method_nonce" value="">

                            <div class="red_border_wrap">
                                <h3>Choose Your Payment Method</h3>

                                <div class="form-row checkout_options">
                                    <div class="col-12">
                                        <div class="form-check row">
                                            <label class="form-check-label col-12">
                                                <input id="credit_card_check" type="radio" class="form-check-input radio_checkout" name="optradio">Check Out with a Credit Card Here
                                            </label>
                                        </div>
                                        <div class="form-check row">
                                            <label class="form-check-label col-12">
                                                <input id="paypal_check" type="radio" class="form-check-input radio_checkout" name="optradio">Check Out with PayPal
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="paypal_wrap row">
                                    <div class="col-12">
                                        <div id="paypal-container"></div>
                                    </div>
                                </div>
                                <div class="loader_wrap full_width">
                                    <div class="loader"></div>
                                </div>
                                <div id="credit_card_form" class="card_info credit_card_wrap" style="opacity: 0;">

                                    <h3 class="text-uppercase form_sub_heading">Billing Address</h3>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="first_name" class="col-form-label">{{ __('First Name') }} <sup>*</sup></label>

                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name" class="col-form-label">{{ __('Last Name') }} <sup>*</sup></label>

                                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-12 col-form-label">{{ __('Address') }} <sup>*</sup></label>

                                        <div class="col-12">
                                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="city" class="col-form-label">{{ __('City') }} <sup>*</sup></label>
                                            <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="state" class="col-form-label">{{ __('State') }} <sup>*</sup></label>
                                            <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }} "required>

                                            @if ($errors->has('state'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="postal_code" class="col-form-label control-label">{{ __('Postal Code') }} <sup>*</sup></label>
                                            <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required>
                                           {{-- <div class="form-control" id="postal_code"></div>--}}
                                            @if ($errors->has('postal_code'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="country" class="col-form-label">{{ __('Country') }} <sup>*</sup></label>
                                            <select id="country" class="input-medium bfh-countries form-control" data-country="US" name="country"></select>
                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-12 col-form-label">{{ __('Phone') }} <sup>*</sup></label>

                                        <div class="col-12">
                                            <input type="text" id="phone" class="input-medium bfh-phone form-control" value="{{ old('phone') }}" name="phone" data-format="+1 (ddd) ddd-dddd" data-number="15555555555">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="section_heading">
                                        <h3 class="text-uppercase form_sub_heading">Payment Information</h3>
                                        <p>WE ACCEPT VISA, MASTERCARD, AMERICAN EXPRESS AND DISCOVER</p>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label  for="cardNumber" class="control-label">Card Number <sup>*</sup></label>
                                            <!--  Hosted Fields div container -->
                                            <div class="form-control" id="cardNumber"></div>
                                            <span class="helper-text"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="control-label">Expiration Date <sup>*</sup></label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <!--  Hosted Fields div container -->
                                                    <div class="form-control" id="expirationMonth"></div>
                                                </div>
                                                <div class="col-6">
                                                    <!--  Hosted Fields div container -->
                                                    <div class="form-control" id="expirationYear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="cvv" class="control-label">Security Code <sup>*</sup></label>
                                            <!--  Hosted Fields div container -->
                                            <div class="form-control" id="cvv"></div>
                                        </div>
                                    </div>
                                    <div class="submit_button_wrap">
                                        <div id="form_submit_span">
                                            <button name="payment_submit" id="payment_submit" class="button red" disabled>Submit and Check Out</button>
                                        </div>
                                        <p class="terms">By clicking "Submit and Check Out" you agree to our <a target="_blank" href="/privacy-policy">Privacy Policy</a>, <a target="_blank" href="/terms-of-service">Terms of Service</a>.
                                    </div>
                                </div><!-- credit_card_wrap -->
                            </div><!-- red_border_wrap -->
                        </form>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- column -->
        </div><!-- form_wrapper -->
    </div><!-- my_container -->
@endsection

@section('braintree')

    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>

    <!-- Load the required client component. -->
    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>

    <!-- Load Hosted Fields component. -->
    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>


    <script>

	    $.ajax({
		    url: '{{ url('braintree/token') }}'
	    }).done(function (response) {

		    document.getElementById('payment_method_nonce').value = response.data.token;

		    var submitBtn = document.getElementById('payment_submit');
		    var form = document.getElementById('checkout_form');
		    var CLIENT_AUTHORIZATION = document.getElementById('payment_method_nonce').value;

		    //var hostedFields = require('braintree-web/hosted-fields');
		    //var client = require("braintree-web/client");

		    braintree.client.create({
			    authorization: CLIENT_AUTHORIZATION
		    }, clientDidCreate);


		    function clientDidCreate(err, client) {
			    if (err) {
				    // Handle error in client creation
				    console.log(err);
				    return;
			    }

			    braintree.hostedFields.create({
				    client: client,
				    styles: {
					    'input': {
						    'font-size': '16px',
						    'font-family': 'helvetica, tahoma, calibri, sans-serif',
						    'color': '#3a3a3a'
					    },
					    ':focus': {
						    'color': 'black'
					    }
				    },
				    fields: {
					    number: {
						    selector: '#cardNumber',
						    placeholder: '1234 5678 9101 2345'
					    },
					    cvv: {
						    selector: '#cvv',
						    placeholder: '123'
					    },
					    expirationMonth: {
						    selector: '#expirationMonth',
						    placeholder: 'mm'
					    },
					    expirationYear: {
						    selector: '#expirationYear',
						    placeholder: 'yyyy'
					    },
					    /*postalCode: {
						    selector: '#postal_code',
					    }*/
				    }

			    }, hostedFieldsDidCreate);
		    }

		    function hostedFieldsDidCreate(err, hostedFields) {
			    if (err) {
				    // Handle error in Hosted Fields creation
				    console.log(err);
				    return;
			    }

			    submitBtn.addEventListener('click', submitHandler.bind(null, hostedFields));
			    submitBtn.removeAttribute('disabled');
			    $('.card_info').css('opacity', '1');
			    $('.loader_wrap').addClass('inactive');
		    }

		    function submitHandler(hostedFields, event) {
			    event.preventDefault();
			    submitBtn.setAttribute('disabled', 'disabled');

			    hostedFields.tokenize(function(err, payload) {
				    if(err) {
					    submitBtn.removeAttribute('disabled');
					    console.error(err);
				    } else {
					    form['payment_method_nonce'].value = payload.nonce;
					    form.submit();
					    //braintree.setup(payload.nonce);
				    }
			    });
		    }

		    braintree.setup(CLIENT_AUTHORIZATION, "custom", {
			    paypal: {
				    container: "paypal-container",
				    singleUse: false
			    },
			    dataCollector: {
				    paypal: true
			    },
			    onPaymentMethodReceived: function (obj) {
				    form['payment_method_nonce'].value = obj.nonce;
				    form.submit();
			    }
		    });
	    });



			    /*hostedFieldsInstance.on('validityChange', function (event) {
				    var field = event.fields[event.emittedBy];

				    if (field.isValid) {
					    if (event.emittedBy === 'expirationMonth' || event.emittedBy === 'expirationYear') {
						    if (!event.fields.expirationMonth.isValid || !event.fields.expirationYear.isValid) {
							    return;
						    }
					    } else if (event.emittedBy === 'number') {
						    $('#cardNumber').next('span').text('');
					    }

					    // Remove any previously applied error or warning classes
					    $(field.container).parents('.form-group').removeClass('has-warning');
					    $(field.container).parents('.form-group').removeClass('has-success');
					    // Apply styling for a valid field
					    $(field.container).parents('.form-group').addClass('has-success');
				    } else if (field.isPotentiallyValid) {
					    // Remove styling  from potentially valid fields
					    $(field.container).parents('.form-group').removeClass('has-warning');
					    $(field.container).parents('.form-group').removeClass('has-success');
					    if (event.emittedBy === 'number') {
						    $('#cardNumber').next('span').text('');
					    }
				    } else {
					    // Add styling to invalid fields
					    $(field.container).parents('.form-group').addClass('has-warning');
					    // Add helper text for an invalid card number
					    if (event.emittedBy === 'number') {
						    $('#cardNumber').next('span').text('Looks like this card number has an error.');
					    }
				    }
			    });

			    hostedFieldsInstance.on('cardTypeChange', function (event) {
				    // Handle a field's change, such as a change in validity or credit card type
				    if (event.cards.length === 1) {
					    $('#card-type').text(event.cards[0].niceType);
				    } else {
					    $('#card-type').text('Card');
				    }
			    });*/


    </script>

@endsection