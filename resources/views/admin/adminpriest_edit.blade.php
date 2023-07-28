@extends('admin.components.modal')

@section('content')
<form method="POST" action="/adminpriest_edit_process" target="_parent">
    @csrf

    <div class="input-group mb-3">
        <div class="form-outline">
            <input type="text" class="form-control" name="firstname" id="firstname" value="{{$selected->firstname}}"
                required>
            <label class="form-label" for="firstname">First Name*</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="middlename" id="middlename" value="{{$selected->middlename}}">
            <label class="form-label overflow-x-scroll pe-2" for="middlename">Middle
                Name</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$selected->lastname}}"
                required>
            <label class="form-label" for="lastname">Last Name*</label>
        </div>
    </div>

    <div class="form-outline mb-3">
        <input type="email" class="form-control" name="email" id="email" value="{{$selected->email}}" required>
        <label for="email" class="form-label">Email*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$selected->birthdate}}"
            required>
        <label for="birthdate" class="form-label">Birthdate*</label>
    </div>

    <div class="form-outline mb-3">
        <input maxlength="11" min="0" data-mdb-showcounter="true" type="number" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==11) return false;" class="form-control" name="mobilenumber"
            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="contactInput"
            value="{{$selected->mobilenumber}}" required>
        <label class=" form-label" for="contactInput">Mobile Number*</label>
        <div class="form-helper"></div>
    </div>

    <div class="form-outline mb-3">
        <textarea class="form-control" name="address" id="address" rows="4">{{$selected->address}}</textarea>
        <label class="form-label" for="address">Address</label>
    </div>

    <div class="input-group mb-3">
        <select name="position" id="position" class="form-select" required>
            <option value="Main Priest" {{$selected->position == "Main Priest" ? 'selected' : ''}}>Main Priest</option>
            <option value="Priest" {{$selected->position == "Priest" ? 'selected' : ''}}>Priest</option>
        </select>
    </div>

    <div class="form-outline">
        <input type="text" class="form-control" name="conventual" id="conventual" value="{{$selected->conventual}}"
            required>
        <label class="form-label" for="conventual">Conventual*</label>
    </div>

    <input type="hidden" name="id" value="{{$selected->id}}">
    <button type="submit" class="btn btn-primary mt-3 float-end">Edit Priest</button>
</form>
@endsection