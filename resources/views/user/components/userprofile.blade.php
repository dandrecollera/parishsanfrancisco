@extends('user.components.layout')

@section('content')
<main style="min-height: 100vh" class="mt-3 pt-3">
    <div class="container-xl">

        <h1>User Profile</h1>

        <h4>Personal Information</h4>
        <div class="form-outline mb-3">
            <input type="email" class="form-control" name="email" id="email" value="{{$userinfo[2]}}" readonly>
            <label for="email" class="form-label">Email*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="username" id="username" value="{{$userinfo[3]}}" readonly>
            <label for="username" class="form-label">Username*</label>
        </div>

        <div class="input-group mb-3">
            <div class="form-outline">
                <input type="text" class="form-control" name="firstname" id="firstname" value="{{$userinfo[4]}}"
                    readonly>
                <label class="form-label" for="firstname">First Name*</label>
            </div>
            <div class="form-outline">
                <input type="text" class="form-control" name="middlename" id="middlename" value="{{$userinfo[5]}}"
                    readonly>
                <label class="form-label overflow-x-scroll pe-2" for="middlename">Middle
                    Name</label>
            </div>
            <div class="form-outline">
                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$userinfo[6]}}" readonly>
                <label class="form-label" for="lastname">Last Name*</label>
            </div>
        </div>

        <div class="form-outline mb-3">
            <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$userinfo[7]}}" readonly>
            <label for="birthdate" class="form-label">Birthdate*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="gender" name="gender" class="form-control" value="{{$userinfo[8]}}" readonly>
            <label for="gender" class="form-label">Gender*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="province" name="province" class="form-control" value="{{$userinfo[9]}}" readonly>
            <label for="geprovincender" class="form-label">Province*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="municipality" name="municipality" class="form-control" value="{{$userinfo[10]}}"
                readonly>
            <label for="municipality" class="form-label">Municipality*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" id="contactInput" name="contactInput" class="form-control" value="{{$userinfo[11]}}"
                readonly>
            <label for="contactInput" class="form-label">Mobile Number*</label>
        </div>


    </div>
</main>




@endsection

@push('jsscripts')
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
                var options = '';
                var sortedData = Object.entries(data).sort((a, b) => a[1].localeCompare(b[1]));

                $.each(sortedData, function(key, value) {
                    options += '<option value="' + value[0] + '">' + value[1] + '</option>';
                });

                $('#municipality').html(options);
            });
        });
    });
</script>
@endpush