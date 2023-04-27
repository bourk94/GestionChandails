@extends('layouts.app')

@section('title', 'Créer un administrateur')
@section('contenu')

    <section class="main-container">
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <h1>Créer un administrateur</h1>
                    <form action="{{ route('usagers.storeAdmin') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nom">Nom</label>
                            <input class="@error('nom') is-invalid @enderror" type="text" name="nom" id="nom"
                                value="{{ old('nom') }}" required>
                            @error('nom')
                                <span class="text-danger">{{ $messages }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="prenom">Prénom</label>
                            <input class="@error('prenom') is-invalid @enderror" type="text" name="prenom"
                                id="prenom" value="{{ old('prenom') }}" required>
                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email">Adresse courriel</label>
                            <input class="@error('email') is-invalid @enderror" type="email" name="email" id="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex__center">
                            <button class="btn color__white bg__orange" type="submit">Créer compte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
