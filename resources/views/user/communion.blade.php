@extends('user.components.modal')

@section('content')
<form method="POST" action="/communion_add_process" target="_parent" enctype="multipart/form-data">
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

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="principal" id="principal" required>
        <label class="form-label" for="principal">Name of Principal*</label>
    </div>

    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="secretary" id="secretary" required>
        <label class="form-label" for="secretary">Name of Secretary*</label>
    </div>

    <div class="form-outline mb-3">
        <textarea class="form-control" name="address" id="address" rows="4"></textarea>
        <label class="form-label" for="address">Address of School*</label>
    </div>

    <div class="form-outline mb-3">
        <input ype="number" class="form-control" name="student" required>
        <label class=" form-label" for="student">Total No. of Student*</label>
    </div>

    <div class="form-outline mb-3">
        <input ype="number" class="form-control" name="male" required>
        <label class=" form-label" for="male">No. of Male*</label>
    </div>

    <div class="form-outline mb-3">
        <input ype="number" class="form-control" name="female" required>
        <label class=" form-label" for="female">No. of Female*</label>
    </div>



    <label for="InputGroupFile01" class="form-label">Baptismal Certificate (Original/Xerox):</label>
    <div class="input-group mb-3">
        <input type="file" name="requirement" class="form-control" id="inputGroupFile01" required>
    </div>

    <label for="InputGroupFile01" class="form-label">Birth Certificate (Original/Xerox):</label>
    <div class="input-group mb-3">
        <input type="file" name="requirement2" class="form-control" id="inputGroupFile01" required>
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