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
            <a href="home" class="navbar-brand fw-bolder ps-2 text-white">
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
                        <a class="nav-link" style="{{$path == 'home' ? 'font-weight:bolder' : ''}}" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'userabout' ? 'font-weight:bolder' : ''}}"
                            href="/userabout">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'usernews' ? 'font-weight:bolder' : ''}}"
                            href="/usernews">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'userservices' ? 'font-weight:bolder' : ''}}"
                            href="/userservices">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{$path == 'userfaqs' ? 'font-weight:bolder' : ''}}"
                            href="/userfaqs">FAQs</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                            style="{{$path == 'userhistory' ? 'font-weight:bolder' : '' || $path == 'usercalendar' ? 'font-weight:bolder' : ''}}"
                            href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown">
                            Appointments
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="userhistory"
                                    style="{{$path == 'userhistory' ? 'font-weight:bolder' : ''}}">History</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="usercalendar"
                                    style="{{$path == 'usercalendar' ? 'font-weight:bolder' : ''}}">Calendar</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <div class="dropdown py-2 mt-2">
                        <a class="nav-link dropdown-toggle hidden-arrow text-white text-small d-flex align-items-center"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            @include('user.components.imagename')
                        </a>
                        <ul class="dropdown-menu text-small shadow dropdown-menu-start">
                            @include('user.components.usermenu')
                        </ul>
                    </div>
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

    @stack('jsscripts')

</body>

</html>