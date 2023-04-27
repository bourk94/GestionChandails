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
                        <form method="POST" action="{{ route('usagers.update', $usager->id) }}" enctype="multipart/form-data" >
                            @csrf
                            @method('PATCH')
                                <div>
                                    <label for="old_password" class="form-label">Ancien mot de passe :</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                                </div>
                                <div>
                                    <label for="password" class="form-label">Nouveau mot de passe :</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div>
                                    <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe :</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
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
