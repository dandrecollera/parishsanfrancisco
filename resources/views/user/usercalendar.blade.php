@extends('user.components.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection

@section('content')
<main style="min-height: 100vh; padding-top: 20px">
    <div class="calendar">
        <div class="month" id="currentMonth">test</div>

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

</main>

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

    // START: PREV and NEXT BUTTON
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

    // END: PREV AND NEXT BUTTON

    $('#calendarDays').on('click', 'a', function(event) {
        event.preventDefault();
        const dayElement = $(this).find('div');
        dayElement.addClass('selectedday');
        handleDayClick(dayElement);
    });

    populateMonthAndYearPickers();
    createCalendar(currentDate.getFullYear(), currentDate.getMonth());


});
</script>
@endpush