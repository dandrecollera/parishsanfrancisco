@extends('user.components.layout')

@section('content')

@php
DB::table('notif')
->where('userid', $userinfo[0])
->update([
"seen" => 1
]);
@endphp
<main style="min-height: 100vh" class="mt-3 pt-3">
    <div class="container-xl">

        <div class="row">
            <div class="col">
                <h1>Notifications</h1>
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
                                <span><strong>Title</strong></span>
                            </th>
                            <th scope="col">
                                <span><strong>Content</strong></span>
                            </th>
                            <th scope="col">
                                <span><strong>Date/Time</strong></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dbresult as $dbr)
                        <tr>
                            <td>{{$dbr->title}}</td>
                            <td>{{$dbr->content}}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dbr->created_at)->format('Y-m-d
                                h:i A')}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="input-group mb-4">
                {!!$page_first_url!!}
                {!!$page_prev_url!!}
                <span class="input-group-text bg-dark text-white w-auto" id="basic-addon3"
                    style="font-size:13px;">{{$page}}
                    / {{$totalpages}}</span>
                {!!$page_next_url!!}
                {!!$page_last_url!!}
            </div>
        </div>

    </div>
</main>


@endsection