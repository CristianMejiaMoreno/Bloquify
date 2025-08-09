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
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
            
        <div class="d-flex">

            @if (!request()->is('login'))
                    <nav class="sidebar d-flex flex-column flex-shrink-0 position-fixed">
                        <button class="toggle-btn" onclick="toggleSidebar()">
                            <i class="fas fa-chevron-left"></i>
                        </button>

                        <div class="p-4">
                            <a class="logo-text fw-bold mb-0">{{ config('app.name', 'Laravel') }}</a>
                            <p class="text-white small hide-on-collapse">Dashboard</p>
                        </div>

                        <div class="nav flex-column">
                            <a href="#" class="sidebar-link active text-decoration-none p-3">
                                <i class="fas fa-home me-3"></i>
                                <span class="hide-on-collapse">Dashboard</span>
                            </a>
                            <a href="#" class="sidebar-link text-decoration-none p-3">
                                <i class="fas fa-chart-bar me-3"></i>
                                <span class="hide-on-collapse">Analytics</span>
                            </a>
                            <a href="#" class="sidebar-link text-decoration-none p-3">
                                <i class="fas fa-users me-3"></i>
                                <span class="hide-on-collapse">Customers</span>
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

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</body>
</html>


