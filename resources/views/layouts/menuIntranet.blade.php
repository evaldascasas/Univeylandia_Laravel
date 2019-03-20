<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 bg-light sidebar collapse show" id="sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('gestio') ? 'active' : '' }}" href="{{URL::route('gestio')}}">
              <span data-feather="home"></span>
              Inici
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('empleats*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('empleats*') ? 'true' : 'false' }}" href="#submenu0">
              <span data-feather="users"></span>
              Empleats
              <span data-feather="chevron-right"></span>
            </a>
          </li>
          <ul class="nav flex-column collapse {{ request()->routeIs('empleats*') ? 'show' : '' }}" id="submenu0" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('empleats.create') ? 'active' : '' }}" href="{{URL::route('empleats.create')}}"><span data-feather="user-plus"></span>Crear Empleat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('empleats.index') ? 'active' : '' }}" href="{{URL::route('empleats.index')}}"><span data-feather="file-text"></span>Gestionar Empleats</a>
            </li>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('clients*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('clients*') ? 'true' : 'false' }}" href="#submenu1">
              <span data-feather="users"></span>
              Clients
              <span data-feather="chevron-right"></span>
            </a>
          </li>
          <ul class="nav flex-column collapse {{ request()->routeIs('clients*') ? 'show' : '' }}" id="submenu1" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('clients.create') ? 'active' : '' }}" href="{{URL::route('clients.create')}}"><span data-feather="user-plus"></span>Crear Client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('clients.index') ? 'active' : '' }}" href="{{URL::route('clients.index')}}"><span data-feather="file-text"></span>Gestionar Clients</a>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('atraccions*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('atraccions*') ? 'true' : 'false' }}" href="#submenu3">
              <span data-feather="trending-down"></span>
              Atraccions
              <span data-feather="chevron-right"></span>
            </a>
          </li>
          <ul class="nav flex-column collapse {{ request()->routeIs('atraccions*') ? 'show' : '' }}" id="submenu3" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('atraccions.create') ? 'active' : '' }}" href="{{URL::route('atraccions.create')}}"><span data-feather="plus-square"></span>Crear Atracció</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('atraccions.index') ? 'active' : '' }}" href="{{URL::route('atraccions.index')}}"><span data-feather="file-text"></span>Gestionar Atraccions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('atraccions.assigna') ? 'active' : '' }}" href="{{URL::route('atraccions.assigna')}}"><span data-feather="plus-square"></span>Assignar empleats a les atraccions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('atraccions.assignacions') ? 'active' : '' }}" href="{{URL::route('atraccions.assignacions')}}"><span data-feather="file-text"></span>Assignacions d'atraccions</a>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('incidencies*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('incidencies*') ? 'true' : 'false' }}" href="#submenu4">
              <span data-feather="alert-triangle"></span>
              Incidències
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('incidencies*') ? 'show' : '' }}" id="submenu4" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('incidencies.create') ? 'active' : '' }}" href="{{URL::route('incidencies.create')}}"><span data-feather="plus-square"></span>Crear Inicidència</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('incidencies.index') ? 'active' : '' }}" href="{{URL::route('incidencies.index')}}"><span data-feather="file-text"></span>Incidències per assignar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('incidencies.assign') ? 'active' : '' }}" href="{{URL::route('incidencies.assign')}}"><span data-feather="file-text"></span>Inicidències assignades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('incidencies.done') ? 'active' : '' }}" href="{{URL::route('incidencies.done')}}"><span data-feather="file-text"></span>Incidències finalitzades</a>
            </li>
          </ul>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('GestioServeis*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('GestioServeis*') ? 'true' : 'false' }}" href="#submenu5">
              <span data-feather="truck"></span>
              Gestio de Serveis
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('GestioServeis*') ? 'show' : '' }}" id="submenu5" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('GestioServeis.create') ? 'active' : '' }}" href="{{URL::route('GestioServeis.create')}}"><span data-feather="plus-square"></span>Crear Servei</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('GestioServeis.index') ? 'active' : '' }}" href="{{URL::route('GestioServeis.index')}}"><span data-feather="file-text"></span>Gestionar Serveis</a>
            </li>
          </ul>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('serveis*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('serveis*') ? 'true' : 'false' }}" href="#submenu6">
              <span data-feather="truck"></span>
              Assignacions Empleat-Servei-Zona
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('serveis*') ? 'show' : '' }}" id="submenu6" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('serveis.create') ? 'active' : '' }}" href="{{URL::route('serveis.create')}}"><span data-feather="plus-square"></span>Crear Assignació</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('serveis.index') ? 'active' : '' }}" href="{{URL::route('serveis.index')}}"><span data-feather="file-text"></span>Gestionar Assignacions</a>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('zones*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('zones*') ? 'true' : 'false' }}" href="#submenu7">
              <span data-feather="truck"></span>
              Zones
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('zones*') ? 'show' : '' }}" id="submenu7" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('zones.create') ? 'active' : '' }}" href="{{  URL::route('zones.create')  }}"><span data-feather="plus-square"></span>Crear Zona</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('zones.index') ? 'active' : '' }}" href="{{ URL::route('zones.index') }}"><span data-feather="file-text"></span>Gestionar Zones</a>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('productes*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('productes*') ? 'true' : 'false' }}" href="#submenu8">
              <span data-feather="truck"></span>
              Productes
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('productes*') ? 'show' : '' }}" id="submenu8" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('productes.create') ? 'active' : '' }}" href="{{  URL::route('productes.create')  }}"><span data-feather="plus-square"></span>Crear Producte</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('productes.index') ? 'active' : '' }}" href="{{ URL::route('productes.index') }}"><span data-feather="file-text"></span>Gestionar Productes</a>
            </li>
          </ul>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('ventes*') ? 'active' : '' }}" href="{{  route('ventes.index')  }}"><span data-feather="truck"></span> Ventes</a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('noticies*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="false" href="#submenu9">
              <span data-feather="alert-triangle"></span>
              Notícies
              <span data-feather="chevron-right"></span>
            </a>
          </li>
          <ul class="nav flex-column collapse {{ request()->routeIs('noticies*') ? 'show' : '' }}" id="submenu9" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('noticies.create*') ? 'active' : '' }}" href="{{ route('noticies.create') }}"><span data-feather="user-plus"></span>Crear Noticia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('noticies.index') ? 'active' : '' }}" href="{{ route('noticies.index') }}"><span data-feather="file-text"></span>Gestionar Notícies</a>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('imatges*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('imatges*') ? 'true' : 'false' }}" href="#submenu10">
              <span data-feather="alert-triangle"></span>
              Imatges
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('imatges*') ? 'show' : '' }}" id="submenu10" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('imatges.create') ? 'active' : '' }}" href="{{  URL::route('imatges.create')  }}"><span data-feather="user-plus"></span>Afegir Imatge</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior" href="#"><span data-feather="file-text"></span>Veure Imatges</a>
            </li>
          </ul>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('AssignEmpZona*') ? 'active' : '' }}" data-toggle="collapse" aria-expanded="{{ request()->routeIs('AssignEmpZona*') ? 'true' : 'false' }}" href="#submenu11">
              <span data-feather="truck"></span>
              Empleats Zones
              <span data-feather="chevron-right"></span>
            </a>
          </li>

          <ul class="nav flex-column collapse {{ request()->routeIs('AssignEmpZona*') ? 'show' : '' }}" id="submenu11" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('AssignEmpZona.create') ? 'active' : '' }}" href="{{  URL::route('AssignEmpZona.create')  }}"><span data-feather="plus-square"></span>Crear Assignació</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('AssignEmpZona.index') ? 'active' : '' }}" href="{{ URL::route('AssignEmpZona.index') }}"><span data-feather="file-text"></span>Gestionar Assignacions</a>
            </li>
          </ul>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" aria-expanded="false" href="#submenu12">
              <span data-feather="alert-triangle"></span>
              Promocions
              <span data-feather="chevron-right"></span>
            </a>
          </li>
          <ul class="nav flex-column collapse {{ request()->routeIs('promocions*') ? 'show' : '' }}" id="submenu12" data-parent="#sidebar">
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('promocions.create') ? 'active' : '' }}" href="{{  URL::route('promocions.create')  }}"><span data-feather="user-plus"></span>Crear Promoció</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-interior {{ request()->routeIs('promocions.index') ? 'active' : '' }}" href="{{ URL::route('promocions.index') }}"><span data-feather="file-text"></span>Gestionar Promocions</a>
            </li>
          </ul>


        </ul>
      </div>
    </nav>
