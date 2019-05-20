<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    <script src="{{asset('js/app.js')}}" ></script>
    <title>Admin</title>
    @yield('style')
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('images/logo.PNG')}}" height="64px">
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown @stack('membres')">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Membres</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item " href="/admin/membername">Gestion des béneficiaires</a>
                    <a class="dropdown-item" href="/admin/member">Gestion des comptes</a>
                </div>
            </li>
            <li class="nav-item dropdown @stack('projects') @stack('subprojects')">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId2" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Projets de l'association</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId2">
                    <a class="dropdown-item" href="/admin/project">Projets globales</a>
                    <a class="dropdown-item" href="/admin/subproject">Sous-projets</a>
                </div>
            </li>
            <li class="nav-item @stack('proprojets')">
                <a class="nav-link @stack('proprojects')" href="/admin/proproject">Projets professionnels</a>
            </li>
            <li class="nav-item @stack('entrprojects')">
                <a class="nav-link" href="/admin/entrproject">Projet d'entrepreneurials</a>
            </li>
            <li class="nav-item @stack('comments')">
                <a class="nav-link" href="/admin/comments">Gestion des commentaires</a>
            </li>
            
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user-circle fa-2x"></i> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/admin/logout"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Deconnexion
                    </a>

                    <form id="logout-form" action="/admin/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>