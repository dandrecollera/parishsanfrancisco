@extends('admin.components.modal')

@section('content')
<form method="POST" action="/adminvolunteer_edit_process" target="_parent">
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

    <h4>Ministries</h4>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="music" id="music" value="Liturgical Music Ministry"
            {{in_array('Liturgical Music Ministry', $selected->ministry, ) ? 'checked' : ''}}>
        <label class="form-check-label" for="music">Liturgical Music Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="youth" id="youth" value="Parish Youth Ministry"
            {{in_array('Parish Youth Ministry', $selected->ministry, ) ? 'checked' : ''}}>
        <label class="form-check-label" for="youth">Parish Youth Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="lectors" id="lectors"
            value="Ministry of Lectors and Commentators" {{in_array('Ministry of Lectors and Commentators',
            $selected->ministry, ) ? 'checked' : ''}}>
        <label class="form-check-label" for="lectors">
            Ministry of Lectors and Commentators</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="communications" id="communications"
            value="Social Communications Ministry" {{in_array('Social Communications Ministry', $selected->ministry, ) ?
        'checked' : ''}}>
        <label class="form-check-label" for="communications">Social Communications Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="cathechetical" id="cathechetical"
            value="Cathechetical Ministry" {{in_array('Cathechetical Ministry', $selected->ministry, ) ? 'checked' :
        ''}}>
        <label class="form-check-label" for="cathechetical">Cathechetical Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="ushers" id="ushers"
            value="Ministry of Ushers Greeters and Collectors" {{in_array('Ministry of Ushers Greeters and Collectors',
            $selected->ministry, ) ? 'checked' : ''}}>
        <label class="form-check-label" for="ushers">Ministry of Ushers Greeters and Collectors</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="servers" id="servers" value="Ministry of Altar Servers"
            {{in_array('Ministry of Altar Servers', $selected->ministry, ) ? 'checked' : ''}}>
        <label class="form-check-label" for="servers">Ministry of Altar Servers</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="lay" id="lay" value="Ministry of Lay Minister"
            {{in_array('Ministry of Lay Minister', $selected->ministry, ) ? 'checked' : ''}}>
        <label class="form-check-label" for="lay">Ministry of Lay Minister</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="butler" id="butler"
            value="Ministry of Mother Butler Guild" {{in_array('Ministry of Mother Butler Guild', $selected->ministry, )
        ? 'checked' : ''}}>
        <label class="form-check-label" for="butler">Ministry of Mother Butler Guild</label>
    </div>

    <input type="hidden" name="id" value="{{$selected->id}}">
    <button type="submit" class="btn btn-primary mt-3 float-end">Edit Volunteer</button>
</form>
@endsection