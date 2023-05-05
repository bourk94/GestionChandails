@extends('layouts.app')

@section('title', 'Mot de passe oublié')
@section('contenu')

<section class="main-container">
    <div class="card__padding">
        <div class="card__container">
            <div class="flex__center">
                <h1>Mot de passe oublié</h1>
                <div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <label for="email" class="form-label">Adresse courriel</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="flex__center">
                            <div class="flex__inline margin__top">
                                <button class="btn bg__orange color__white" type="submit">Envoyer le lien de réinitialisation</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="center">
            <a href="{{ route('usagers.login') }}" class="buttonSite">Retour</a>
        </div>
    </div>
</section>

@endsection