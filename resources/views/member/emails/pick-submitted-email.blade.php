@component('mail::message', ['user' => $user ])
<h2>Book Makers Edge Has Submitted a New Pick</h2>
<p><a href="https://bookmakersedge.com/login">CLICK HERE</a> to login and see the pick!</p>
@component('mail::button', ['url' => 'https://bookmakersedge.com/login'])
Login Now
@endcomponent

@endcomponent
