@php
$count = DB::table('notif')
->where('accounttype', 'admin')
->where('seen', 0)
->count();
@endphp
<i class="fas fa-bars d-none d-lg-inline" style="color:white"></i>
<div class="d-flex d-block d-lg-none">
    <i class="fas fa-chevron-circle-down d-block d-lg-none me-2" style="color:white"></i>
    <strong class="d-block d-lg-none me-3"> {{$userinfo[3]}}</strong>
    <a href="adminnotification">
        <i class="fas fa-bell fa-lg" style="color:white"></i>
        @if ($count > 0)
        <span class="badge rounded-pill badge-notification bg-danger">{{$count}}</span>

        @endif
    </a>
</div>
<a href="adminnotification" class="d-none d-lg-inline me-3">
    <i class="fas fa-bell fa-lg" style="color:white"></i>
    @if ($count > 0)
    <span class="badge rounded-pill badge-notification bg-danger">{{$count}}</span>

    @endif
</a>