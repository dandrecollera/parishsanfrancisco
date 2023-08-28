@extends('user.components.modal')

@section('content')
<form method="POST" action="/wedding_add_process" target="_parent" enctype="multipart/form-data">
    @csrf

    <h3>{{$date->event_type}} {{$date->service}}</h3>
    <br>
    {{-- Name --}}
    <div class="input-group mb-3">
        <div class="form-outline">
            <input type="text" class="form-control" name="firstname" id="firstname" value="{{$userinfo[4]}}" required
                readonly>
            <label class="form-label" for="firstname">First Name*</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="middlename" id="middlename" value="{{$userinfo[5]}}" readonly>
            <label class="form-label overflow-x-scroll pe-2" for="middlename">Middle
                Name</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$userinfo[6]}}" required
                readonly>
            <label class="form-label" for="lastname">Last Name*</label>
        </div>
    </div>

    {{-- Date --}}
    <div class="form-outline mb-3">
        <input type="date" id="appointmentdate" name="appointmentdate" class="form-control" required readonly
            value="{{ \Carbon\Carbon::create($date->year, $date->month, $date->day)->format('Y-m-d') }}">
        <label for="appointmentdate" class="form-label">Date*</label>
    </div>

    {{-- Start Time to End Time --}}
    <div class="input-group mb-3">
        <div class="form-outline">
            <input type="time" id="starttime" name="starttime" class="form-control" required readonly
                value="{{$date->start_time}}">
            <label for="birthdate" class="form-label">Start Time*</label>
        </div>
        <div class="form-outline">
            <input type="time" id="endtime" name="endtime" class="form-control" required readonly
                value="{{$date->end_time}}">
            <label for="birthdate" class="form-label">End Time*</label>
        </div>
    </div>

    {{-- Email --}}
    <div class="form-outline mb-3">
        <input type="email" class="form-control" name="email" id="email" required readonly value="{{$userinfo[2]}}">
        <label for="email" class="form-label">Email*</label>
    </div>

    {{-- Mobile Number --}}
    <div class="form-outline mb-3">
        <input ype="number" class="form-control" name="mobilenumber" required readonly value="{{$userinfo[11]}}">
        <label class=" form-label" for="contactInput">Mobile Number*</label>
    </div>

    {{-- Additional Info --}}
    <hr>

    <h4>Bride Information</h4>

    <div class="input-group mb-3">
        <div class="form-outline">
            <input type="text" class="form-control" name="bfirstname" id="bfirstname" required>
            <label class="form-label" for="bfirstname">First Name*</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="bmiddlename" id="bmiddlename">
            <label class="form-label overflow-x-scroll pe-2" for="bmiddlename">Middle
                Name</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="blastname" id="blastname" required>
            <label class="form-label" for="lastname">Last Name*</label>
        </div>
    </div>

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="bmothersname" id="bmothersname" required>
        <label class="form-label" for="bmothersname">Mother's Name*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="bfathersname" id="bfathersname" required>
        <label class="form-label" for="bfathersname">Father's Name*</label>
    </div>


    <div class="form-outline mb-3">
        <input type="number" class="form-control" name="bage" id="bage" required>
        <label class="form-label" for="bage">Age*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="date" id="bdatebirth" name="bdatebirth" class="form-control" required>
        <label for="bdatebirth" class="form-label">Date of Birth*</label>
    </div>

    <div class="form-outline mb-4">
        <input maxlength="11" min="0" data-mdb-showcounter="true" type="number" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==11) return false;" class="form-control" name="bmobilenumber"
            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="bmobilenumber" required>
        <label class=" form-label" for="bmobilenumber">Mobile Number*</label>
        <div class="form-helper"></div>
    </div>

    <div class="form-outline mb-3">
        <input type="email" class="form-control" name="bemail" id="bemail" required>
        <label for="bemail" class="form-label">Email*</label>
    </div>

    <div class="form-outline mb-3">
        <textarea class="form-control" name="baddress" id="baddress" rows="4"></textarea>
        <label class="form-label" for="baddress">Address*</label>
    </div>

    <hr>

    <h4>Groom Information</h4>

    <div class="input-group mb-3">
        <div class="form-outline">
            <input type="text" class="form-control" name="gfirstname" id="gfirstname" required>
            <label class="form-label" for="gfirstname">First Name*</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="gmiddlename" id="gmiddlename">
            <label class="form-label overflow-x-scroll pe-2" for="gmiddlename">Middle
                Name</label>
        </div>
        <div class="form-outline">
            <input type="text" class="form-control" name="glastname" id="glastname" required>
            <label class="form-label" for="glastname">Last Name*</label>
        </div>
    </div>

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="gmothersname" id="gmothersname" required>
        <label class="form-label" for="gmothersname">Mother's Name*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="gfathersname" id="gfathersname" required>
        <label class="form-label" for="gfathersname">Father's Name*</label>
    </div>


    <div class="form-outline mb-3">
        <input type="number" class="form-control" name="gage" id="gage" required>
        <label class="form-label" for="gage">Age*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="date" id="gdatebirth" name="gdatebirth" class="form-control" required>
        <label for="gdatebirth" class="form-label">Date of Birth*</label>
    </div>

    <div class="form-outline mb-4">
        <input maxlength="11" min="0" data-mdb-showcounter="true" type="number" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==11) return false;" class="form-control" name="gmobilenumber"
            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187" id="gmobilenumber" required>
        <label class=" form-label" for="gmobilenumber">Mobile Number*</label>
        <div class="form-helper"></div>
    </div>

    <div class="form-outline mb-3">
        <input type="email" class="form-control" name="gemail" id="gemail" required>
        <label for="gemail" class="form-label">Email*</label>
    </div>

    <div class="form-outline mb-3">
        <textarea class="form-control" name="gaddress" id="gaddress" rows="4"></textarea>
        <label class="form-label" for="gaddress">Address*</label>
    </div>

    <label for="InputGroupFile01" class="form-label">Requirement:</label>
    <div class="input-group mb-3">
        <input type="file" name="requirement" class="form-control" id="inputGroupFile01" required>
    </div>

    <input type="hidden" name="sid" value="{{$date->id}}">
    <button type="button" class="btn btn-primary mt-3 mb-3 float-end" data-mdb-toggle="modal"
        data-mdb-target="#addeditmodal" id="reservebutton">Reserve</button>


    <div class="modal fade" id="addeditmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addeditmodalLabel">
                        <div>Payment</div>
                    </h1>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="{{ asset('img/gcash_qr.png') }}" alt="qr" style="max-width: 75%" class="mb-2">
                        <br>
                        <h5>₱{{number_format($price->amount, 2, '.', ',')}}</h5>
                    </center>
                    <label for="InputGroupFile01" class="form-label">Receipt:</label>
                    <div class="input-group mb-3">
                        <input type="file" name="receipt" class="form-control" id="inputGroupFile02" required>
                    </div>
                    <center>
                        <input type="hidden" name="amount" value="{{$price->amount}}">
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Continue</button>

                    </center>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection