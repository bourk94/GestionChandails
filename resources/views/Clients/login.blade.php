@extends('layouts.app')

@section('title', 'Connexion')
@section('contenu')

    <section class="main-container">
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <h1>Connexion</h1>
                    <div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label for="email" class="form-label">Adresse courriel</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div>
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="flex__center">
                              <a class="hover__orange color__white" href="{{ route('clients.create') }}">Créer un compte</a>
                            </div>
                            <div class="flex__center">
                                <div class="flex__inline margin__top">
                                    <button class="btn bg__orange color__white" type="submit">Connexion</button>
                                    <button class="btn bg__orange color__white margin__top" type="button">Mot de passe oublié</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
