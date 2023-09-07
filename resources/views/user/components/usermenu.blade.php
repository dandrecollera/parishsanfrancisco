<li class="dropdown-item d-none d-lg-block"> <strong>{{$userinfo[3]}}</strong>
</li>
<li>
    <hr class="dropdown-divider d-none d-lg-block m-0">
</li>
<li><a class=" dropdown-item" href="/userprofile">My profile</a></li>
<li><a class="dropdown-item" href="/usersettings">Settings</a></li>
<li><a class="dropdown-item" href="/usernotifications">Notifications
        @php
        $count = DB::table('notif')
        ->where('userid', $userinfo[0])
        ->where('seen', 0)
        ->count();
        @endphp
        @if ($count > 0)
        <span class="badge badge-danger ms-2">{{$count}}</span>
        @endif
    </a>
</li>
<li><a class="dropdown-item" href="/logout">Logout</a></li>