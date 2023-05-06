@extends('layouts.app')

@section('title', 'Modifier une campagne')
@section('contenu')

    @if (count($campagnes->where('statut', 'en cours')) > 0)
    <form id="my-form" action="{{ route('campagnes.update', $campagnes->where('statut', 'en cours')->first()->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card__padding">
                <div class="card__container">
                    <div class="flex__center">
                        <div>
                            <h2>Modifier une campagne</h2>
                            <div>
                                <label for="nom">Nouveau nom de la campagne :</label>
                                <input type="text" name="nom_campagne" id="nom_campagne" value="{{ old('nom_campagne', $campagnes->where('statut', 'en cours')->first()->nom_campagne)}}">
                            </div>
                            <div>
                                <label for="dateDebut">Nouvelle date de début :</label>
                                <input type="date" name="date_debut_campagne" id="dateDebut" value="{{ old('date_debut_campagne', $campagnes->where('statut', 'en cours')->first()->date_debut_campagne)}}">
                            </div>
                            <div>
                                <label for="dateFin">Nouvelle date de fin :</label>
                                <input type="date" name="date_fin_campagne" id="dateFin" value="{{ old('date_fin_campagne', $campagnes->where('statut', 'en cours')->first()->date_fin_campagne)}}">
                            </div>
                            <div>
                                <label for="dateFin">Nouvelle date de début de la collecte :</label>
                                <input type="date" name="date_debut_collecte" id="date_debut_collecte" value="{{ old('date_debut_collecte', $campagnes->where('statut', 'en cours')->first()->date_debut_collecte)}}">
                            </div>
                            <div>
                                <label for="dateFin">Nouvelle date de fin de la collecte :</label>
                                <input type="date" name="date_fin_collecte" id="date_fin_collecte" value="{{ old('date_fin_collecte', $campagnes->where('statut', 'en cours')->first()->date_fin_collecte)}}">
                            </div>
                            <div>
                                <label for="nom">Nouvelle progression de la campagne:</label>
                                <input type="text" name="progression" id="progression" value="{{ old('progression', $campagnes->where('statut', 'en cours')->first()->progression)}}">
                            </div>
                            <div>
                                <label for="nom">Nouveau statut de la campagne :</label>
                                <input type="text" name="statut" id="statut" value="{{ old('statut', $campagnes->where('statut', 'en cours')->first()->statut)}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex__center margin__top" id="btnAjouter">
                <button class="btn bg__orange color__white" id="add-article" type="submit">Modifier la campagne</button>
            </div>
        </form>
    @else
    <div class="card__padding">
        <div class="card__container">
            <div class="flex__center">
                <div>
                    <h2>Vous devez créer une campagne</h2>
                    <a href="{{ route('campagnes.createCampagne') }}" class="btn bg__orange color__white" id="add-article">Retourner à
                        l'accueil</a>
                </div>
            </div>
        </div>
    </div>
    @endif


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\CampagneRequest') !!}


@endsection
