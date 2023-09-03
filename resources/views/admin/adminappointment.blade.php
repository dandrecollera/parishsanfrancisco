@extends('admin.components.layout')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <h1>Appointment List</h1>
        </div>
    </div>

    <hr>

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

    <div class="row">
        <div class="col">
            <form method="get">

                <div class="input-group mb-3">
                    <input type="search" name="keyword" class="form-control"
                        value="{{!empty($keyword) ?  $keyword : ''}}" placeholder="Search Keyword" required>
                    <button class="btn btn-dark" type="submit"><i class="fas fa-search fa-sm"></i></button>
                    @if(!empty($keyword))
                    <button class="btn btn-dark" type="button" onclick="location.href='./adminappointment'"><i
                            class="fas fa-search fa-rotate fa-sm"></i></button>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div>
                        <button class="btn btn-dark dropdown-toggle" type="button" data-mdb-toggle="dropdown">
                            {{$lpp == 25 ? 'ITEMS' : $lpp}}</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?lpp=3{{!empty($keyword) ? "
                                    &keyword=".$keyword : ''}}">3
                                    Lines Per Page</a></li>
                            <li><a class="dropdown-item" href="?lpp=25{{!empty($keyword) ? "
                                    &keyword=".$keyword : ''}}">25
                                    Lines Per Page</a></li>
                            <li><a class="dropdown-item" href="?lpp=50{{!empty($keyword) ? "
                                    &keyword=".$keyword : ''}}">50
                                    Lines Per Page</a></li>
                            <li><a class="dropdown-item" href="?lpp=100{{!empty($keyword) ? "
                                    &keyword=".$keyword : ''}}">100 Lines Per page</a></li>
                            <li><a class="dropdown-item" href="?lpp=200{{!empty($keyword) ? "
                                    &keyword=".$keyword : ''}}">200 Lines Per Page</a></li>
                        </ul>
                    </div>

                    <div>
                        <button class="btn btn-dark dropdown-toggle" type="button"
                            data-mdb-toggle="dropdown">{{$orderbylist[$sort]['display'] == 'Default' ? 'SORT' :
                            $orderbylist[$sort]['display'] }} </button>
                        <ul class="dropdown-menu">
                            @foreach($orderbylist as $key => $odl)
                            @php
                            $qstringsort = $qstring2;
                            $qstringsort['sort'] = $key;
                            $sorturl = http_build_query($qstringsort);
                            @endphp
                            <li><a class="dropdown-item" href="?{{ $sorturl }}">{{$odl['display']}}</a></li>
                            @endforeach
                        </ul>
                    </div>


                    <div>
                        <button class="btn btn-dark dropdown-toggle" type="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">{{$typebylist[$type]['display'] == 'Default' ? 'TYPE' :
                            $typebylist[$type]['display'] }} </button>
                        <ul class="dropdown-menu">
                            @foreach($typebylist as $key => $tdl)
                            @php
                            $qstringtype = $qstring2;
                            $qstringtype['type'] = $key;
                            $typeurl = http_build_query($qstringtype);
                            @endphp
                            <li><a class="dropdown-item" href="?{{ $typeurl }}">{{$tdl['display']}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    @if (!empty($sort) || $lpp != 25 || !empty($type))
                    <button onclick="location.href='./adminappointment'" type="button" class="btn btn-dark"><i
                            class="fas fa-search fa-rotate fa-sm"></i></button>
                    @endif

                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col overflow-scroll scrollable-container mb-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            <span
                                class="{{ $orderbylist[$sort]['display'] == 'Default' ? 'text-primary' : '' }}"><strong>ID</strong></span>
                        </th>
                        <th scope="col">
                            <span
                                class="{{ $orderbylist[$sort]['display'] == 'Email' ? 'text-primary' : '' }}"><strong>Email</strong></span>
                        </th>
                        <th scope="col">
                            <span
                                class="{{ $orderbylist[$sort]['display'] == 'Service' ? 'text-primary' : '' }}"><strong>Service</strong></span>
                        </th>
                        <th scope="col">
                            <span
                                class="{{ $orderbylist[$sort]['display'] == 'Event Date' ? 'text-primary' : '' }}"><strong>Event
                                    Date</strong></span>
                        </th>
                        <th scope="col">
                            <span
                                class="{{ $orderbylist[$sort]['display'] == 'Created At' ? 'text-primary' : '' }}"><strong>Created
                                    At</strong></span>
                        </th>
                        <th scope="col">
                            <span
                                class="{{ $orderbylist[$sort]['display'] == 'Status' ? 'text-primary' : '' }}"><strong>Status</strong></span>
                        </th>
                        <th scope="col">
                            {{-- space --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dbresult as $dbr)
                    <tr data-mdb-target="#faq{{$dbr->id}}" data-mdb-toggle="collapse" role="button">
                        <th scope="row">{{$dbr->id}}</th>
                        <td>{{$dbr->email}}</td>
                        <td>{{$dbr->service}}</td>
                        <td>{{ $dbr->event_date}}</td>
                        <td>{{$dbr->created_at}}</td>
                        <td style="text-transform: capitalize;">{{$dbr->status}}</td>
                        <td>
                            @if ($dbr->status == "Completed" || $dbr->status == "Cancelled")

                            @else
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-primary btn-sm azu-edit" data-id="{{$dbr->id}}"
                                    data-mdb-toggle="modal" data-mdb-target="#addeditmodal">
                                    <i class="fa-solid fa-pen fa-xs"></i>
                                </a>
                            </div>
                            @endif

                        </td>
                    </tr>
                    <tr class="collapse" id="faq{{$dbr->id}}">
                        <td colspan="8">
                            <iframe id="" src="/adminadditionalinfo?sid={{$dbr->id}}" width="100%" height="500px"
                                style="border:none;"></iframe>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="input-group mb-4">
            {!!$page_first_url!!}
            {!!$page_prev_url!!}
            <span class="input-group-text bg-dark text-white w-auto" id="basic-addon3" style="font-size:13px;">{{$page}}
                / {{$totalpages}}</span>
            {!!$page_next_url!!}
            {!!$page_last_url!!}
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
                <iframe id="addeditframe" src="/adminuser_add" width="100%" height="450px"
                    style="border:none; height:80vh;"></iframe>
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
                Are you sure you want to make this account <span id="modalmethod">inactive</span>?<br>
                <strong>
                    <span id="modalemail">Test@yahoo.com</span>
                </strong>

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
    $(document).ready(function(){
        $('#addbutton').on('click', function(){
            $('#addeditmodalLabel').html('New User Account');
            $('#addeditframe').attr('src', '/adminuser_add');
        })
        $('.azu-edit').on('click', function(){
            var sid = $(this).data("id");
            $('#addeditmodalLabel').html('Change Appointment Status');
            $('#addeditframe').attr('src', '/adminstatusupdate?id='+sid);
        })
        $('.azu-lock').on('click', function(){
            var email = $(this).data("email");
            var sid = $(this).data("id");
            $('#lockmodallabel').html('Disable Account');
            $('#modalmethod').html('inactive');
            $('#modalemail').html(email);
            $('#DeleteButton').prop('href', '/adminuser_lock_process?id='+sid);
        })
        $('.azu-unlock').on('click', function(){
            var email = $(this).data("email");
            var sid = $(this).data("id");
            $('#lockmodallabel').html('Activate Account');
            $('#modalmethod').html('active');
            $('#modalemail').html(email);
            $('#DeleteButton').prop('href', '/adminuser_unlock_process?id='+sid);
        })
    })
</script>
@endpush