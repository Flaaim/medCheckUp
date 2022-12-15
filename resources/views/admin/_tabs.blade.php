<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link @if(Request::is('admin')) active @endif " aria-current="page" href="{{route('admin.index')}}">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::is('admin/users')) active @endif " aria-current="page" href="{{route('admin.users.index')}}">Users</a>
    </li>
  </ul>