@extends('admin.components.layout')


@section('style')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="calendar">
        @if(!empty($error))
        <div class="row">
            <div class="col">
                <div role="alert" class="alert alert-danger alert-dismissible fade show">
                    <h4 class="alert-heading">Error</h4>
                    <p>{{ $errorlist[(int) $error] }}</p>
                    <button class="btn-close" type="button" data-mdb-dismiss="alert"></button>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($notif))
        <div class="row">
            <div class="col">
                <div role="alert" class="alert alert-primary alert-dismissible fade show">
                    <h4 class="alert-heading">Success</h4>
                    <p>{{ $notiflist[(int) $notif] }}</p>
                    <button class="btn-close" type="button" data-mdb-dismiss="alert"></button>
                </div>
            </div>
        </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h2 style="line-height: 0">Reservation Calendar</h2>
            <button type="button" class="btn btn-dark btn-sm float-end" data-mdb-toggle="modal"
                data-mdb-target="#addeditmodal" id="serviceprices">Edit Service Prices</button>
        </div>
        <br>
        <div class="month" id="currentMonth"></div>

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
        <h6>Legend</h6>
        <div class="d-flex overflow-scroll">
            <div class="d-flex align-items-center me-3">
                <div style="width: 20px; height: 20px; background-color:#6EC9FF" class="me-2"></div>
                <span style="font-size: 13px">Regular</span>
            </div>

            <div class="d-flex align-items-center me-3">
                <div style="width: 20px; height: 20px; background-color:#FF5252" class="me-2"></div>
                <span style="font-size: 13px">Community</span>
            </div>

            <div class="d-flex align-items-center me-3">
                <div style="width: 20px; height: 20px; background-color:#F4FE28" class="me-2"> </div>
                <span style="font-size: 13px">Special</span>
            </div>
        </div>
        <div id="daytime" hidden>
            <hr>
            <h4 id="themonth">test</h4>
            <div class="btn-group">
                <button type="button" id="addbutton" class="btn btn-dark shadow-sm btn-sm" data-test="1" data-day=""
                    data-month="" data-year="" data-mdb-toggle="modal" data-mdb-target="#addeditmodal"><i
                        class="fa-solid fa-circle-plus"></i>Add
                    Schedule</button>
            </div>
            <div class="row">
                <div class="col overflow-scroll scrollable-contrainer-mb-2">
                    <table class="table table-hover" id="eventTable">
                        <thead>
                            <th scope="col"><strong>Start Time</strong></th>
                            <th scope="col"><strong>End Time</strong></th>
                            <th scope="col"><strong>Service</strong></th>
                            <th scope="col"><strong>Slots</strong></th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="addeditmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addeditmodalLabel">
                    <div>Modal title</div>
                </h1>
                <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <iframe id="addeditframe" src="" width="100%" height="450px" style="border:none; height:80vh;"></iframe>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="lockmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lockmodallabel">
                    <div>Modal title</div>
                </h1>
                <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this schedule for this day?<br>
                <div class="justify-content-end d-flex">
                    <div class="btn-group">
                        <a href="" class="btn btn-primary" id="DeleteButton">Confirm</a>
                        <a class="btn btn-danger" data-mdb-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('jsscripts')
<script type="text/javascript">
    $(document).ready(function() {

    const currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);

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

    function fetchDataForDay(year, month, day) {
        const adjustedMonth = month + 1;
        return $.get('/getDataForDay', {
            year: year,
            month: adjustedMonth,
            day: day
        });
    }

    async function fetchAndHandleData(year, month, day, link) {
        try {
            const data = await fetchDataForDay(year, month, day);
            if (data === 'Regular') {
                link.addClass('regular');
            } else if (data === 'Community') {
                link.addClass('community');
            } else if (data === 'Special') {
                link.addClass('special');
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            link.addClass('error');
        }
    }

    function createCalendar(year, month) {
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
                const link = $(`<a href="#" data-day="${day}" data-month="${month}" data-year="${year}"></a>`);
                const dayDiv = $(`<div>${day}</div>`);
                link.append(dayDiv);

                fetchAndHandleData(year, month, day, dayDiv);
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
        const dayTime = $('#daytime')
        dayTime.removeAttr('hidden');

        $('#addbutton').data('data-day', clickedDay);
        $('#addbutton').data('data-month', clickedMonth);
        $('#addbutton').data('data-year', clickedYear);


        if (lastSelectedDay !== null) {
            lastSelectedDay.removeClass('selectedday');
        }

        // Add .selectedday class to the clicked day
        dayElement.addClass('selectedday');

        selectedDay = clickedDay;
        selectedMonth = clickedMonth;
        selectedYear = clickedYear;

        $('#addbutton').attr('data-day', clickedDay).attr('data-month', clickedMonth).attr('data-year', clickedYear);
        $('#addbutton').text('Add Schedule for ' + getMonthName(clickedMonth - 1) + ' ' + clickedDay + ', ' + clickedYear);
        $('#themonth').text(getMonthName(clickedMonth - 1) + ' ' + clickedDay + ', ' + clickedYear + ' Schedule');
        lastSelectedDay = dayElement;

        $.get('/getScheduleForDay', {
            year: clickedYear,
            month: clickedMonth,
            day: clickedDay
        }).done(function(data){
            if(data){
                const tbody = $('#eventTable tbody');
                tbody.empty();

                for(const item of data){
                    const starttime = item.start_time;
                    const endtime = item.end_time;
                    const service = item.service;
                    const slots = item.slot;
                    const id = item.id;

                    const row = $('<tr></tr>');
                    row.append(`<td>${starttime}</td>`);
                    row.append(`<td>${endtime}</td>`);
                    row.append(`<td>${service}</td>`);
                    row.append(`<td>${slots}</td>`);
                    row.append(`<td><a href="#" class="btn btn-danger btn-sm azu-delete" data-id=${id} data-mdb-toggle="modal" data-mdb-target="#lockmodal"><i class="fa-solid fa-trash  fa-xs"></i></a></td>`);
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

    function prevMonth() {
        displayedMonth--;
        if (displayedMonth < 0) {
            displayedMonth = 11;
            displayedYear--;
        }
        createCalendar(displayedYear, displayedMonth);
    }

    function nextMonth() {
        displayedMonth++;
        if (displayedMonth > 11) {
            displayedMonth = 0;
            displayedYear++;
        }
        createCalendar(displayedYear, displayedMonth);
    }

    $('#prevMonthBtn').click(prevMonth);
    $('#nextMonthBtn').click(nextMonth);

    $('#calendarDays').on('click', 'a', function(event) {
        event.preventDefault();
        const dayElement = $(this).find('div');
        dayElement.addClass('selectedday');
        handleDayClick(dayElement);
    });

    populateMonthAndYearPickers();
    createCalendar(currentDate.getFullYear(), currentDate.getMonth());


    $('#addbutton').on('click', function() {
        $('#addeditmodalLabel').html('Add Schedule');
        $('#addeditframe').attr('src', `/admincalendar_time_add?day=${selectedDay}&month=${selectedMonth}&year=${selectedYear}`);
    });
    $('#serviceprices').on('click', function() {
        $('#addeditmodalLabel').html('Edit Service Prices');
        $('#addeditframe').attr('src', `/adminprices`);
    });
    $(document).on('click', '.azu-delete', function() {
        var sid = $(this).data("id");
        $('#lockmodallabel').html('Delete Schedule');
        $('#DeleteButton').prop('href', '/admincalendar_time_delete_process?id='+sid);
    });

});
</script>
@endpush