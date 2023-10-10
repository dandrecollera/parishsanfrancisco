@extends('admin.components.layout')

@section('content')
<div class="container-fluid">
    <h1>Update Announcement</h1>
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
    <hr>
    <form method="POST" action="/adminannouncement_add_process" target="_parent" enctype="multipart/form-data">
        @csrf

        <h4>Content</h4>
        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="title" id="title" required>
            <label for="title" class="form-label">Title*</label>
        </div>

        <div class="form-outline mb-3">
            <textarea class="form-control" name="content" id="content" rows="5"></textarea>
            <label class="form-label" for="content">Description*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="subject" id="subject" required>
            <label for="subject" class="form-label">Subject*</label>
        </div>

        <h4>Volunteers</h4>
        <div class="input-group mb-3">
            <select name="position[]" id="position" class="form-select" required multiple>
                <option selected hidden value="">Select Volunteer*</option>
                @php
                $dbr = DB::table('volunteers')
                ->where('status', 'active')
                ->get()
                ->toArray();
                @endphp
                @foreach ($dbr as $db)
                <option value="{{$db->id}}">{{$db->firstname}} {{$db->middlename}} {{$db->lastname}}</option>
                @endforeach
            </select>
        </div>

        <h4>Priest</h4>
        <div class="input-group mb-3">
            <select name="priest" id="position" class="form-select" required>
                <option selected hidden value="">Select Priest*</option>
                @php
                $dbre = DB::table('priests')
                ->where('status', 'active')
                ->get()
                ->toArray();
                @endphp
                @foreach ($dbre as $db)
                <option value="{{$db->id}}">{{$db->firstname}} {{$db->middlename}} {{$db->lastname}}</option>
                @endforeach
            </select>
        </div>

        <h4>Social Links</h4>
        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="facebook" id="facebook" required>
            <label for="facebook" class="form-label">Facebook*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="instagram" id="instagram" required>
            <label for="instagram" class="form-label">Instagram*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="twitter" id="twitter" required>
            <label for="twitter" class="form-label">Twitter*</label>
        </div>

        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="youtube" id="youtube" required>
            <label for="youtube" class="form-label">Youtube*</label>
        </div>


        <button type="submit" class="btn btn-primary mt-3 float-end">Update Announcement</button>
    </form>

</div>

@endsection