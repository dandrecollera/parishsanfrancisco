@php
$path = request()->path();
@endphp

<a href="/admin" class="list-group-item list-group-item-spec py-2 ripple {{$path == 'admin' ? 'active' : ''}}">
    <i class="fas fa-table-columns fa-fw me-3" style="{{$path == 'admin' ? 'color:#2D58A1;' : ''
        }}"></i><span>Dashboard</span>
</a>

<a href="/adminuser" class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminuser' ? 'active' : ''}}">
    <i class="fas fa-user fa-fw me-3" style="{{$path == 'adminuser' ? 'color:#2D58A1;' : ''
        }}"></i><span>Users</span>
</a>

<a href="/adminpriest"
    class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminpriest' ? 'active' : ''}}">
    <i class="fas fa-cross fa-fw me-3" style="{{$path == 'adminpriest' ? 'color:#2D58A1;' : ''
        }}"></i><span>Priests</span>
</a>

<a href="/adminvolunteer"
    class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminvolunteer' ? 'active' : ''}}">
    <i class="fas fa-people-carry-box fa-fw me-3" style="{{$path == 'adminvolunteer' ? 'color:#2D58A1;' : ''
        }}"></i><span>Volunteers</span>
</a>

<a href="#"
    class="list-group-item list-group-item-spec py-2 ripple dropdown-toggle {{$path == 'adminappointment' || $path == 'admincalendar' ? 'active' : ''}}"
    data-mdb-toggle="collapse" data-mdb-target="#AdminToolsContent" role="button">
    <i class="fas fa-calendar fa-fw me-3" style="{{$path == 'adminappointment' || $path == 'admincalendar' ? 'color:#2D58A1;' : ''
        }}"></i><span>Appointments</span>
</a>
<div class="collapse list-group-flush ps-2" id="AdminToolsContent">
    <a href="/adminappointment"
        class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminappointment' ? 'active' : ''}}">
        <span>List</span>
    </a>
    <a href="/admincalendar"
        class="list-group-item list-group-item-spec py-2 ripple {{$path == 'admincalendar' ? 'active' : ''}}">
        <span>Calendar</span>
    </a>
</div>

<a href="/adminreport"
    class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminreport' ? 'active' : ''}}">
    <i class="fas fa-chart-simple fa-fw me-3" style="{{$path == 'adminreport' ? 'color:#2D58A1;' : ''
        }}"></i><span>Reports</span>
</a>

<a href="/adminannouncement"
    class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminannouncement' ? 'active' : ''}}">
    <i class="fas fa-bullhorn fa-fw me-3" style="{{$path == 'adminannouncement' ? 'color:#2D58A1;' : ''
        }}"></i><span style='font-size: 15px'>Announcement</span>
</a>

<a href="/adminarticle"
    class="list-group-item list-group-item-spec py-2 ripple {{$path == 'adminarticle' ? 'active' : ''}}">
    <i class="fas fa-newspaper fa-fw me-3" style="{{$path == 'adminarticle' ? 'color:#2D58A1;' : ''
        }}"></i><span style='font-size: 15px'>Article</span>
</a>