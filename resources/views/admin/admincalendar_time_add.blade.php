@extends('admin.components.modal')



@section('content')
<h4 class="mb-3">
    {{ \Carbon\Carbon::create($query['year'], $query['month'], $query['day'])->format('F j, Y') }}
</h4>

<form action="admincalendar_time_add_process" method="post" target="_parent">
    @csrf
    <label for="starttime" class="form-label">Start Time*</label>
    <div class="form-outline mb-3">
        <input type="time" id="starttime" name="starttime" class="form-control" required>
    </div>

    <label for="endtime" class="form-label">End Time*</label>
    <div class="form-outline mb-4">
        <input type="time" id="endtime" name="endtime" class="form-control" required>
    </div>

    <div class="input-group mb-3">
        <select name="service" id="service" class="form-select" required>
            <option selected hidden value="">Service*</option>
            <option value="Baptism">Baptism</option>
            <option value="Funeral Mass">Funeral Mass</option>
            <option value="Anointing Of The Sick">Anointing Of The Sick</option>
            <option value="Blessing">Blessing</option>
            <option value="Kumpil">Kumpil</option>
            <option value="First Communion">First Communion</option>
            <option value="Wedding">Wedding</option>
        </select>
    </div>

    <div>
        <div class="form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="eventtype" id="regular" value="Regular" checked>
            <label class="form-check-label" for="special">Regular Event</label>
        </div>
        <div class="form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="eventtype" id="community" value="Community">
            <label class="form-check-label" for="community">Community Event</label>
        </div>
        <div class="form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="eventtype" id="special" value="Special">
            <label class="form-check-label" for="special">Special Event</label>
        </div>
    </div>

    <div class="form-outline" id="slotcontainer" hidden>
        <input type="number" class="form-control" name="slot" id="slot">
        <label class="form-label" for="slot">Slot*</label>
    </div>

    <input type="hidden" name="day" value="{{$query['day']}}">
    <input type="hidden" name="month" value="{{$query['month']}}">
    <input type="hidden" name="year" value="{{$query['year']}}">
    <button type="submit" class="btn btn-primary mt-3 float-end">Add Schedule</button>
</form>

@endsection

@push('jsscripts')
<script type="text/javascript">
    $(document).ready(function() {
        // Function to handle radio button click
        function handleRadioClick() {
            const communityRadio = $('#community');
            const slotDiv = $('#slotcontainer');

            if (communityRadio.prop('checked')) {
                slotDiv.prop('hidden', false);
            } else {
                slotDiv.prop('hidden', true);
                $('#slot').val('');
            }
        }

        // Call the function on page load to initialize the state
        handleRadioClick();

        // Attach the event listener to the radio button click event
        $('input[name="eventtype"]').on('click', handleRadioClick);
    });
</script>
@endpush