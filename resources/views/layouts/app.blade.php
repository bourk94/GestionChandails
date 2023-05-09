<!DOCTYPE html>
<html lang="fr-ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="multiple-select.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/2cfafb1177.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>

<body>

    <div class="w3-top">
        <div class="w3-bar navColor w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-hover-red w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            
            <a href="{{ route('accueil') }}" class="w3-bar-item w3-padding-large a_decoration_none">Logo</a>
        <!-- Dropdown pour l'administrateur -->
        @auth
            @if (Auth::user()->type == 'admin')
                <!-- Dropdown pour gérer les campagnes -->
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-padding-large w3-button w3-hover-red" title="More">Campagne <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('campagnes.create')}}">Créer</a>
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{route('articles.createArticleCampagne')}}">Créer un article</a>
                    </div>
                </div>

                <!-- Dropdown pour gérer les articles -->
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-padding-large w3-button w3-hover-red" title="More">Article <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{route('articles')}}">Gérer articles</a>
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{route('articles.createArticle')}}">Ajouter article</a>
                    </div>
                </div>

                <!-- Dropdown pour gérer les couleurs et les tailles -->
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-padding-large w3-button w3-hover-red" title="More">Couleur / Taille <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('couleurs') }}">Gérer couleurs</a>
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('tailles') }}">Gérer tailles</a>
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('couleurs.create') }}">Ajouter couleur</a>
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('tailles.create') }}">Ajouter taille</a>
                    </div>
                </div>
                <div id="nav" class="w3-bar-block w3-white w3-border w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
                    <p class="center w3-border w3-red">{{ Session::get('user') }}</p>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('usagers.edit')}}">Mon compte</a>
                    <p class="center w3-border w3-red">Campagne</p>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('campagnes.create')}}">Créer</a>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{route('articles.createArticleCampagne')}}">Créer un article</a>
                    <p class="center w3-border w3-red">Article</p>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{route('articles.createArticle')}}">Créer</a>
                    <p class="center w3-border w3-red">Couleur / Taille</p>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('couleurs') }}">Gérer couleurs</a>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('tailles') }}">Gérer tailles</a>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('couleurs.create') }}">Ajouter couleur</a>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('tailles.create') }}">Ajouter taille</a>
                </div>
                
            @endif
        @endauth
        <!--  -->

        <!-- Dropdown pour le super administrateur -->
        @auth
            @if (Auth::user()->type == 'superadmin')
                <!-- Dropdown pour gérer les utilisateurs -->
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-padding-large w3-button w3-hover-red" title="Utilisateur">Utilisateur <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('admin.create') }}">Créer</a>
                    </div>
                </div>
                <div id="nav" class="w3-bar-block w3-white w3-border w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
                    <p class="center w3-border w3-red">{{ Session::get('user') }}</p>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('usagers.edit')}}">Utilisateur</a>
                    <p class="center w3-border w3-red">Campagne</p>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('admin.create') }}">Créer</a>
                </div>
            @endif
        @endauth
        <!--  -->

        <!-- Boutons connexion et déconnexion -->
        @if (!Auth::user())
            <a class="w3-bar-item w3-padding-large w3-hover-red w3-hide-small a_decoration_none w3-right" href="{{ route('usagers.login') }}">Connexion</a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-hover-red w3-right" href="{{ route('usagers.login') }}"><i class="fa fa-sign-in"></i></a>
            @livewire('cart-counter')
        @endif

        @if (Auth::user())
            <div class="w3-dropdown-hover w3-hide-small w3-right">
                <button class="w3-padding-large w3-button w3-hover-red" title="Usager">{{ Session::get('user') }} <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('commandes.index')}}">Mes commandes</a>
                    <a class="w3-bar-item w3-button w3-hover-red" href="{{ route('usagers.edit')}}">Mon compte</a>
                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <button class="w3-bar-item w3-button w3-hover-red" type="submit">Déconnecter</button>
                    </form>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" >
                @csrf
                <button class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-hover-red w3-right" type="submit"><a><i class="fa fa-power-off"></i></a></button>
            </form>
            @if (Auth::user()->type == 'client')
                @livewire('cart-counter')
            @endif
        @endif
        <!--  -->
    </div>
</div>

    <!--  -->
    @if (Session::has('message'))
        <div class="center">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif

    @if (isset($messages) && $errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    @yield('contenu')


    <!--IL MANQUE LE CODE POUR LES MESSAGES D'ERREURS-->
    @livewireScripts

        <script>
            function myFunction()
            {
                var x = document.getElementById("nav");
                if (x.className.indexOf("w3-show") == -1)
                {
                    x.className += " w3-show";
                }
                else
                {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
    </script>

</body>

</html>
