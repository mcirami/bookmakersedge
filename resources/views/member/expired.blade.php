@extends('member.layouts.inactive.header')

@section('content')

    <div class="my_container">
        <div class="member_home page_content full_width text-center inactive">
            <h2 class="text-uppercase">Sorry, Your Free Trial has expired...</h2>
            <h3 class="d-inline-block w-100">Don't miss out! </h3>
            <h3 class="d-inline-block w-100">If you liked what you saw, take the next step and sign up! </h3>
            <h3 class="mb-5 d-inline-block w-100">Our introductory rate is just $50 for 30 days!</h3>
            <a class="button yellow" href="http://1.jvax157.pay.clickbank.net/?cbskin=24677&email={{$email}}">Click Here To Join!</a>
        </div>
    </div>

@endsection