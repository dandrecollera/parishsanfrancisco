@extends('user.components.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection

@section('content')
<main style="min-height: 100vh; padding-top: 20px" class="container-xl">
    <div class="calendar">
        <div class="month" id="currentMonth">test</div>
        <center>
            <div class="input-group mb-2" role="group" style="min-width: 250px; max-width:400px">
                <select name="serviceSelect" id="serviceSelect" class="form-select form-select-sm">
                    <option value="" hidden>Select Service</option>
                    <option value="Baptism">Baptism</option>
                    <option value="Funeral Mass">Funeral Mass</option>
                    <option value="Anointing of the Sick">Anointing of the Sick</option>
                    <option value="Blessing">Blessing</option>
                    <option value="Kumpil">Kumpil</option>
                    <option value="First Communion">First Communion</option>
                    <option value="Wedding">Wedding</option>
                </select>
            </div>
        </center>

        <center>
            <div class="input-group mb-4" role="group" style="min-width: 250px; max-width: 400px;">
                <button id="prevMonthBtn" class="btn btn-dark btn-sm"><i
                        class="fa-solid fa-angle-left fa-xs"></i></button>
                <select id="monthSelect" class="form-select form-select-sm"></select>
                <select id="yearSelect" class="form-select form-select-sm"></select>
                <button id="nextMonthBtn" class="btn btn-dark btn-sm"><i
                        class="fa-solid fa-angle-right fa-xs"></i></button>
            </div>
        </center>

        <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="days mb-3" id="calendarDays"></div>


        <div id="daytime" hidden>
            <hr>
            <h4 id="themonth">test</h4>
            <div class="row">
                <div class="col overflow-scroll scrollable-contrainer-mb-2">
                    <table class="table table-hover" id="eventTable">
                        <thead>
                            <th scope="col"><strong>Start Time</strong></th>
                            <th scope="col"><strong>End Time</strong></th>
                            <th scope="col"><strong>Slots</strong></th>
                            <th scope="col"><strong>Event Type</strong></th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="lockmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="lockmodallabel">
                            <div>Create Reservation</div>
                        </h1>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <iframe id="reserveframe" src="" width="100%" height="450px"
                            style="border:none; height:80vh;"></iframe>
                    </div>
                </div>
            </div>
        </div>

</main>



@endsection

@push('jsscripts')
<script type="text/javascript">
    $(document).ready(function() {

    const currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);

    let selectedService = '';
    let displayedMonth = currentDate.getMonth();
    let displayedYear = currentDate.getFullYear();

    let selectedDay, selectedMonth, selectedYear;
    let lastSelectedDay = null;

    function getMonthName(month) {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return monthNames[month];
    }

    function getDaysInMonth(year, month) {
        return new Date(year, month + 1, 0).getDate();
    }


    function fetchDataForDay(year, month, day, selectedservice) {
        const finalselected = selectedservice;
        const adjustedMonth = month + 1;
        return $.get('/getDataForDayUser', {
            year: year,
            month: adjustedMonth,
            day: day,
            service: finalselected,
        });
    }

    async function fetchAndHandleData(year, month, day, link, service) {
        try {
            const data = await fetchDataForDay(year, month, day, service);
            if (data === 'Regular') {
                link.addClass('regular');
            } else if (data === 'Community') {
                link.addClass('community');
            } else if (data === 'Special') {
                link.addClass('special');
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    function createCalendar(year, month, selectedService) {
        displayedYear = year;
        displayedMonth = month;

        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const daysInMonth = getDaysInMonth(year, month);

        const currentMonthDiv = $('#currentMonth');
        currentMonthDiv.text(getMonthName(month) + ' ' + year);

        const calendarDaysDiv = $('#calendarDays');
        calendarDaysDiv.empty();

        for (let i = 0; i < firstDayOfMonth; i++) {
            calendarDaysDiv.append('<div style="background-color: rgb(33, 33, 33, 0); border: 0px solid #000000;"></div>');
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month, day);
            date.setHours(0, 0, 0, 0);
            const isToday = date.toDateString() === currentDate.toDateString();
            const isPastDay = date  < currentDate;

            if(isPastDay){
                calendarDaysDiv.append(`<div style="background-color: rgb(33, 33, 33); color:rgb(86, 86, 86); border: 1px solid #000000;">${day}</div>`);
            } else {
                const link = $(`<a href="#" data-day="${day}" data-month="${month}" data-year="${year}" data-service="${selectedService}"></a>`);
                const dayDiv = $(`<div>${day}</div>`);
                link.append(dayDiv);

                fetchAndHandleData(year, month, day, dayDiv, selectedService);
                calendarDaysDiv.append(link);
            }

            const monthSelect = $('#monthSelect');
            const yearSelect = $('#yearSelect');
            monthSelect.val(month);
            yearSelect.val(year);
        }
    }

    function handleDayClick(dayElement){
        const clickedDay = dayElement.text();
        const clickedMonth = dayElement.parent().data('month') + 1;
        const clickedYear = dayElement.parent().data('year');
        const clickedService = dayElement.parent().data('service');
        const dayTime = $('#daytime')
        dayTime.removeAttr('hidden');


        if (lastSelectedDay !== null) {
            lastSelectedDay.removeClass('selectedday');
        }

        // Add .selectedday class to the clicked day
        dayElement.addClass('selectedday');

        selectedDay = clickedDay;
        selectedMonth = clickedMonth;
        selectedYear = clickedYear;

        $('#themonth').text(getMonthName(clickedMonth - 1) + ' ' + clickedDay + ', ' + clickedYear + ' Schedule');
        lastSelectedDay = dayElement;

        $.get('/getScheduleForDayUser', {
            year: clickedYear,
            month: clickedMonth,
            day: clickedDay,
            service: clickedService,
        }).done(function(data){
            if(data){
                const tbody = $('#eventTable tbody');
                tbody.empty();

                for(const item of data){
                    const starttime = item.start_time;
                    const endtime = item.end_time;
                    const slots = item.slot;
                    const type = item.event_type;
                    const id = item.id;

                    const row = $('<tr></tr>');
                    row.append(`<td>${starttime}</td>`);
                    row.append(`<td>${endtime}</td>`);
                    row.append(`<td>${slots}</td>`);
                    row.append(`<td>${type}</td>`);
                    row.append(`<td><a href="#" class="btn btn-success btn-sm azu-reserve" data-id=${id} data-mdb-toggle="modal" data-mdb-target="#lockmodal"><i class="fa-solid fa-address-book"></i></a></td>`);
                    tbody.append(row);
                }
            } else {
                const tbody = $('#eventTable tbody');
                tbody.empty();
            }
        }).fail(function(error){
            console.error('Error fetching data:', error);
        });
    }

    function populateMonthAndYearPickers() {
        const monthSelect = $('#monthSelect');
        const yearSelect = $('#yearSelect');

        for (let i = 0; i < 12; i++) {
            const option = new Option(getMonthName(i), i);
            if (i === displayedMonth) {
                option.selected = true;
            }
            monthSelect.append(option);
        }

        const currentYear = currentDate.getFullYear();
        for (let year = currentYear - 1; year <= currentYear + 20; year++) {
            const option = new Option(year, year);
            if (year === displayedYear) {
                option.selected = true;
            }
            yearSelect.append(option);
        }

        monthSelect.change(function() {
            const selectedMonth = parseInt($(this).val(), 10);
            createCalendar(displayedYear, selectedMonth);
        });

        yearSelect.change(function() {
            const selectedYear = parseInt($(this).val(), 10);
            createCalendar(selectedYear, displayedMonth);
        });
    }

    // START: PREV and NEXT BUTTON
    function prevMonth() {
        displayedMonth--;
        if (displayedMonth < 0) {
            displayedMonth = 11;
            displayedYear--;
        }
        createCalendar(displayedYear, displayedMonth, selectedService);
    }

    function nextMonth() {
        displayedMonth++;
        if (displayedMonth > 11) {
            displayedMonth = 0;
            displayedYear++;
        }
        createCalendar(displayedYear, displayedMonth, selectedService);
    }



    $('#prevMonthBtn').click(prevMonth);
    $('#nextMonthBtn').click(nextMonth);

    // END: PREV AND NEXT BUTTON

    $('#serviceSelect').on('change', function(){
        selectedService = $(this).val();
        const tbody = $('#eventTable tbody');
        tbody.empty();
        if(selectedService !== 'default'){
            createCalendar(displayedYear, displayedMonth, selectedService);
        }
    })

    $('#calendarDays').on('click', 'a', function(event) {
        event.preventDefault();
        const dayElement = $(this).find('div');
        dayElement.addClass('selectedday');
        handleDayClick(dayElement);
    });

    populateMonthAndYearPickers();
    createCalendar(currentDate.getFullYear(), currentDate.getMonth());
    $(document).on('click', '.azu-reserve', function(){
        let sid = $(this).data("id");
        $('#reserveframe').attr('src', '/userreservation?id='+sid);
    })

});
</script>
@endpush