@extends(Auth::check() ? ('member.layouts.header') : ('guest.layouts.header'))

@section('content')

    <section class="row page_content text-center unsubscribe">

        <div class="col-12">
            <h2 class="mb-5">You have been unsubcribed from further email notifications.</h2>

            <p><a href="/login">Click Here</a> to go to go members area home page or login.</p>
        </div>
    </section>

@endsection

