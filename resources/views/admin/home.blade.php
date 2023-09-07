@extends('admin.components.layout')

@section('content')
<div class="container-xl mt-4">
    <h1>
        <strong>Dashboard</strong>
    </h1>
    <div class="row py-3">
        <div class="col-12 col-sm-4 mb-sm-0 mb-3">
            <div class="card text-center text-bg-dark">
                <div class="card-body">
                    <h6 class="card-title">Number of Users</h6>
                    @php
                    $usercount = DB::table('main_users')
                    ->where('accounttype', 'user')
                    ->count();
                    @endphp
                    <h3 class="card-title">{{$usercount}}</h3>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 mb-sm-0 mb-3">
            <div class="card text-center text-bg-dark">
                <div class="card-body">
                    <h6 class="card-title">Pending Reservation</h6>
                    @php
                    $reservationcount = DB::table('reservation')
                    ->where('status', 'Pending')
                    ->count();
                    @endphp
                    <h3 class="card-title">{{$reservationcount}}</h3>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 mb-sm-0 mb-3">
            <div class="card text-center text-bg-dark">
                <div class="card-body">
                    <h6 class="card-title">Certificate Request</h6>
                    @php
                    $requestcount = DB::table('reservation')
                    ->where('status', 'Requesting')
                    ->count();
                    @endphp
                    <h3 class="card-title">{{$requestcount}}</h3>
                </div>
            </div>
        </div>
    </div>

    @php
    use Carbon\Carbon;

    $today = Carbon::now();

    $day = $today->format('j');
    $month = $today->format('n');
    $year = $today->format('Y');

    $reservationstoday = DB::table('reservation')
    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
    ->where('calendartime.year', $year)
    ->where('calendartime.month', $month)
    ->where('calendartime.day', $day)
    ->get()
    ->toArray();
    @endphp

    <div class="mt-2">
        <div class="col overflow-scroll scrollable-container mb-2">
            <h3><strong>Event Today</strong></h3>
            <table class="table table-hover overflow-scroll">
                <thead>
                    <tr>
                        <th scope="col"><strong>Email</strong></th>
                        <th scope="col"><strong>Start Time</strong></th>
                        <th scope="col"><strong>End Time</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservationstoday as $reservations)
                    <tr>
                        <td>{{$reservations->service}}</td>
                        <td>{{ \Carbon\Carbon::parse($reservations->start_time)->format('h:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservations->end_time)->format('h:i A') }}</td>

                        {{-- <td>{{ date('m/d/Y l', strtotime($appointments->appointeddate)) }}</td> --}}
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection