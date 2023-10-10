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
            <div style="font-size: 12px">
                <a href="/">
                    <i class="fas fa-angle-left ps-2 pt-2" style="color: #b1b1b1"></i>
                    <span style="color: #b1b1b1">HOME</span>
                </a>
            </div>
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

                <form method="POST" action="/registration">
                    @csrf
                    <div class="form-outline mb-3">
                        <input type="email" class="form-control" name="email" id="email" required>
                        <label for="email" class="form-label">Email*</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" class="form-control" name="username" id="username" required>
                        <label for="username" class="form-label">Username*</label>
                    </div>

                    <div class="form-outline mb-3" style="min-width:200px">
                        <a id="show1" href="#" style="color: inherit;"><i class="fas fa-eye-slash trailing pe-auto"
                                id="eye1"></i></a>
                        <input type="password" id="password" class="form-control" name="password" required />
                        <label class="form-label" for="password">Password*</label>
                    </div>

                    <div class="form-outline mb-3" style="min-width:200px">
                        <a id="show2" href="#" style="color: inherit;"><i class="fas fa-eye-slash trailing pe-auto"
                                id="eye2"></i></a>
                        <input type="password" id="password2" class="form-control" name="password2" required />
                        <label class="form-label" for="password2">Confirm Password*</label>
                    </div>

                    <div class="input-group mb-3">
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

                    <div class="form-outline mb-3">
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

                    <div class="form-outline mb-3">
                        <input maxlength="11" min="0" data-mdb-showcounter="true" type="number"
                            pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                            class="form-control" name="mobilenumber"
                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="contactInput" required>
                        <label class=" form-label" for="contactInput">Mobile Number*</label>
                        <div class="form-helper"></div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
                </form>

                <div class="mt-3" style="font-size: 12px">
                    <span style="color: #b1b1b1">Already have an account?</span> <a href="/login">
                        Login here
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addeditmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addeditmodalLabel">
                        <div>Data Privacy</div>
                    </h1>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Republic Act No. 10173, also known as the Data Privacy Act of 2012 (DPA), aims to protect personal
                    data in information and communications systems both in the government and the private sector. The
                    DPA created the National Privacy Commission (NPC) which is tasked to monitor its implementation. It
                    covers the processing of personal information and sensitive personal information and sets, as its
                    basic premise, the grant of direct consent by a data subject before data processing of personal
                    information be allowed.

                    <br><br>
                    I confirm that the personal data provided here in true and connect to the nest of my knowledge and i
                    allow the San Francisco ng Assisi Parish to use my information.
                    <br>
                    <br>
                    <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Confirm</button>
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
                $.get('/getMunicipality/' + encodeURIComponent(value1), function(data) {
                    var options = '<option selected hidden value="">Municipality*</option>';
                    var sortedData = Object.entries(data).sort((a, b) => a[1].localeCompare(b[1]));

                    $.each(sortedData, function(key, value) {
                        options += '<option value="' + value[0] + '">' + value[1] + '</option>';
                    });

                    $('#municipality').html(options);
                });
            });
            $('button[type="submit"]').on('click', function(e){
                e.preventDefault();

                if(validateForm()){
                    $('#addeditmodal').modal('show');
                }
            })

            $('#addeditmodal button[data-mdb-dismiss="modal"]').on('click', function() {
                // Proceed with form submission (triggering the form submission programmatically)
                $('form').submit();
            });
        });

        function validateForm(){
            var isValid = true;
            $('input[required]').each(function(){
                if(!$(this).val()){
                    isValid = false;
                    return false;
                }
            });
            return isValid;
        }
    </script>

</body>

</html>