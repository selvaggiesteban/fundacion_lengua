<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\User;
        use Illuminate\Support\Facades\Route;
    @endphp

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{url('/')}}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                @include('_partials.macros',["height"=>20])
            </span>
            <!-- <span class="app-brand-text demo menu-text fw-semibold ms-2">{{config('variables.templateName')}}</span> -->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-block align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Asegura que solo usuarios autenticados vean el menú completo --}}
        @auth

            {{-- Sección de Menú para Super Administrador (Contenido EXCLUSIVO de SuperAdmin) --}}
            @if(Auth::user()->isSuperAdmin())
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Panel Super Administrador</span>
                </li>
                {{-- @php $activeClass = (Route::currentRouteName() === 'superadmin.dashboard') ? 'active' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('superadmin.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-dashboard-line"></i>
                        <div data-i18n="Dashboard SA">Panel de Super Administrador</div>
                    </a>
                </li> --}}
            @elseif(Auth::user()->isAdmin())
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Panel Administrador</span>
                </li>
                {{-- @php $activeClass = (Route::currentRouteName() === 'admin.dashboard') ? 'active' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-dashboard-line"></i>
                        <div data-i18n="Dashboard Admin">Panel de Administrador</div>
                    </a>
                </li> --}}
            @endif

            {{-- Contenido común para Admin y SuperAdmin --}}
            @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                {{-- Si hubieran funcionalidades EXCLUSIVAS de Super Admin irían aquí. --}}
                {{-- Ejemplo: si tienes una ruta para ver logs exclusivos del superadmin --}}
                {{-- <li class="menu-item">
                    <a href="{{ route('superadmin.logs.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-file-text-line"></i>
                        <div data-i18n="Logs">Logs del Sistema</div>
                    </a>
                </li> --}}
                @php $activeClass = (Route::currentRouteName() === 'analytics') ? 'active' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('analytics') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-bar-chart-line"></i>
                        <div data-i18n="Analytics">Analíticas</div>
                    </a>
                </li>
                {{-- Elementos de Gestión de la Aplicación --}}
                @php $activeClass = (request()->routeIs('admin.students.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.students.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-user-smile-line"></i>
                        <div data-i18n="Estudiantes">Estudiantes</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.accomodations.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.accomodations.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-home-line"></i>
                        <div data-i18n="Alojamientos">Alojamientos</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.scholarships.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.scholarships.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-hand-coin-line"></i>
                        <div data-i18n="Becas">Becas</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.inquiries.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.inquiries.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-file-paper-line"></i>
                        <div data-i18n="Solicitudes">Solicitudes</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.grants.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.grants.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-file-line"></i>
                        <div data-i18n="Concesiones">Concesiones</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.rates.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.rates.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-price-tag-line"></i>
                        <div data-i18n="Tarifas">Tarifas</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.email-templates.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.email-templates.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-mail-line"></i>
                        <div data-i18n="E-mails">E-mails</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.graduates.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.graduates.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-graduation-cap-line"></i>
                        <div data-i18n="Graduados">Graduados</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.tests.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.tests.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-a-b"></i>
                        <div data-i18n="Tests">Tests</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('admin.orders.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.orders.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-file-list-line"></i>
                        <div data-i18n="Pedidos">Pedidos</div>
                    </a>
                </li>
                {{-- NUEVO: Mensajes (para Admin y Super Admin) --}}
                @php $activeClass = (request()->routeIs('admin.messages.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('admin.messages.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-message-2-line"></i> {{-- Icono de mensajes --}}
                        <div data-i18n="Mensajes">Mensajes</div>
                    </a>
                </li>
                {{-- NUEVO: Usuarios (ahora accesible para Admin y Super Admin) --}}
                @php $activeClass = (request()->routeIs('admin.users.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    {{-- La ruta para users ahora es admin.users.index --}}
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-group-line"></i>
                        <div data-i18n="Usuarios">Usuarios</div>
                    </a>
                </li>
                {{-- Agrega aquí cualquier otra funcionalidad específica para Admin --}}
            @endif

            {{-- Sección de Menú para Estudiantes --}}
            {{-- Visible si el usuario es Estudiante, Admin o Super Admin --}}
            @if(Auth::user()->isStudent())
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Panel de Estudiante</span>
                </li>
                @php $activeClass = (Route::currentRouteName() === 'student.dashboard') ? 'active' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('student.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-dashboard-line"></i>
                        <div data-i18n="Dashboard Estudiante">Dashboard Estudiante</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('student.inquiries.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('student.inquiries.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-file-paper-line"></i>
                        <div data-i18n="Mis Solicitudes">Mis Solicitudes</div>
                    </a>
                </li>
                @php $activeClass = (request()->routeIs('student.tests.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('student.tests.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-a-b"></i>
                        <div data-i18n="Mis Tests">Mis Tests</div>
                    </a>
                </li>
                {{-- NUEVO: Mis Mensajes (para Estudiantes, Admin y Super Admin) --}}
                @php $activeClass = (request()->routeIs('student.messages.*')) ? 'active open' : null; @endphp
                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ route('student.messages.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-message-2-line"></i> {{-- Icono de mensajes --}}
                        <div data-i18n="Mis Mensajes">Mis Mensajes</div>
                    </a>
                </li>
                {{-- Agrega aquí cualquier otra funcionalidad específica para Estudiante --}}
            @endif

            {{-- Enlaces generales para cualquier usuario autenticado (ej. Perfil) --}}
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">General</span>
            </li>
            @php $activeClass = (request()->routeIs('pages-account-settings-account') || request()->routeIs('account-settings')) ? 'active' : null; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="{{ route('account-settings') }}" class="menu-link">
                    <i class="menu-icon tf-icons ri-settings-4-line"></i>
                    <div data-i18n="Configuración de Cuenta">Configuración de Cuenta</div>
                </a>
            </li>

            {{-- Botón de Logout --}}
            <li class="menu-item">
                <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="menu-icon tf-icons ri-logout-box-line"></i>
                    <div data-i18n="Logout">Salir</div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        @endauth
    </ul>

</aside>