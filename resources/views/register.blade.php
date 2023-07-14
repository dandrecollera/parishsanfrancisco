<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('WEB_TITLE'))</title>

    <link rel="stylesheet" href="{{ asset('css/mdb.min.css')}}">
    <link rel="icon" type="image/ico" href="{{ asset('favicon/favicon.ico') }}">

    <script src="https://kit.fontawesome.com/55faa7e024.js" crossorigin="anonymous"></script>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            color: black;
        }

        .center-login {
            width: 100%;
        }

        body {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ececec;
        }
    </style>

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card center-login">

            <div class="card-body p-5">
                <center>
                    <img src="{{ asset('img/Logo.png') }}" alt="logo" height="90" class="mb-3">
                    <h5 class="mb-3">Register</h5>
                </center>

                @isset($err)
                <div class="sumb-alert alert alert-{{ !empty($errors[$err][1]) ? $errors[$err][1] : 'alert' }}"
                    role="alert">
                    {{ !empty($errors[$err][0]) ? $errors[$err][0] : 'error' }}
                </div>
                @endisset

                <form method="POST" action="">
                    @csrf
                    <div class="form-outline mt-2 mb-2">
                        <input type="email" class="form-control" name="email" id="email" required>
                        <label for="email" class="form-label">Email*</label>
                    </div>

                    <div class="form-outline my-3" style="min-width:200px">
                        <a id="show1" href="#" style="color: inherit;"><i class="fas fa-eye-slash trailing pe-auto"
                                id="eye1"></i></a>
                        <input type="password" id="password" class="form-control" name="password" required />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="input-group my-3">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                            <label class="form-label" for="firstname">First Name*</label>
                        </div>
                        <div class="form-outline">
                            <input type="text" class="form-control" name="middlename" id="middlename">
                            <label class="form-label overflow-x-scroll pe-2" for="middlename">Middle
                                Name</label>
                        </div>
                        <div class="form-outline">
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                            <label class="form-label" for="lastname">Last Name*</label>
                        </div>
                    </div>

                    <div class="form-outline my-3">
                        <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                        <label for="birthdate" class="form-label">Birthdate*</label>
                    </div>

                    <div class="input-group mb-3">
                        <select name="gender" id="gender" class="form-select" required>
                            <option selected hidden value="">Gender*</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBTQIA+">LGBTQIA+</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <select name="province" id="province" class="form-select" required>
                            <option selected hidden value="">Province*</option>
                            @foreach ($province as $pr)
                            <option value="{{ $pr->id }}">{{ $pr->province_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3" id="munhide" hidden>
                        <select name="municipality" id="municipality" class="form-select" required>
                            <option selected hidden value="">Municipality*</option>

                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary w-100 mt-4">Register</button>
                </form>

                <div class="mt-3" style="font-size: 12px">
                    <span style="color: #b1b1b1">Already have an account?</span> <a href="/">
                        Login here
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/mdb.min.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#show1').on('click', function() {
                if($('#password').attr('type') == "text"){
                    $('#password').attr('type', 'password');
                    $('#eye1').addClass( "fa-eye-slash" );
                    $('#eye1').removeClass( "fa-eye" );
                } else{
                    $('#password').attr('type', 'text');
                    $('#eye1').addClass( "fa-eye" );
                    $('#eye1').removeClass( "fa-eye-slash" );
                }
            });
            $('#show2').on('click', function() {
                if($('#password2').attr('type') == "text"){
                    $('#password2').attr('type', 'password');
                    $('#eye2').addClass( "fa-eye-slash" );
                    $('#eye2').removeClass( "fa-eye" );
                } else{
                    $('#password2').attr('type', 'text');
                    $('#eye2').addClass( "fa-eye" );
                    $('#eye2').removeClass( "fa-eye-slash" );
                }
            });
            $('#province').change(function() {
                $('#munhide').removeAttr('hidden');
                var value1 = $('#province').val();
                $.get('/getMunicipality/' + encodeURIComponent(value1), function(data){
                    var options = '';
                    $.each(data, function(key, value){
                        options += '<option value="' + key + '">' + value  +'</option>';
                    });
                    $('#municipality').html(options);
                });
            });
        });
    </script>

</body>

</html>