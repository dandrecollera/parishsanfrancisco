@extends('user.components.layout')

@section('content')
<main style="min-height: 100vh">
    <div class="container pt-5">
        @if(!empty($notif))
        <div class="row mb-3">
            <div class="col">
                <div role="alert" class="alert alert-primary alert-dismissible fade show">
                    <h4 class="alert-heading">Success</h4>
                    <p>{{ $notiflist[(int) $notif] }}</p>
                    <button class="btn-close" type="button" data-mdb-dismiss="alert"></button>
                </div>
            </div>
        </div>
        @endif
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
                    <th scope="col" colspan="2"><strong>Status</strong></th>
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
                        <td>
                            @if ($reservation->status == "Completed")
                            <a href="#" data-mdb-target="#addeditmodal" data-mdb-toggle="modal" class="reqcert-btn"
                                data-id="{{$reservation->id}}">
                                <button class="btn btn-primary">Request Certificate</button>
                            </a>
                            @endif
                        </td>
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

<div class="modal fade" id="addeditmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addeditmodalLabel">
                    <div>Request Certificate</div>
                </h1>
                <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Would you like to request a certificate on this event?
                <form action="/user_request" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="id" id="id" required>

                    <button type="submit" class="btn btn-primary mt-3 mb-3 float-right">Yes</button>

                    <button type="button" class="btn btn-danger mt-3 mb-3 float-right"
                        data-mdb-dismiss="modal">No</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@push('jsscripts')
<script>
    $(document).ready(function() {
        // Use event delegation to handle clicks on elements with the class "reqcert-btn"
        $(document).on('click', '.reqcert-btn', function() {
            let theid = $(this).data('id');
            console.log("Clicked on 'Request Certificate' with data-id:", theid);
            $("#id").val(theid);
        });
    });
</script>
@endpush