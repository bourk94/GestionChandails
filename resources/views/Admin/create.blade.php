@extends('layouts.app')

@section('title', 'Créer un administrateur')
@section('contenu')

    @if (Auth::user()->type == 'superadmin')
        <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

            <h1 class="center">Créer un administrateur</h1>

            <form class="w3-container" action="{{ route('usagers.storeAdmin') }}" method="POST">
                @csrf

                <div class="w3-section">
                    <label for="nom">Nom :</label>
                    <input class="@error('nom') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" type="text" name="nom" id="nom" value="{{ old('nom') }}"
                        required>
                    @error('nom')
                        <span class="text-danger">{{ $messages }}</span>
                    @enderror
                </div>

                <div class="w3-section">
                    <label for="prenom">Prénom :</label>
                    <input class="@error('prenom') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"
                        required>
                    @error('prenom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w3-section">
                    <label for="email">Adresse courriel :</label>
                    <input class="@error('email') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" type="email" name="email" id="email" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Créer compte</button>
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
