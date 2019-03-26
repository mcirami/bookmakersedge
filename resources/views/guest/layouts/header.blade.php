<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>Book Makers Edge</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('braintree')
        @if(Route::current()->getName() == 'Thank You')
            <script src='//cbtb.clickbank.net/?vendor=jvax157'></script>
        @endif
        <meta name="google-site-verification" content="TfduACfWZ6amIhOspznZRUqZcMdZ-6St0De1RiPRujc" />
    </head>

    <body>
        <header id="global_header">
            @include('guest.layouts.navbar')
        </header>
        <div class="wrapper">

            <div class="@if(Route::current()->getName() != 'guest.home') page_content_wrapper @endif">

                @if(Route::current()->getName() != 'guest.home')
                    <div class="sub_header">
                        <h2><?php echo Route::currentRouteName(); ?></h2>
                    </div>
                @endif

                @yield('content')

            </div>

            @include('guest.layouts.footer')
        </div><!-- wrapper -->

    </body>
</html>
