@extends('admin.components.modal')

@section('content')
<form method="POST" action="/adminuser_add_process" target="_parent">
    @csrf

    <div class="input-group mb-3">
        <select name="type" id="type" class="form-select" required>
            <option selected hidden value="">Account Type*</option>
            <option value="admin">Admin</option>
            <option value="secretary">Secretary</option>
            <option value="media">Media</option>
            <option value="user">User</option>
        </select>
    </div>

    <div class="form-outline mb-3">
        <input type="email" class="form-control" name="email" id="email" required>
        <label for="email" class="form-label">Email*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="username" id="username" required>
        <label for="username" class="form-label">Username*</label>
    </div>

    <div class="form-outline mb-3" style="min-width:200px">
        <a id="show1" href="#" style="color: inherit;"><i class="fas fa-eye-slash trailing pe-auto" id="eye1"></i></a>
        <input type="password" id="password" class="form-control" name="password" required />
        <label class="form-label" for="password">Password*</label>
    </div>

    <div class="form-outline mb-3" style="min-width:200px">
        <a id="show2" href="#" style="color: inherit;"><i class="fas fa-eye-slash trailing pe-auto" id="eye2"></i></a>
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
        <input maxlength="11" min="0" data-mdb-showcounter="true" type="number" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==11) return false;" class="form-control" name="mobilenumber"
            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="contactInput" required>
        <label class=" form-label" for="contactInput">Mobile Number*</label>
        <div class="form-helper"></div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 float-end">Add user</button>
</form>
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
                var options = '<option selected hidden value="">Municipality*</option>';
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