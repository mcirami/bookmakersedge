@component('mail::message')

    Thank you for registering!

    Please click the button below to verify your email address.

    @component('mail::button', ['url' => $url])
        Verify Email Address
    @endcomponent

    If you did not create an account, no further action is required.

    Regards,<br>
    {{ config('app.name') }}

@endcomponent
