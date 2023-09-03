@extends('admin.components.modal')

@section('content')
<form method="POST" action="/adminstatusupdate_process" target="_parent">
    @csrf

    <h4>Edit Status</h4>
    <select name="status" id="status" class="form-select mb-3">
        <option value="Pending" selected>Pending</option>
        <option value="Scheduled">Scheduled</option>
        <option value="Completed">Completed</option>
        <option value="Reschedule">Reschedule</option>
        <option value="Cancelled">Cancelled</option>
    </select>

    <div id="rescheddiv" class="mb-3" hidden>
        <h4>Resechedule</h4>

        <label for="starttime" class="form-label">Start Time*</label>
        <div class="form-outline mb-3">
            <input type="time" id="starttime" name="starttime" class="form-control" required
                value="{{$dbdata->end_time}}">
        </div>

        <label for="endtime" class="form-label">End Time*</label>
        <div class="form-outline mb-4">
            <input type="time" id="endtime" name="endtime" class="form-control" required value="{{$dbdata->end_time}}">
        </div>

        <label for="endtime" class="form-label">Resched Date*</label>
        <div class="form-outline mb-4">
            <input type="date" id="date" name="date" class="form-control" required value="{{$dbdata->event_date}}">
        </div>
    </div>

    <input type="text" name="id" value="{{$selectedreservation}}">
    <input type="text" name="calendarid" value="{{$dbdata->calendar_id}}">
    <button type="submit" class="btn btn-primary mt-1 float-end">Update Status</button>
</form>



@endsection

@push('jsscripts')
<script type="text/javascript">
    $(document).ready(function() {
        toggleReschedDiv();

        $("#status").change(function() {
            toggleReschedDiv();
        });
    });

    function toggleReschedDiv() {
        var selectedOption = $("#status").val();
        var rescheddiv = $("#rescheddiv");

        if (selectedOption === "Reschedule") {
            rescheddiv.removeAttr("hidden");
        } else {
            rescheddiv.attr("hidden", true);
        }
    }
</script>
@endpush