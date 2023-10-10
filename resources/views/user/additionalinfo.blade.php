@extends('user.components.modal')

@section('content')
<h3>{{$info->event_type}} {{$info->service}}</h3>
<br>

<div class="input-group mb-3">
    <div class="form-outline">
        <input type="text" class="form-control" name="firstname" id="firstname" value="{{$info->firstname}}" required
            readonly>
        <label class="form-label" for="firstname">First Name</label>
    </div>
    <div class="form-outline">
        <input type="text" class="form-control" name="middlename" id="middlename" value="{{$info->middlename}}"
            readonly>
        <label class="form-label overflow-x-scroll pe-2" for="middlename">Middle
            Name</label>
    </div>
    <div class="form-outline">
        <input type="text" class="form-control" name="lastname" id="lastname" value="{{$info->lastname}}" required
            readonly>
        <label class="form-label" for="lastname">Last Name</label>
    </div>
</div>


<div class="form-outline mb-3">
    <input type="date" id="appointmentdate" name="appointmentdate" class="form-control" required readonly
        value="{{ \Carbon\Carbon::create($info->year, $info->month, $info->day)->format('Y-m-d') }}">
    <label for="appointmentdate" class="form-label">Date</label>
</div>

<div class="input-group mb-3">
    <div class="form-outline">
        <input type="time" id="starttime" name="starttime" class="form-control" required readonly
            value="{{$info->start_time}}">
        <label for="birthdate" class="form-label">Start Time</label>
    </div>
    <div class="form-outline">
        <input type="time" id="endtime" name="endtime" class="form-control" required readonly
            value="{{$info->end_time}}">
        <label for="birthdate" class="form-label">End Time</label>
    </div>
</div>


<div class="form-outline mb-3">
    <input type="email" class="form-control" name="email" id="email" required readonly value="{{$info->email}}">
    <label for="email" class="form-label">Email</label>
</div>


<div class="form-outline mb-3">
    <input type="number" class="form-control" name="mobilenumber" required readonly value="{{$info->mobilenumber}}">
    <label class=" form-label" for="contactInput">Mobile Number</label>
</div>

{{-- Additional Info --}}


<hr>

@if ($service->service == "Baptism")
<div class="form-outline mb-3">
    <input type="text" class="form-control" name="fathersname" id="fathersname" readonly
        value="{{$info->fathers_name}}">
    <label class="form-label" for="fathersname">Father's Name</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="mothersname" id="mothersname" readonly
        value="{{$info->mothers_name}}">
    <label class="form-label" for="mothersname">Mother's Name</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="childname" id="childname" readonly value="{{$info->childs_name}}">
    <label class="form-label" for="childname">Child's Name</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="childname" id="childname" readonly value="{{$info->gender}}">
    <label class="form-label" for="childname">Gender</label>
</div>

<div class="form-outline mb-3">
    <input type="date" id="datebirth" name="datebirth" class="form-control" readonly value="{{$info->date_of_birth}}">
    <label for="datebirth" class="form-label">Date of Birth</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="placeofbirth" id="placeofbirth" readonly
        value="{{$info->place_of_birth}}">
    <label class="form-label" for="placeofbirth">Place of Birth</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="address" id="address" rows="4" readonly>{{$info->address}}</textarea>
    <label class="form-label" for="address">Address</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="godfather" readonly value="{{$info->no_of_godfather}}">
    <label class=" form-label" for="godfather">No. of Godfather</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="godmother" readonly value="{{$info->no_of_godmother}}">
    <label class=" form-label" for="godmother">No. of Godmother</label>
</div>

<h5>Birth Certificate</h5>
<a href="/storage/baptism/requirement/{{$info->requirement}}" target="_blank">{{$info->requirement}}</a>


<h5>Receipt</h5>
<a href="/storage/baptism/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif

@if ($service->service == "Funeral Mass")
<div class="form-outline mb-3">
    <input type="text" class="form-control" name="relationship" id="relationship" required readonly
        value="{{$info->relationship}}">
    <label class="form-label" for="relationship">Relationship to the Deceased</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="deceasedname" id="deceasedname" required readonly
        value="{{$info->name}}">
    <label class="form-label" for="deceasedname">Name of the Deceased</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="age" required readonly value="{{$info->age}}">
    <label class=" form-label" for="age">Age</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="age" required readonly value="{{$info->gender}}">
    <label class=" form-label" for="age">Gender</label>
</div>

<div class="form-outline mb-3">
    <input type="date" id="datebirth" name="datebirth" class="form-control" required readonly
        value="{{$info->dateofbirth}}">
    <label for="datebirth" class="form-label">Date of Birth</label>
</div>

<div class="form-outline mb-3">
    <input type="date" id="passingdate" name="passingdate" class="form-control" required readonly
        value="{{$info->dateofpassing}}">
    <label for="passingdate" class="form-label">Date of Passing</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="address" id="address" rows="4" required readonly>{{$info->location}}</textarea>
    <label class="form-label" for="address">Location of Interment</label>
</div>

<h5>Death Certificate</h5>
<a href="/storage/funeral/requirement/{{$info->requirement}}" target="_blank">{{$info->requirement}}</a>


<h5>Receipt</h5>
<a href="/storage/funeral/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif

@if ($service->service == "Blessing")
<div class="form-outline mb-3">
    <textarea class="form-control" name="address" id="address" rows="4" readonly>{{$info->address}}</textarea>
    <label class="form-label" for="address">Address*</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="amount" id="amount" required readonly value="{{$info->payment}}">
    <label for="email" class="form-label">Price Amount*</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="amount" id="amount" required readonly value="{{$info->requirement}}">
    <label for="email" class="form-label">Blessing Type</label>
</div>

<h5>Receipt</h5>
<a href="/storage/blessing/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif

@if ($service->service == "Anointing Of The Sick")
<div class="form-outline mb-3">
    <input type="text" class="form-control" name="relationship" id="relationship" required readonly
        value="{{$info->relationship}}">
    <label class="form-label" for="relationship">Relationship to the Sick</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="deceasedname" id="deceasedname" required readonly
        value="{{$info->name}}">
    <label class="form-label" for="deceasedname">Name of the Sick</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="age" required readonly value="{{$info->age}}">
    <label class=" form-label" for="age">Age</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="age" required readonly value="{{$info->gender}}">
    <label class=" form-label" for="age">Gender</label>
</div>

<div class="form-outline mb-3">
    <input type="date" id="datebirth" name="datebirth" class="form-control" required readonly
        value="{{$info->dateofbirth}}">
    <label for="datebirth" class="form-label">Date of Birth</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="address" id="address" rows="4" required readonly>{{$info->address}}</textarea>
    <label class="form-label" for="address">Address</label>
</div>

<h5>Receipt</h5>
<a href="/storage/anointing/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif


@if ($service->service == "Kumpil")
<div class="form-outline mb-3">
    <input type="text" class="form-control" name="principal" id="principal" readonly value="{{$info->principal}}">
    <label class="form-label" for="principal">Name of Principal*</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="secretary" id="secretary" readonly value="{{$info->secretary}}">
    <label class="form-label" for="secretary">Name of Secretary*</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="address" id="address" rows="4" readonly> {{$info->address}}</textarea>
    <label class="form-label" for="address">Address of School*</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="student" readonly value="{{$info->total_student}}">
    <label class=" form-label" for="student">Total No. of Student*</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="male" readonly value="{{$info->no_of_male}}">
    <label class=" form-label" for="male">No. of Male*</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="female" readonly value="{{$info->no_of_female}}">
    <label class=" form-label" for="female">No. of Female*</label>
</div>

<h5>Baptismal Certificate</h5>
<a href="/storage/kumpil/requirement/{{$info->requirement}}" target="_blank">{{$info->requirement}}</a>


<h5>Receipt</h5>
<a href="/storage/kumpil/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif

@if ($service->service == "First Communion")
<div class="form-outline mb-3">
    <input type="text" class="form-control" name="principal" id="principal" readonly value="{{$info->principal}}">
    <label class="form-label" for="principal">Name of Principal*</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="secretary" id="secretary" readonly value="{{$info->secretary}}">
    <label class="form-label" for="secretary">Name of Secretary*</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="address" id="address" rows="4" readonly> {{$info->address}}</textarea>
    <label class="form-label" for="address">Address of School*</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="student" readonly value="{{$info->total_student}}">
    <label class=" form-label" for="student">Total No. of Student*</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="male" readonly value="{{$info->no_of_male}}">
    <label class=" form-label" for="male">No. of Male*</label>
</div>

<div class="form-outline mb-3">
    <input ype="number" class="form-control" name="female" readonly value="{{$info->no_of_female}}">
    <label class=" form-label" for="female">No. of Female*</label>
</div>

<h5>Baptismal Certificate</h5>
<a href="/storage/communion/requirement/{{$info->requirement}}" target="_blank">{{$info->requirement}}</a>

<h5>Birth Certificate</h5>
<a href="/storage/communion/requirement2/{{$info->requirement2}}" target="_blank">{{$info->requirement}}</a>


<h5>Receipt</h5>
<a href="/storage/communion/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif

@if($service->service == "Wedding")
<h4>Bride Information</h4>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="bfirstname" id="bfirstname" readonly value="{{$info->bridename}}">
    <label class="form-label" for="bfirstname">Bride Name*</label>
</div>


<div class="form-outline mb-3">
    <input type="text" class="form-control" name="bmothersname" id="bmothersname" readonly
        value="{{$info->bridemother}}">
    <label class="form-label" for="bmothersname">Mother's Name*</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="bfathersname" id="bfathersname" readonly
        value="{{$info->bridefather}}">
    <label class="form-label" for="bfathersname">Father's Name*</label>
</div>


<div class="form-outline mb-3">
    <input type="number" class="form-control" name="bage" id="bage" readonly value="{{$info->brideage}}">
    <label class="form-label" for="bage">Age*</label>
</div>

<div class="form-outline mb-3">
    <input type="date" id="bdatebirth" name="bdatebirth" class="form-control" readonly value="{{$info->bridebirth}}">
    <label for="bdatebirth" class="form-label">Date of Birth*</label>
</div>

<div class="form-outline mb-4">
    <input type="number" class="form-control" name="bmobilenumber" id="bmobilenumber" readonly
        value="{{$info->bridenumber}}">
    <label class=" form-label" for="bmobilenumber">Mobile Number*</label>
</div>

<div class="form-outline mb-3">
    <input type="email" class="form-control" name="bemail" id="bemail" readonly value="{{$info->brideemail}}">
    <label for="bemail" class="form-label">Email*</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="baddress" id="baddress" rows="4" readonly>{{$info->brideaddress}}</textarea>
    <label class="form-label" for="baddress">Address*</label>
</div>

<hr>

<h4>Groom Information</h4>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="bfirstname" id="bfirstname" readonly value="{{$info->groomname}}">
    <label class="form-label" for="bfirstname">Bride Name*</label>
</div>


<div class="form-outline mb-3">
    <input type="text" class="form-control" name="bmothersname" id="bmothersname" readonly
        value="{{$info->groommother}}">
    <label class="form-label" for="bmothersname">Mother's Name*</label>
</div>

<div class="form-outline mb-3">
    <input type="text" class="form-control" name="bfathersname" id="bfathersname" readonly
        value="{{$info->groomfather}}">
    <label class="form-label" for="bfathersname">Father's Name*</label>
</div>


<div class="form-outline mb-3">
    <input type="number" class="form-control" name="bage" id="bage" readonly value="{{$info->groomage}}">
    <label class="form-label" for="bage">Age*</label>
</div>

<div class="form-outline mb-3">
    <input type="date" id="bdatebirth" name="bdatebirth" class="form-control" readonly value="{{$info->groombirth}}">
    <label for="bdatebirth" class="form-label">Date of Birth*</label>
</div>

<div class="form-outline mb-4">
    <input type="number" class="form-control" name="bmobilenumber" id="bmobilenumber" readonly
        value="{{$info->groomnumber}}">
    <label class=" form-label" for="bmobilenumber">Mobile Number*</label>
</div>

<div class="form-outline mb-3">
    <input type="email" class="form-control" name="bemail" id="bemail" readonly value="{{$info->groomemail}}">
    <label for="bemail" class="form-label">Email*</label>
</div>

<div class="form-outline mb-3">
    <textarea class="form-control" name="baddress" id="baddress" rows="4" readonly>{{$info->groomaddress}}</textarea>
    <label class="form-label" for="baddress">Address*</label>
</div>

<h5>Baptismal Certificate</h5>
<a href="/storage/wedding/requirement/{{$info->requirement}}" target="_blank">{{$info->requirement}}</a>

<h5>Confirmation Certificate</h5>
<a href="/storage/wedding/requirement2/{{$info->requirement2}}" target="_blank">{{$info->requirement}}</a>

<h5>CENOMAR</h5>
<a href="/storage/wedding/requirement3/{{$info->requirement3}}" target="_blank">{{$info->requirement}}</a>

<h5>Marriage License or Marriage Contract</h5>
<a href="/storage/wedding/requirement4/{{$info->requirement4}}" target="_blank">{{$info->requirement}}</a>


<h5>Receipt</h5>
<a href="/storage/wedding/receipt/{{$info->paymentimage}}" target="_blank">{{$info->paymentimage}}</a>
@endif



@endsection