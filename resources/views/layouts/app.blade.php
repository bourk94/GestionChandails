<!DOCTYPE html>
<html lang="fr-ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>@yield('title')</title>
</head>
<body>

<ul class="topnav">
    <li><a class="active" href="/">Logo</a></li>

    <!-- Dropdown pour l'administrateur -->
    @auth
        @if (Auth::user()->type == 'admin')

            <!-- Dropdown pour gérer les campagnes -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Campagne</a>
                <div class="dropdown-content">
                    <a href="/campagnes/create">Créer</a>
                    <a href="#">Modifier</a>
                    <a href="#">Supprimer</a>
                </div>
            </li>

            <!-- Dropdown pour gérer les articles -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Article</a>
                <div class="dropdown-content">
                    <a href="#">Créer</a>
                    <a href="#">Modifier</a>
                    <a href="#">Supprimer</a>
                </div>
            </li>
        @endif
    @endauth
    <!--  -->

    <!-- Dropdown pour le super administrateur -->
    @auth
        @if (Auth::user()->type == 'superadmin')

            <!-- Dropdown pour gérer les utilisateurs -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Utilisateur</a>
                <div class="dropdown-content">
                    <a href="#">Créer</a>
                    <a href="#">Modifier</a>
                    <a href="#">Supprimer</a>
                </div>
            </li>
        @endif
    @endauth
    <!--  -->

    <!-- Boutons connexion et déconnexion -->
    @if (!Auth::user())
    <li class="right"><a href="/usagers/login">Connexion</a></li>
    @endif

    @if (Auth::user())
    <li class="right">
        <form method="POST" action="{{ route('logout') }}" >
            @csrf
            <button class="test" type="submit">Déconnecter</button>
        </form>
    </li>
    @endif
    <!--  -->
    @if (Auth::user())
        <li class="right"><a href="#">
            {{ Session::get('user') }}
        </a></li>
    @endif

</ul>

    @yield('contenu')

    <!--IL MANQUE LE CODE POUR LES MESSAGES D'ERREURS-->

</body>
</html>