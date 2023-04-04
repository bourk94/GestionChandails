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
  <li><a class="active" href="#logo">Logo</a></li>
  <li><a href="#option1">Option1</a></li>
  <li class="right"><a href="#connexion">Connexion</a></li>
  <li class="right"><a href="#outils">Outils</a></li>
</ul>

    @yield('contenu')

</body>
</html>