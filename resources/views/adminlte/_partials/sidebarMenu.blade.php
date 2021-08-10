@php $comunidad = session()->get('cmd_seleccionada') @endphp
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Configuración
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard', $comunidad ?? '')}}" class="nav-link {{ SetActiveRoute('dashboard') }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>@lang('Panel')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('comunidades.show', $comunidad)}}" class="nav-link">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>Comunidad</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('propiedades.index')}}" class="nav-link {{ SetActiveRoute('propiedades.*') }}">
                        <i class="fas fa-house-user nav-icon"></i>
                        <p>Propiedades</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('juntas.index')}}" class="nav-link {{ SetActiveRoute('juntas.*') }}">
                        <i class="fa fa-compass nav-icon"></i>
                        <p>Juntas de propietarios</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('proveedores.pasarComunidad', $comunidad)}}" class="nav-link {{ SetActiveRoute('proveedores.*') }}">
                        <i class="fa fa-concierge-bell nav-icon"></i>
                        <p>Proveedores</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cuentas.index')}}" class="nav-link {{ SetActiveRoute('cuentas.*') }}">
                        <i class="fa fa-euro-sign nav-icon"></i>
                        <p>Cuentas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.index')}}" class="nav-link {{ SetActiveRoute('usuarios.*') }}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Usuarios</p>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Administración
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard', $comunidad ?? '')}}" class="nav-link {{ SetActiveRoute('dashboard') }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>@lang('Panel')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('juntas.index')}}" class="nav-link {{ SetActiveRoute('juntas.*') }}">
                        <i class="fa fa-compass nav-icon"></i>
                        <p>Juntas de propietarios</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('proveedores.pasarComunidad', $comunidad)}}" class="nav-link {{ SetActiveRoute('proveedores.*') }}">
                        <i class="fa fa-concierge-bell nav-icon"></i>
                        <p>Proveedores</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.index')}}" class="nav-link {{ SetActiveRoute('usuarios.*') }}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usuarios.index')}}" class="nav-link {{ SetActiveRoute('usuarios.*') }}">
                        <i class="fa fa-tools nav-icon"></i>
                        <p>Incidencias</p>
                    </a>
                </li>
            </ul>



        <li class="nav-item">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Propietarios
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard', $comunidad ?? '')}}" class="nav-link {{ SetActiveRoute('dashboard') }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>@lang('Panel')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('propiedades.index')}}" class="nav-link {{ SetActiveRoute('propiedades.*') }}">
                        <i class="fas fa-house-user nav-icon"></i>
                        <p>Mis propiedades</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('juntas.index')}}" class="nav-link {{ SetActiveRoute('juntas.*') }}">
                        <i class="fa fa-car-crash nav-icon"></i>
                        <p>Juntas de propietarios</p>
                    </a>
                </li>
            </ul>
    </ul>
</nav>