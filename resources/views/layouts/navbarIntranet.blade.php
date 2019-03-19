<nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow justify-content-between">
    <a class="navbar-brand col-sm-4 col-md-2 mr-0" href="{{ route('home')}}">Univeylandia - Gestió</a>

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
            @if(Auth::user()->unreadNotifications->count() !== 0)
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <span class="badge badge-pill badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                @foreach (Auth::user()->unreadNotifications as $notification)
                <li>
                    <form method="post" action="{{ route('markasread', Auth::id()) }}">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="notification_uuid" value="{{ $notification->id }}">
                        <button class="dropdown-item" type="submit">{{ $notification->data['titol'] }}</button>
                    </form>
                </li>
                @endforeach

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Mostrar notificacions</a>
            </ul>
            @else
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Mostrar notificacions</a>
            </ul>
            @endif
        </li>

      <li class="nav-item text-nowrap nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->nom }} {{ Auth::user()->cognom1 }}<span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('perfil') }}">{{ __('Perfil') }}</a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
