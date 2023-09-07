@php
$count = DB::table('notif')
->where('userid', $userinfo[0])
->where('seen', 0)
->count();
@endphp
<i class="fas fa-chevron-circle-down d-block d-lg-none me-2" style="color:black">
    @if ($count > 0)
    <span
        class="position-absolute top-85 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>

    @endif
</i>

<strong class="d-block d-lg-none" style="color:black"> {{$userinfo[3]}}</strong>

<i class="fas fa-bars d-none d-lg-block" style="color:black">
    @if ($count > 0)
    <span
        class="position-absolute top-85 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>

    @endif

</i>