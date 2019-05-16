<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') || {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .topContainer{
            position: fixed;
            bottom: 12px;
            right: 12px;
            padding: 4px;
            background-color: white;
            border-radius: 50%;
            border:1px solid #8a8484;
        }
        .topContainer > button{
            font-size: 19px;
            color: #8a8484;
        }
        .topContainer > button:focus{
            box-shadow: none;
        }
    </style>
    @yield('style')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('images/logo.PNG')}}" height="64px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @stack('accueil')">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item @stack('projets')">
                    <a class="nav-link" href="/projects">Projets de l’association</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes projets professionnels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes projet entrepreneurials</a>
                </li>


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Chercher">
                    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">S'identifier</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Bienvenue, {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">
                                Profil
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </nav>
    <main class="py-4">
        <div class="topContainer">
            <button onclick="toTop()" class="btn"><i class="fa fa-arrow-up"></i></button>
        </div>
        @yield('content')
    </main>
    @yield('script')
    <script>
        function toTop(){
            window.scrollTo(0,0)
        }
    </script>
</div>
</body>
</html>
