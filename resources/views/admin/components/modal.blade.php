<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('WEB_TITLE'))</title>

    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="icon" type="image/ico" href="{{ asset('favicon/favicon.ico') }}">

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
    </style>

</head>

<body>

    <div class="p-3">
        @yield('content')
    </div>

    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/mdb.min.js')}}"></script>

    @stack('jsscripts')
</body>

</html>