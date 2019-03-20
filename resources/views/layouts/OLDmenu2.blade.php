<nav class="navbar navbar-expand-sm navbar-dark bg-dark py-2">
    <a class="navbar-brand" href="{{ route('home') }}" accesskey="h"> <!-- Alt + Shift + h = anar a inici -->
        <img src="{{ asset('img/univeylandia_logo_petit_blanc.png') }}">
        <!--<span id="logo-font">El millor parc de les Terres de l'Ebre</span>-->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Parc</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('noticies') }}">Noticies</a></li>
                    <li><a class="dropdown-item" href="{{ route('promocions') }}">Promocions</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('atraccions') }}">Atraccions</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('entrades') }}">Compra entrades</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('tenda') }}">Botiga</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Més</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                    <li><a class="dropdown-item" href="{{ route('votacions')}}">Top atraccions</a></li>
                    <li><a class="dropdown-item" href="{{ route('multimedia')}}">Multimèdia</a></li>
                    <li><a class="dropdown-item" href="{{ route('mes')}}">Botigues i restaurants</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Ajuda</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li><a class="dropdown-item" href="{{ route('contacte')}}">Contacte</a></li>
                    <li><a class="dropdown-item" href="{{ route('faq')}}">Preguntes freqüents</a></li>
                </ul>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Cercar" aria-label="Cercar">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Cercar</button>
        </form>
    </div>
</nav>