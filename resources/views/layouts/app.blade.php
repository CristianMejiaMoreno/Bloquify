<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    @if(request()->is('login'))
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endif

    @if(!request()->is('login'))
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endif


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
            
        <div class="d-flex">

            @if (!request()->is('login'))
                    <nav class="sidebar d-flex flex-column flex-shrink-0 position-fixed">
                        <button class="toggle-btn" onclick="toggleSidebar()">
                            <i class="fas fa-chevron-left"></i>
                        </button>

                        <div class="p-4">
                            <a class="logo-text fw-bold mb-0">{{ config('app.name', 'Laravel') }}</a>
                            <p class="text-white small hide-on-collapse">Panel administrativo</p>
                        </div>

                        <div class="nav flex-column">
                            <a href="{{ route('home') }}" class="sidebar-link text-decoration-none p-3 {{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="fas fa-home me-3"></i>
                                <span class="hide-on-collapse">Inicio</span>
                            </a>
                            <a href="{{ route('Cliente.index') }}" class="sidebar-link text-decoration-none p-3 {{ request()->routeIs('Cliente.index') ? 'active' : '' }}">
                                <i class="fas fa-solid fa-user me-3"></i>
                                <span class="hide-on-collapse">Clientes</span>
                            </a>
                            <a href="{{ route('dispositivo.index') }}" class="sidebar-link text-decoration-none p-3 {{ request()->routeIs('dispositivo.index') ? 'active' : '' }}">
                                <i class="fa-solid fa-mobile-retro me-3"></i>
                                <span class="hide-on-collapse">Dispositivos</span>
                            </a>

                            <a href="#" class="sidebar-link text-decoration-none p-3">
                                <i class="fas fa-box me-3"></i>
                                <span class="hide-on-collapse">Products</span>
                            </a>
                            <a href="#" class="sidebar-link text-decoration-none p-3">
                                <i class="fas fa-gear me-3"></i>
                                <span class="hide-on-collapse">Settings</span>
                            </a>
                        </div>

                        <div class="profile-section mt-auto p-4">
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/women/70.jpg" style="height:60px" class="rounded-circle" alt="Profile">
                                <div class="ms-3 profile-info">
                                    <h6 class="text-white mb-0">{{ Auth::user()->name }}</h6>
                                    <div class="col">
                                        <div class="row">
                                            <a class="text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
            @endif

            <main class="main">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>

        </div> 


    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer></script>

    @stack('scripts')


    <script>const APP_URL = "{{ url('/') }}";</script>
    <script src="{{ asset('js/app/scripts.js') }}"></script>
    <script type="module" src="{{ asset('js/auxiliares/scripts.js') }}"></script>

    @if(request()->is('admin/Cliente'))
        <script type="module" src="{{ asset('js/cliente/scripts.js') }}"></script>
    @endif

    @if(request()->is('admin/dispositivo'))
        <script type="module" src="{{ asset('js/dispositivo/scripts.js') }}" defer></script>
    @endif

</body>
</html>


