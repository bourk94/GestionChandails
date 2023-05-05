@extends('layouts.app')

@section('title', 'Mot de passe oublié')
@section('contenu')

<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
        
    <h1 class="center">Mot de passe oublié</h1>

    <form class="w3-container" method="POST" action="{{ route('login') }}">
    @csrf

        <div class="w3-section">
            <label for="email">Adresse courriel :</label>
            <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <br>

        <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Envoyer le lien de réinitialisation</button>
    </form>

    <br>
        
    <div class="center">
        <a href="{{ route('usagers.login') }}">Retour</a>
    </div>
</div>

@endsection