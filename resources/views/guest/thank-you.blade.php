@extends('guest.layouts.header')

@section('content')

    <section class="full_width page_content">

        <div class="my_container">
            <div class="standard thankyou text-center">
                <h2 class="mb-5">Thank You and Welcome to Book Makers Edge @if($name != ""){{$name}}@endif!</h2>
                <h3 class="mb-4">We are so glad you decided to join us!</h3>
                @if($email != "" && $newAccount == true)
                    <h3 class="mb-4">Here is your login info: </h3>
                    @php $username = explode("@", $email) @endphp
                    <h4>Username: {{$username[0]}}</h4>
                    <h4>Password: temppass123</h4>
                    <p class="mb-1"><span class="font-weight-bold text-uppercase">**Please change your password after you login.</span></p>
                    <p class="mb-1">You can also change your username.</p>
                    <p>When you are logged in, click on 'Account' and follow the links to update your information.</p>
                @endif

                <h4 class="mb-5">
                    <a href="https://bookmakersedge.com/login">Login now</a> and get access to everything you need to start winning!
                </h4>

                <p>If you have any questions, dont' hesitate to contact us at
                    <a href="mailto:support@bookmakersedge.com">support@bookmakersedge.com</a>
                </p>
                <p>Your credit card statement will show a charge by <span>ClickBank or CLKBANK*COM</span></p>
            </div>
        </div>
    </section>

@endsection