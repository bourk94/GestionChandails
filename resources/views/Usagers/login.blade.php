@extends('layouts.app')

@section('title', 'Connexion')
@section('contenu')

    <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
        
        <h1 class="center">Connexion</h1>

        <form class="w3-container" method="POST" action="{{ route('login') }}">
        @csrf

            <div class="w3-section">
                <label for="email">Adresse courriel :</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="w3-section">
                <label for="password">Mot de passe :</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="password" id="password" name="password" required>
            </div>
        
            <div class="center">
                <a href="{{ route('usagers.create') }}">Créer un compte</a>
            </div>
            <br>
            <div>
                <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Connexion</button>
                <br>
                <a class="a_decoration_none" href="{{ route('password.request') }}"><button class="w3-button w3-block w3-hover-red btnColor" type="button">Mot de passe oublié</button></a>
            </div>
        </form>
    </div>

@endsection
