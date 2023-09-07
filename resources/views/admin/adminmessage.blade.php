@extends('admin.components.layout')

@section('content')


<div class="container-fluid">

    <div class="row">
        <div class="col">
            <h1>Messages</h1>
        </div>
    </div>

</div>

<hr>

<div class="row">
    <div class="col">
        <form method="get">
            <div class="input-group mb-3">
                <div>
                    <button class="btn btn-dark dropdown-toggle" type="button" data-mdb-toggle="dropdown">
                        {{$lpp == 25 ? 'ITEMS' : $lpp}}</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?lpp=3{{!empty($keyword) ? " &keyword=".$keyword : ''}}">3
                                Lines Per Page</a></li>
                        <li><a class="dropdown-item" href="?lpp=25{{!empty($keyword) ? " &keyword=".$keyword : ''}}">25
                                Lines Per Page</a></li>
                        <li><a class="dropdown-item" href="?lpp=50{{!empty($keyword) ? " &keyword=".$keyword : ''}}">50
                                Lines Per Page</a></li>
                        <li><a class="dropdown-item" href="?lpp=100{{!empty($keyword) ? "
                                &keyword=".$keyword : ''}}">100 Lines Per page</a></li>
                        <li><a class="dropdown-item" href="?lpp=200{{!empty($keyword) ? "
                                &keyword=".$keyword : ''}}">200 Lines Per Page</a></li>
                    </ul>
                </div>
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
                        <span><strong>Name</strong></span>
                    </th>
                    <th scope="col">
                        <span><strong>Email</strong></span>
                    </th>
                    <th scope="col">
                        <span><strong>Message</strong></span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dbresult as $dbr)
                <tr>
                    <td>{{$dbr->name}}</td>
                    <td>{{$dbr->email}}</td>
                    <td>{{$dbr->message}}</td>

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

@endsection