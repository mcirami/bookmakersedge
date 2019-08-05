<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/timepicker.css') }}">
        <title>Book Makers Edge</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>

    <body>
     <div id="app">
            <header id="global_header">
                @include('member.layouts.navbar')
            </header>

            <div class="wrapper">
                <div class="page_content_wrapper full_width member">

                    <div class="sub_header">
                        <h2><?php echo Route::currentRouteName(); ?></h2>
                    </div>

                    <div class="my_container">
                        <div class="row">
                            <div class="col-12">
                                @include ('member.layouts.partials._notifications')
                            </div>
                        </div>
                    </div>

                    @yield('content')

                    <flash message="{{ session('flash') }}"></flash>
                </div>

                @include('member.layouts.footer')
            </div><!-- wrapper -->
        </div><!-- #app -->
    </body>
</html>
