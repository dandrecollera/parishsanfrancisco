@extends('user.components.layout')

@section('content')
<main style="min-height: 100vh">
    <div class="container pt-5">
        <h2>Reservation History</h2>

        <div class="col overflow-scroll scrollable-contrainer-mb-2">
            <table class="table table-hover">
                <thead>
                    <th scope="col"><strong>ID</strong></th>
                    <th scope="col"><strong>Service</strong></th>
                    <th scope="col"><strong>Date of Event</strong></th>
                    <th scope="col"><strong>Start Time</strong></th>
                    <th scope="col"><strong>End Time</strong></th>
                    <th scope="col"><strong>Date/Time Created</strong></th>
                    <th scope="col"><strong>Status</strong></th>
                </thead>
                <tbody>
                    @foreach ($list as $reservation)
                    <tr data-mdb-target="#faq{{$reservation->id}}" data-mdb-toggle="collapse" role="button">
                        <td>{{$reservation->id}}</td>
                        <td>{{$reservation->service}}</td>
                        <td>{{\Carbon\Carbon::create($reservation->year, $reservation->month,
                            $reservation->day)->format('F d Y') }}</td>
                        <td>{{\Carbon\Carbon::parse($reservation->start_time)->format('h:i A')}}</td>
                        <td>{{\Carbon\Carbon::parse($reservation->end_time)->format('h:i A')}}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->created_at)->format('Y-m-d
                            h:i A')}}
                        </td>
                        <td>{{$reservation->status}}</td>
                    </tr>
                    <tr class="collapse" id="faq{{$reservation->id}}">
                        <td colspan="8">
                            <iframe id="" src="/additionalinfo?sid={{$reservation->id}}" width="100%" height="500px"
                                style="border:none;"></iframe>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>

@endsection