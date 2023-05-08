@extends('layouts.app')

@section('title', 'Modifier une campagne')
@section('contenu')
    @if (Auth::user()->type == 'Admin')
        @if (count($campagnes->where('statut', 'en cours')) > 0)
            <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

                <h1 class="center">Modifier la campagne {{ $campagnes->where('statut', 'en cours')->first()->nom_campagne }}
                </h1>

                <form class="w3-container"
                    action="{{ route('campagnes.update', $campagnes->where('statut', 'en cours')->first()->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="w3-section">
                        <label for="nom">Nouveau nom de la campagne :</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="nom_campagne" id="nom_campagne"
                            value="{{ old('nom_campagne', $campagnes->where('statut', 'en cours')->first()->nom_campagne) }}">
                    </div>
                    <div class="w3-section">
                        <label for="dateDebut">Nouvelle date de début :</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date"
                            name="date_debut_campagne" id="dateDebut"
                            value="{{ old('date_debut_campagne', $campagnes->where('statut', 'en cours')->first()->date_debut_campagne) }}">
                    </div>
                    <div class="w3-section">
                        <label for="dateFin">Nouvelle date de fin :</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date"
                            name="date_fin_campagne" id="dateFin"
                            value="{{ old('date_fin_campagne', $campagnes->where('statut', 'en cours')->first()->date_fin_campagne) }}">
                    </div>
                    <div class="w3-section">
                        <label for="dateDebutCollecte">Nouvelle date de début de la collecte :</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date"
                            name="date_debut_collecte" id="date_debut_collecte"
                            value="{{ old('date_debut_collecte', $campagnes->where('statut', 'en cours')->first()->date_debut_collecte) }}">
                    </div>
                    <div class="w3-section">
                        <label for="dateFinCollecte">Nouvelle date de fin de la collecte :</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date"
                            name="date_fin_collecte" id="date_fin_collecte"
                            value="{{ old('date_fin_collecte', $campagnes->where('statut', 'en cours')->first()->date_fin_collecte) }}">
                    </div>
                    <div class="w3-section">
                        <label for="progression">Progression actuelle :
                            {{ old('progression', $campagnes->where('statut', 'en cours')->first()->progression) }}</label>
                        <br>
                        <label for="progression">Déterminez la progression de votre campagne :</label>
                        <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="progression"
                            id="progression">
                            <option value="intention d'achat">Intention d'achat</option>
                            <option value="paiement">Paiement</option>
                            <option value="collecte">Collecte</option>
                        </select>
                    </div>
                    <div class="w3-section">
                        <label for="statut">Statut de la campagne :
                            {{ old('statut', $campagnes->where('statut', 'en cours')->first()->statut) }}</label>
                        <br>
                        <label for="statut">Déterminez le statut de votre campagne :</label>
                        <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="statut"
                            id="statut">
                            <option value="en cours">En cours</option>
                            <option value="terminé">Terminé</option>
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Modifier la campagne</button>
                </form>

                <br>

                <div class="center">
                    <a href="{{ route('accueil') }}">Retour</a>
                </div>
            </div>
        @else
            <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

                <h1 class="center">Vous devez créer une campagne</h1>

                <br>

                <a href="{{ route('campagnes.create') }}" class="a_decoration_none">
                    <button class="w3-button w3-block w3-hover-red btnColor" type="button">Créer une campagne</button>
                </a>
            </div>
        @endif


        <!--SCRIPTS DE VALIDATION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script src="{{ asset('js/jsvalidation.js') }}"></script>

        {!! JsValidator::formRequest('App\Http\Requests\CampagneRequest') !!}
    @else
        <script>
            window.location.href = "{{ url()->previous() }}";
        </script>
    @endif

@endsection
