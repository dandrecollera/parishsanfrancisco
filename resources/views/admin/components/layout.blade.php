<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('WEB_TITLE'))</title>

    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebartop.css') }}">

    @yield('style')

    <link rel="icon" type="image/ico" href="{{ asset('favicon/favicon.ico') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/55faa7e024.js" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 2px;
            height: 2px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.0);
        }

        .list-group-item-spec {
            background-color: #3b3737;
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar list-group-item-spec">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">

                    @include('admin.components.sidemenu')

                    <div class="dropdown py-2 mx-2 mt-2 d-block d-lg-none">
                        <a class="nav-link dropdown-toggle hidden-arrow text-white text-small d-flex align-items-center"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            @include('admin.components.imagename')
                        </a>
                        <ul class="dropdown-menu text-small shadow dropdown-menu-start">
                            @include('admin.components.usermenu')
                        </ul>
                    </div>

                </div>
            </div>
        </nav>


        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
            <div class="container-fluid">
                <a href="/admin" class="navbar-brand fw-bolder ps-2 text-white">
                    <img src="{{asset('img/Logo.png')}}" alt="logo" height="60"> <span
                        style="text-transform: capitalize;">
                        {{$userinfo[1]}}
                    </span>

                </a>

                <div class="btn-group shadow-0 d-none d-lg-block">
                    <a type="button" class="dropdown-toggle hidden-arrow pe-3" id="dropdownMenuButton"
                        data-mdb-toggle="dropdown">
                        @include('admin.components.imagename')
                    </a>
                    <ul class="dropdown-menu">
                        @include('admin.components.usermenu')
                    </ul>
                </div>

                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu">
                    <i class="fas fa-bars" style="color:white"></i>
                </button>
            </div>
        </nav>
    </header>

    <main style="margin-top: 90px">
        <div class="container pt-2 pt-lg-4">
            @yield('content')
        </div>
    </main>

    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/mdb.min.js')}}"></script>

    @stack('jsscripts')
</body>

</html>