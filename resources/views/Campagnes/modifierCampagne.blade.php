@extends('layouts.app')

@section('title', 'Modifier une campagne')
@section('contenu')

    <!--if pour voir si il y a une campagne avec le statut en cours-->
    @if (count($campagnes->where('statut', 'en cours')) > 0)
        <form id="my-form" action="{{ route('campagnes.update', [$campagne->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card__padding">
                <div class="card__container">
                    <div class="flex__center">
                        <div>
                            <h2>Modifier une campagne</h2>
                            <div>
                                <label for="nom">Nouveau nom de la campagne :</label>
                                <input type="text" name="nom" id="nom">
                            </div>
                            <div>
                                <label for="dateDebut">Date de début :</label>
                                <input type="date" name="date_debut_campagne" id="dateDebut">
                            </div>
                            <div>
                                <label for="dateFin">Date de fin :</label>
                                <input type="date" name="date_fin_campagne" id="dateFin">
                            </div>
                            <div>
                                <label for="dateFin">Date de début de la collecte :</label>
                                <input type="date" name="date_debut_collecte" id="date_debut_collecte">
                            </div>
                            <div>
                                <label for="dateFin">Date de fin de la collecte :</label>
                                <input type="date" name="date_fin_collecte" id="date_fin_collecte">
                            </div>
                            <div>
                                <label for="nom">Nouvelle progression de la campagne:</label>
                                <input type="text" name="progression" id="progression">
                            </div>
                            <div>
                                <label for="nom">Nouveau statut de la campagne :</label>
                                <input type="text" name="statut" id="statut">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex__center margin__top" id="btnAjouter">
                <button class="btn bg__orange color__white" id="add-article" type="submit">Modifier la campagne</button>
            </div>
        </form>
    @endif


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\CampagneRequest') !!}


@endsection
