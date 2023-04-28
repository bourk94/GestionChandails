@extends('layouts.app')

@section('title', 'Compte')
@section('contenu')

    <section class="main-container">
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <h1>Mon compte</h1>
                    <div>
                        @if (Auth::user()->type == 'superadmin')
                            <h3>Super administrateur</h3>
                        @else
                            <h3>{{ $usager->nom }} {{ $usager->prenom }}</h3>
                            <h3>{{ $usager->email }}</h3>
                        @endif
                    </div>
                    <h1>Modifier le mot de passe</h1>
                    <div>
                        <!-- Le formulaire ne fonctionne pas -->
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
                                    <input type="password" class="@error('password') is-invalid @enderror" id="old_password" name="old_password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="form-label">Nouveau mot de passe :</label>
                                    <input type="password" class="@error('password') is-invalid @enderror" id="password" name="password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe :</label>
                                    <input type="password" class="@error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="id" id="id" value="{{$usager->id}}">
                                <div class="center">
                                    <button type="submit" class="buttonSite">Modifier le mot de passe</button>
                                </div>
                        </form>
                        <!-- Le formulaire ne fonctionne pas -->
                    </div>
                </div>
            </div>
            <div class="center">
                <a href="{{ route('accueil') }}" class="buttonSite">Retour</a>
            </div>
        </div>
    </section>

@endsection
