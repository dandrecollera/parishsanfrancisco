<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        * {
            font-size: 24px;
        }

        .header {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            padding: ;
        }

        .subheader {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
        }

        section {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .title {
            text-align: center;
            font-size: 72px;
            font-weight: bold;
            padding: 10px;
        }

        .name {
            text-align: center;
            font-size: 56px;
            font-weight: bold;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        DIOCESE OF ANTIPOLO SAN FRANCISCO NG ASSISI PARISH<br>
        <span class="subheader">Macamot, Binangonan, Rizal, Philippines</span>
    </div>

    <section class="title">
        Certificate of <br>
        {{$service->service}}
    </section>

    @if ($service->service == "Baptism")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->childs_name}}</span><br>
            child of {{$info->mothers_name}} and {{$info->fathers_name}}
        </center>
    </section>

    <section>
        <center>
            for completing the rite of baptism on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @if ($service->service == "Funeral Mass")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->name}}</span><br>
        </center>
    </section>

    <section>
        <center>
            for completing the rite of funeral mass on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @if ($service->service == "Anointing Of The Sick")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->name}}</span><br>
        </center>
    </section>

    <section>
        <center>
            for completing the rite of anointing the sick on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @if ($service->service == "Kumpil")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->firstname}} {{$info->middlename}} {{$info->lastname}}</span><br>
        </center>
    </section>

    <section>
        <center>
            for completing the rite of kumpil on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @if ($service->service == "First Communion")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->firstname}} {{$info->middlename}} {{$info->lastname}}</span><br>
        </center>
    </section>

    <section>
        <center>
            for completing the rite of kumpil on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @if ($service->service == "Blessing")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->firstname}} {{$info->middlename}} {{$info->lastname}}</span><br>
        </center>
    </section>

    <section>
        <center>
            for completing the rite of blessing on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @if ($service->service == "Wedding")
    <section>
        <center>
            This certificate is hereby given to <br>
            <span class="name">{{$info->bridename}}</span><br>
            and <br>
            <span class="name">{{$info->groomname}}</span><br>
        </center>
    </section>

    <section>
        <center>
            for completing the rite of wedding on
            {{$info->day}}/{{$info->month }}/{{$info->year}}
        </center>
    </section>
    @endif

    @php
    $currentDate = \Carbon\Carbon::now(); // Get the current date and time using Carbon
    $currentDay = $currentDate->format('d'); // Format the current day as two digits (e.g., "01")
    $currentMonth = $currentDate->format('m'); // Format the current month as two digits (e.g., "09")
    $currentYear = $currentDate->format('Y'); // Format the current year as four digits (e.g., "2023")
    @endphp
    <section>
        <center>
            This certificate is issued on the {{$currentDay}}/{{$currentMonth}}/{{$currentYear}}
        </center>
    </section>
</body>

</html>