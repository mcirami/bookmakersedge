<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <title>Book Makers Edge</title>

    <style>
        #global_header.mail_header {
            width: 100%;
            float: left;
            display: block;
            background: #131313;
            text-align: center;
            padding: 20px 0;
        }

        #global_header.mail_header .logo {
            font-size: 28px;
            color: #fff;
            text-transform: uppercase;
            text-decoration: none;
        }

        .mail_content {
            width: 100%;
            float: left;
            display: block;
            padding: 5% 0 20%;
            text-align: center;
            background: #f1f1f1;
        }

        .mail_content .content_wrap {
            width: 75%;
            margin: 0 auto;
            background: #fff;
            padding: 60px 8%;
            border: 7px solid #e4e4e4;
        }

        .mail_content h2 {
            line-height: 1.4;
            font-size: 26px;
            margin: 0;
        }

        .mail_content h3 {
            font-size: 26px;
            font-family: 'robotobold', sans-serif;
            margin-bottom: 40px;
        }

        .mail_content p {
            font-size: 24px;
        }

        .mail_content a {
            font-family: 'robotobold', sans-serif;
            font-weight: 700;
            color: #ddb72e;
            font-size: 24px;
            text-transform: uppercase;
        }

        .mail_content a:hover {
             color: #c4a020;
        }

        #global_footer {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
            padding: 40px 0 20px;
            background: #131313;
        }

        #global_footer a {
            text-decoration: none;
        }

        #global_footer:last-child {
            margin-right: 0;
        }

        #global_footer .content_wrap {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
        }

        #global_footer .content_wrap:last-child {
            margin-right: 0;
        }

        #global_footer .content_wrap .logo {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
            text-align: center;
        }

        #global_footer .content_wrap .logo:last-child {
            margin-right: 0;
        }

        #global_footer .content_wrap .logo a {
            font-size: 28px;
            color: white;
            text-transform: uppercase;
        }

        #global_footer .content_wrap .logo img {
            width: auto;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .logo img {
                width: 280px;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .logo img {
                float: none;
                margin: 0 auto;
            }
        }

        #global_footer .content_wrap .columns_wrap {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        #global_footer .content_wrap .columns_wrap:last-child {
            margin-right: 0;
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap {
                float: left;
                display: block;
                margin-right: 7.4229703521%;
                width: 100%;
                text-align: center;
                padding-top: 20px;
            }

            #global_footer .content_wrap .columns_wrap:last-child {
                margin-right: 0;
            }
        }

        #global_footer .content_wrap .columns_wrap h3 {
            font-family: "robotoregular", sans-serif;
            font-weight: 300;
            font-weight: lighter;
            margin-top: 0;
            text-transform: uppercase;
            font-size: 18px;
            color: #fff;
            margin-bottom: 15px;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap h3 {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap h3 {
                margin-bottom: 5px;
            }
        }

        #global_footer .content_wrap .columns_wrap .column {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
        }

        #global_footer .content_wrap .columns_wrap .column:last-child {
            margin-right: 0;
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column {
                margin-bottom: 20px;
            }
        }

        #global_footer .content_wrap .columns_wrap .column a {
            font-family: "robotolight", sans-serif;
            font-weight: 200;
            color: #958c8c;
            font-size: 14px;
        }

        #global_footer .content_wrap .columns_wrap .column a:hover {
            color: #fff;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column a {
                font-size: 12px;
            }
        }

        #global_footer .content_wrap .columns_wrap .column p {
            color: #958c8c;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column p {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column p {
                display: inline-block;
                float: none;
            }
        }

        #global_footer .content_wrap .columns_wrap .column p.white {
            color: #fff;
        }

        #global_footer .content_wrap .columns_wrap .column p a {
            margin-left: 5px;
            color: #fff;
        }

        #global_footer .content_wrap .columns_wrap .column li {
            font-family: "robotolight", sans-serif;
            font-weight: 200;
            color: #958c8c;
            font-size: 14px;
            display: inline-block;
            margin-right: 20px;
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column li {
                display: inline-block;
                margin-right: 15px;
            }
        }

        #global_footer .content_wrap .columns_wrap .column li:last-child {
            margin-right: 0;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap:last-child {
            margin-right: 0;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row:last-child {
            margin-right: 0;
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row {
                width: auto;
                display: inline-block;
                float: none;
            }
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a {
            font-family: "robotolight", sans-serif;
            font-weight: 200;
            float: left;
            color: #fff;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a:hover {
            color: #958c8c;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a:hover h3 {
            color: #958c8c;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a:hover:before {
            content: "";
            width: 40px;
            height: 40px;
            left: 0;
            position: absolute;
            z-index: 1;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.facebook:hover:before {
            background: url("/storage/site-images/icon-facebook-gray.png") no-repeat;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.facebook:hover:before {
                background-size: 60%;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.facebook:hover:before {
                background-size: 45%;
            }
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.instagram:hover:before {
            background: url("/storage/site-images/icon-instagram-gray.png") no-repeat;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.instagram:hover:before {
                background-size: 60%;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.instagram:hover:before {
                background-size: 45%;
            }
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.youtube:hover:before {
            background: url("/storage/site-images/icon-youtube-gray.png") no-repeat;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.youtube:hover:before {
                background-size: 60%;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a.youtube:hover:before {
                background-size: 45%;
            }
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a img {
            float: left;
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a h3 {
            float: left;
            font-size: 16px;
            text-transform: none;
            margin-left: 5px;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a h3 {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap .my_row a h3 {
                float: none;
                display: inline-block;
                vertical-align: top;
                margin-bottom: 0;
                font-size: 12px;
                padding-bottom: 6px;
            }
        }

        #global_footer .content_wrap .columns_wrap .column .icon_wrap img {
            width: auto;
            margin-right: 5px;
        }

        @media screen and (max-width: 991px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap img {
                width: 24px;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .content_wrap .columns_wrap .column .icon_wrap img {
                display: inline-block;
                float: none;
                width: 18px;
                margin-right: 0;
            }
        }

        #global_footer .copy {
            float: left;
            display: block;
            margin-right: 2.3576515979%;
            width: 100%;
            text-align: center;
            color: #958c8c;
            font-size: 14px;
        }

        #global_footer .copy:last-child {
            margin-right: 0;
        }

        @media screen and (max-width: 991px) {
            #global_footer .copy {
                font-size: 12px;
            }
        }

        #global_footer .copy p {
            margin-bottom: 0;
        }

        #global_footer .copy ul {
            text-align: center;
            margin-bottom: 0;
        }

        #global_footer .copy ul li {
            display: inline-block;
            padding: 5px;
        }

        @media screen and (max-width: 767px) {
            #global_footer .copy ul li {
                line-height: 1;
                padding: 5px;
            }
        }

        #global_footer .copy ul li:after {
            font-family: "robotolight", sans-serif;
            font-weight: 200;
            content: "|";
            position: absolute;
            right: -4px;
            top: 4px;
            font-size: 15px;
            color: #958c8c;
        }

        @media screen and (max-width: 991px) {
            #global_footer .copy ul li:after {
                font-size: 13px;
            }
        }

        @media screen and (max-width: 767px) {
            #global_footer .copy ul li:after {
                top: 5px;
            }
        }

        #global_footer .copy ul li:last-child:after {
            content: none;
        }

        #global_footer .copy ul li a {
            font-family: "robotolight", sans-serif;
            font-weight: 200;
            color: #958c8c;
        }

        #global_footer .copy ul li a:hover {
            color: #fff;
        }

        #global_footer ul {
            padding-left: 0;
        }

    </style>
</head>

    <body>

        <header id="global_header" class="mail_header">
            <a class="logo" href="https://bookmakersedge.com">Book Makers Edge</a>
        </header>

        @yield('content')

        @include('member.emails.layouts.footer')


    </body>
</html>
