<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @stack('loader')
    <div id="app">
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper blue lighten-1">
                    <a class="brand-logo" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>

                    <ul class="right hide-on-med-and-down">
                        @auth
                            <li>
                                <a href="{{ route('vagas.index') }}">Vagas</a>
                            </li>
                            @emp
                                <li>
                                    <a href="{{ route('cliente.index')}}">
                                        Currículos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('empresa.edit', Auth::user()->userable->id)}}">
                                        Meus Dados
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('cliente.curriculo', Auth::user()->userable_id) }}">{{ __('Currículo') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('cliente.edit', Auth::user()->userable->id)}}">
                                        Meus Dados
                                    </a>
                                </li>
                            @endemp
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="right hide-on-med-and-down">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                              
                            <li class="dropdown-trigger" data-target="navbarDropdown">
                                <a>
                                    {{ Auth::user()->name }} 
                                    <i class="material-icons right">arrow_drop_down</i>
                                </a>
                            </li>

                            <ul class="dropdown-content" id="navbarDropdown">
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                        @endguest
                    </ul>
                </div>
            </nav>
        </div>

        <main class="py-3">
            <div class="container">            
                @if (session('sucesso'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('sucesso') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('erro'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('erro') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
