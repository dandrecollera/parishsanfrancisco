@extends('admin.components.layout')

@section('content')
<div class="container-xl">
    @if(!empty($error))
    <div class="row">
        <div class="col">
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <h4 class="alert-heading">Error</h4>
                <p>{{ $errorlist[(int) $error] }}</p>
                <button class="btn-close" type="button" data-mdb-dismiss="alert"></button>
            </div>
        </div>
    </div>
    @endif
    @if(!empty($notif))
    <div class="row">
        <div class="col">
            <div role="alert" class="alert alert-primary alert-dismissible fade show">
                <h4 class="alert-heading">Success</h4>
                <p>{{ $notiflist[(int) $notif] }}</p>
                <button class="btn-close" type="button" data-mdb-dismiss="alert"></button>
            </div>
        </div>
    </div>
    @endif
    <h1>User Settings</h1>
    <form method="POST" action="/adminsettings_edit_process" target="_parent">
        @csrf

        <h4>Personal Information</h4>
        <div class="form-outline mb-3">
            <input type="email" class="form-control" name="email" id="email" value="{{$selecteduser->email}}" required>
            <label for="email" class="form-label">Email*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="username" id="username" value="{{$selecteduser->username}}"
                required>
            <label for="username" class="form-label">Username*</label>
        </div>

        <div class="input-group mb-3">
            <div class="form-outline">
                <input type="text" class="form-control" name="firstname" id="firstname"
                    value="{{$selecteduser->firstname}}" required>
                <label class="form-label" for="firstname">First Name*</label>
            </div>
            <div class="form-outline">
                <input type="text" class="form-control" name="middlename" id="middlename"
                    value="{{$selecteduser->middlename}}">
                <label class="form-label overflow-x-scroll pe-2" for="middlename">Middle
                    Name</label>
            </div>
            <div class="form-outline">
                <input type="text" class="form-control" name="lastname" id="lastname"
                    value="{{$selecteduser->lastname}}" required>
                <label class="form-label" for="lastname">Last Name*</label>
            </div>
        </div>

        <div class="form-outline mb-3">
            <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$selecteduser->birthdate}}"
                required>
            <label for="birthdate" class="form-label">Birthdate*</label>
        </div>

        <div class="input-group mb-3">
            <select name="gender" id="gender" class="form-select" required>
                <option value="Male" {{$selecteduser->gender == "Male" ? 'selected' : ''}}>Male</option>
                <option value="Female" {{$selecteduser->gender == "Female" ? 'selected' : ''}}>Female</option>
                <option value="LGBTQIA+" {{$selecteduser->gender == "LGBTQIA+" ? 'selected' : ''}}>LGBTQIA+</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <select name="province" id="province" class="form-select" required>
                @foreach ($province as $pr)
                <option value="{{ $pr->id }}" {{$selecteduser->province == $pr->id ? 'selected' : ''}}>{{
                    $pr->province_name
                    }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3" id="munhide">
            <select name="municipality" id="municipality" class="form-select" required>
                @foreach($municipality as $mun)
                <option value="{{ $mun->id }}" {{$selecteduser->municipality == $mun->id ? 'selected' : ''}}>{{
                    $mun->municipality_name }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-outline mb-3">
            <input maxlength="11" min="0" data-mdb-showcounter="true" type="number" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==11) return false;" class="form-control" name="mobilenumber"
                onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="contactInput"
                value="{{$selecteduser->mobilenumber}}" required>
            <label class=" form-label" for="contactInput">Mobile Number*</label>
            <div class="form-helper"></div>
        </div>

        <input type="hidden" name="id" value="{{$selecteduser->id}}">
        <button type="submit" class="btn btn-primary mt-3 float-end">Confirm</button>
    </form>
    <br><br>
    <hr>
    <form action="/adminsettings_pass_process" method="POST" target="_parent">
        @csrf
        <h4>Change Password</h4>
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
        <input type="hidden" name="id" value="{{$selecteduser->id}}">
        <button type="submit" class="btn btn-primary mt-1 float-end">Change Password</button>
    </form>

</div>



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