@extends('layouts.app')

@section('title', 'Mon compte')
@section('contenu')
@if (Auth::user()->type == 'client')
    <section class="main-container">
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <h1>Mon compte</h1>
                    <div>
                        <h3>{{ $usager->nom }} {{ $usager->prenom }}</h3>
                        <h3>{{ $usager->email }}</h3>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('usagers.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                                <div>
                                    <label for="email" class="form-label">Adresse courriel :</label>
                                    <input type="email" class="@error('email') is-invalid @enderror" id="email" name="email" value="{{ $usager->email }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="nom" class="form-label">Nom :</label>
                                    <input type="text" class="@error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $usager->nom }}" required>
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="prenom" class="form-label">Prénom :</label>
                                    <input type="text" class="@error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ $usager->prenom }}" required>
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="old_password" class="form-label">Mot de passe actuel :</label>
                                    <input type="password" class="@error('password') is-invalid @enderror" id="old_password" name="old_password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="form-label">Nouveau mot de passe :</label>
                                    <input type="password" class="@error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe :</label>
                                    <input type="password" class="@error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="id" id="id" value="{{$usager->id}}">
                                <div class="center">
                                    <button type="submit" class="buttonSite">Modifier</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="center">
                <a href="{{ route('accueil') }}" class="buttonSite">Retour</a>
            </div>
        </div>
    </section>
    @endif
@endsection
