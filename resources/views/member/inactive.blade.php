@extends('member.layouts.inactive.header')

@section('content')

    <div class="my_container">
        <div class="member_home page_content full_width text-center inactive">
            <h2 class="text-uppercase">Sorry, Your Membership is no longer active...</h2>
            <h3 class="d-inline-block w-100">Don't miss out! </h3>
            <h3 class="mb-5 d-inline-block w-100">Join us again to start winning!</h3>
            <a class="button yellow" href="http://1.jvax157.pay.clickbank.net/?cbskin=24677&email={{$email}}">Click Here To Join!</a>
        </div>
    </div>

@endsection