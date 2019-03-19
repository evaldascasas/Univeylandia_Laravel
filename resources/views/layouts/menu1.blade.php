<nav class="navbar navbar-expand-sm py-0">
    <div class="collapse navbar-collapse flex-row-reverse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{ __('Idioma') }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">{{ __('ES') }}</a></li>
                    <li><a class="dropdown-item" href="#">{{ __('CA') }}</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('Mapa') }}</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registre') }}</a>
            </li>
            @endif

            @elseif(Auth::user()->id_rol !== 1 && Auth::user()->id_rol !== 2)
            
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
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nom }} {{ Auth::user()->cognom1 }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('perfil') }}">{{ __('Perfil') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('incidencia') }}">{{ __('Incidències') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('tasques') }}">{{ __('Tasques') }}</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

            @elseif(Auth::user()->id_rol == 2)
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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nom }} {{ Auth::user()->cognom1 }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('perfil') }}">{{ __('Perfil') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('incidencia') }}">{{ __('Incidències') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('gestio') }}">{{ __('Gestió') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('tasques') }}">{{ __('Tasques') }}</a></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            
            @elseif(Auth::user()->id_rol == 1)
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
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nom }} {{ Auth::user()->cognom1 }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('perfil') }}">{{ __('Perfil') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('incidencia') }}">{{ __('Incidències') }}</a></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </li>
            @endguest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cistella') }}">
                    <i data-feather="shopping-cart"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>