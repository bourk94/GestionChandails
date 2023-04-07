<!DOCTYPE html>
<html lang="fr-ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleurs.css') }}">
    
    <title>@yield('title')</title>
</head>
<body>

<ul class="topnav">
  <li><a class="active" href="/">Logo</a></li>
  <li><a href="/campagnes/create">Créer campagne</a></li> {{-- Temporaire pour le moment --}}
  <li class="right"><a href="#connexion">Connexion</a></li>
  <li class="right"><a href="#outils">Outils</a></li>
</ul>

    @yield('contenu')

</body>
</html>