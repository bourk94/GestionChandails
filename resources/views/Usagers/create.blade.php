@extends('layouts.app')

@section('title', 'Créer un compte')
@section('contenu')

<section class="main-container">
    <div class="card__padding">
        <div class="card__container">
            <div class="flex__center">
                <h1>Créer un compte</h1>
                <form action="{{ route('usagers.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nom">Nom</label>
                        <input class="@error('nom') is-invalid @enderror" type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
                        @error('nom')
                            <span class="text-danger">{{ $messages }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="prenom">Prénom</label>
                        <input class="@error('prenom') is-invalid @enderror" type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
                        @error('prenom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email">Adresse courriel</label>
                        <input class="@error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password">Mot de passe</label>
                        <input class="@error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="8 caractères minimum" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="passwordConfirmation">Confirmer le mot de passe</label>
                        <input class="@error('password') is-invalid @enderror" type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="8 caractères minimum" required>
                        @error('password')
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


<script src="{{asset('js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\UsagerRequest')!!}






@endsection