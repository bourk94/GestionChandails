@extends('layouts.app')

@section('title', 'Mon compte')
@section('contenu')

    @if (Auth::user()->type == 'admin')
        <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

            <h1 class="center">Mon compte</h1>

            <div class="center">
                <h3>{{ $usager->nom }} {{ $usager->prenom }}</h3>
                <h3>{{ $usager->email }}</h3>
            </div>

            <form class="w3-container" method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <span><strong>Modifier mon compte</strong></span>
                <div class="w3-section">
                    <label for="email" class="form-label">Adresse courriel :</label>
                    <input type="email"
                        class="@error('email') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" id="email" name="email" value="{{ $usager->email }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text"
                        class="@error('nom') is-invalid @enderror w3-input w3-border w3-hover-border-black" id="nom"
                        name="nom" value="{{ $usager->nom }}" required>
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text"
                        class="@error('prenom') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        id="prenom" name="prenom" value="{{ $usager->prenom }}" required>
                    @error('prenom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="old_password" class="form-label">Mot de passe actuel :</label>
                    <input type="password"
                        class="@error('password') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        id="old_password" name="old_password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="password" class="form-label">Nouveau mot de passe :</label>
                    <input type="password"
                        class="@error('password') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        id="password" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe :</label>
                    <input type="password"
                        class="@error('password') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        id="password_confirmation" name="password_confirmation">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="id" id="id" value="{{ $usager->id }}">

                <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Modifier</button>
            </form>

            <br>

            <div class="center">
                <a href="{{ route('accueil') }}">Retour</a>
            </div>
        </div>
    @else
        <div class="center">
            <h2>Page indisponible</h2>
        </div>
    @endif

@endsection
