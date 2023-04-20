@extends('layouts.app')

@section('title', 'Créer un compte')
@section('contenu')

<section class="main-container">
    <div class="card__padding">
        <div class="card__container">
            <div class="flex__center">
                <h1>Créer un compte</h1>
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
                    </div>
                    <div>
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
                    </div>
                    <div>
                        <label for="email">Adresse courriel</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="8 caractères minimum" required>
                    </div>
                    <div>
                        <label for="passwordConfirmation">Confirmer le mot de passe</label>
                        <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="8 caractères minimum" required>
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