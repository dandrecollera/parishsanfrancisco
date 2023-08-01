@extends('admin.components.modal')

@section('content')
<form method="POST" action="/adminvolunteer_add_process" target="_parent">
    @csrf

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

    <div class="form-outline mb-3">
        <input maxlength="11" min="0" data-mdb-showcounter="true" type="number" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==11) return false;" class="form-control" name="mobilenumber"
            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="contactInput" required>
        <label class=" form-label" for="contactInput">Mobile Number*</label>
        <div class="form-helper"></div>
    </div>

    <div class="form-outline mb-3">
        <textarea class="form-control" name="address" id="address" rows="4"></textarea>
        <label class="form-label" for="address">Address</label>
    </div>

    <h4>Ministries</h4>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="music" id="music" value="Liturgical Music Ministry">
        <label class="form-check-label" for="music">Liturgical Music Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="youth" id="youth" value="Parish Youth Ministry">
        <label class="form-check-label" for="youth">Parish Youth Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="lectors" id="lectors"
            value="Ministry of Lectors and Commentators">
        <label class="form-check-label" for="lectors">
            Ministry of Lectors and Commentators</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="communications" id="communications"
            value="Social Communications Ministry">
        <label class="form-check-label" for="communications">Social Communications Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="cathechetical" id="cathechetical"
            value="Cathechetical Ministry">
        <label class="form-check-label" for="cathechetical">Cathechetical Ministry</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="ushers" id="ushers"
            value="Ministry of Ushers Greeters and Collectors">
        <label class="form-check-label" for="ushers">Ministry of Ushers Greeters and Collectors</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="servers" id="servers" value="Ministry of Altar Servers">
        <label class="form-check-label" for="servers">Ministry of Altar Servers</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="lay" id="lay" value="Ministry of Lay Minister">
        <label class="form-check-label" for="lay">Ministry of Lay Minister</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="butler" id="butler"
            value="Ministry of Mother Butler Guild">
        <label class="form-check-label" for="butler">Ministry of Mother Butler Guild</label>
    </div>

    <button type="submit" class="btn btn-primary mt-3 float-end">Add Volunteer</button>
</form>
@endsection