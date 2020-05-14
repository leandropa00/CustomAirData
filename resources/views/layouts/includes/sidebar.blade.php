<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        {{-- <div class="text-center" style="margin-top: 5px">
            <a href="{{url('/mapa')}}">
                <img src="{{asset('includes/app-assets/images/pages/logo.png')}}" width="50%">
            </a>
        </div> --}}
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">CustomAirData</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">            
            <li class=" navigation-header li_hide ">
                <span>Menú</span> 
            </li>
            <li class=" nav-item my_menu ">
                <a href="{{ route('mapa') }}"><i class="feather icon-map"></i><span class="menu-item">Mapa</span></a>
            </li>
            <li class=" nav-item my_menu ">
                <a href="{{ route('dashboard') }}"><i class="feather icon-bar-chart-2"></i><span class="menu-item">Panel de análisis</span></a>
            </li>


            <li class=" nav-item my_menu ">
                <a href="{{ route('consulta-de-datos') }}"><i class="feather icon-clipboard"></i><span class="menu-item">Consulta de Datos</span></a>
            </li>

            {{-- <li class=" nav-item my_menu ">
                <a href="{{ route('manual-upload') }}"><i class="feather icon-upload"></i><span class="menu-item">Carga manual de datos</span></a>
            </li> --}}

            @if (Auth::user()->rol=='admin')
                <li class=" nav-item my_menu ">
                    <a href="#" class="my_menu"><i class="feather icon-users"></i><span class="menu-title">Clientes</span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{ route('empresas.index') }}"><span class="menu-item">Empresas</span></a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}"><span class="menu-item">Usuarios</span></a>
                        </li>
                    </ul>
                </li>
                
            @elseif (Auth::user()->rol=='manager')
                <li class=" nav-item my_menu ">
                    <a href="{{ route('users.index') }}"><i class="feather icon-users"></i><span class="menu-item">Usuarios</span></a>
                </li>
            @endif
            
            @if (Auth::user()->rol=='admin')
                <li class=" nav-item my_menu ">
                    <a href="{{ route('estaciones.index') }}"><i class="feather icon-server"></i><span class="menu-item">Estaciones</span></a>
                </li>
            @endif
            
            <li class=" nav-item my_menu ">
                <a href="{{ route('campanas.index') }}"><i class="feather icon-map-pin"></i><span class="menu-item">Campañas</span></a>
            </li>
                
            <li class=" nav-item my_menu ">
                <a href="{{ route('cuenta.edit') }}"><i class="feather icon-settings"></i><span class="menu-item">Configuración de cuenta</span></a>
            </li>

            <li class=" nav-item my_menu ">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="feather icon-power"></i> <span class="menu-item" data-i18n="View">Cerrar sesión</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>