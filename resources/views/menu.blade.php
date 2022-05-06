
    <li class="nav-item">
        <a class="nav-link {{ request()->is('post') ? 'active' : '' }}" aria-current="page" href="{{ url('post')}}"> Posts </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('comment') ? 'active' : '' }}" href="{{ url('comment')}}"> Comments </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('users') ? 'active' : '' }}"  href="{{ url('users')}}"> Users </a>
    </li>
