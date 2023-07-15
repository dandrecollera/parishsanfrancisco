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
            max-width: 400px;
            width: 100%;
        }

        body {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ececec;
        }

        .disabled {
            color: #b1b1b1;
            text-decoration: none;
        }

        .disabled:hover {
            color: #b1b1b1;
        }
    </style>

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card center-login">

            <div class="card-body p-5">
                <center>
                    <img src="{{ asset('img/Logo.png') }}" alt="logo" height="90" class="mb-3">
                    <h5 class="mb-3">Verification</h5>
                </center>

                @isset($err)
                <div class="sumb-alert alert alert-{{ !empty($errors[$err][1]) ? $errors[$err][1] : 'alert' }}"
                    role="alert">
                    {{ !empty($errors[$err][0]) ? $errors[$err][0] : 'error' }}
                </div>
                @endisset

                <form method="POST" action="/checkOTP">
                    @csrf

                    <div class="form-outline mb-3">
                        <input maxlength="6" min="0" data-mdb-showcounter="true" type="text" class="form-control"
                            name="otp" id="otp" style="text-transform:uppercase" required>
                        <label class=" form-label" for="contactInput">OTP CODE*</label>
                        <div class="form-helper"></div>
                    </div>


                    <input type="hidden" name="token" id="tokenhidden" value="{{ $token}}">

                    <button type="submit" class="btn btn-primary w-100 mt-3">Confirm</button>

                    <div class="mt-2" style="font-size: 12px">
                        <span style="color: #b1b1b1">Didn't receive the code?</span> <a id='requestLink' href="#">
                            Request
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/mdb.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var requestLink = $('#requestLink');
            var countDown = 30;
            var timer;
            var token = $('#tokenhidden').val();

            function startCountdown(){
                requestLink.text('Request('+ countDown +')');
                requestLink.addClass('disabled');
                requestLink.off('click');

                timer = setInterval(() => {
                    countDown--;
                    requestLink.text('Request('+ countDown +')');

                    if (countDown === 0){
                        countDown = 30;
                        clearInterval(timer);
                        requestLink.removeClass('disabled');
                        requestLink.text('Request');
                        requestLink.on('click', handleRequest);
                    }
                }, 1000);
            }

            function handleRequest(event){
                event.preventDefault();
                startCountdown();

                $.ajax({
                    url: '/requestOTP?otp_token=' + token,
                    type: 'GET',
                    success: function(response) {
                        $('#ajaxResult').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#ajaxResult').html('An error occurred while processing your request.');
                    }
                });
            }

            requestLink.on('click', handleRequest);
        });
    </script>

</body>

</html>