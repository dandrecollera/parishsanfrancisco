<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('WEB_TITLE'))</title>

    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <link rel="icon" type="image/ico" href="{{asset('favicon/favicon.ico')}}">

    <script src="https://kit.fontawesome.com/55faa7e024.js" crossorigin="anonymous"></script>

    @yield('styles')

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a href="/" class="navbar-brand fw-bolder ps-2 text-white">
                <img src="{{asset('img/Logo.png')}}" alt="logo" height="70">
            </a>

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarButtonsExample">

                @php
                $path = request()->path();
                @endphp
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == '/' ? 'font-weight:bolder' : ''}}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'about' ? 'font-weight:bolder' : ''}}"
                            href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'news' ? 'font-weight:bolder' : ''}}"
                            href="/news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'services' ? 'font-weight:bolder' : ''}}"
                            href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'faqs' ? 'font-weight:bolder' : ''}}"
                            href="/faqs">FAQs</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center mb-3">
                    <a href="register">
                        <button type="button" class="btn btn-link px-3 me-2">
                            Register
                        </button>
                    </a>
                    <a href="login">
                        <button type="button" class="btn btn-primary me-3">
                            Login
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main style="padding-top: 90px">
        @yield('content')
    </main>

    <div class="bg-dark text-white">
        <div class="container py-1 pt-3">
            <center>
                <p style="font-size: 10px">Copyright © PSFA 2023 All rights reserved </p>
            </center>
        </div>
    </div>
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/mdb.min.js')}}"></script>

</body>

</html>