@extends('layouts.app')

@section('title', 'Modifier un article de campagne')
@section('contenu')

    @if (count($articles_campagnes))
        @foreach ($articles_campagnes as $article_campagne)
            <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

                <h1 class="center">Modifier un article de campagne</h1>

                <form class="w3-container" id="my-form"
                    action="{{ route('articles.updateArticleCampagne', [$article_campagne->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @foreach ($campagnes as $campagne)
                        @if ($campagne->statut == 'en cours')
                            <input type="hidden" name="campagne_id" value="{{ $campagne->id }}">
                        @endif
                    @endforeach

                    <div class="w3-section">
                        <label for="imageArticleCampagne">Définir une nouvelle image d'article :</label>
                        <input type="file"
                            class="@error('image') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                            style="width:100%;" name="image" id="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w3-section">
                        <label for="prixArticle">Nouveau Prix :</label>
                        <input type="number"
                            class="@error('prix') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                            style="width:100%;" name="prix" id="prix" min="0"
                            value="{{ old('prix', $article_campagne->prix) }}">
                        @error('prix')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        @if (count($couleurs))
                            @foreach ($couleurs->where('id', '=', $article_campagne->couleur) as $couleur)
                                <label for="couleurPrecedente">Sélection actuel :
                                    {{ old('nom_couleur', $couleur->nom_couleur) }}</label>
                                <br>
                                <label for="couleurArticle">Définir une nouvelle couleur :</label>
                            @endforeach
                            <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="couleur_id"
                                id="couleur">
                                @foreach ($couleurs as $couleur)
                                    <option value="{{ $couleur->id }}">{{ $couleur->nom_couleur }}</option>
                                @endforeach
                            </select>
                        @else
                            <h2>Il n'y a aucune couleur</h2>
                        @endif
                    </div>

                    <div>
                        @if (count($tailles))
                            @foreach ($tailles->where('id', '=', $article_campagne->taille) as $taille)
                                <label for="taillePrecedente">Sélection actuel :
                                    {{ old('format', $taille->format) }}</label>
                                <br>
                                <label for="tailleArticle">Définir une nouvelle taille :</label>
                            @endforeach
                            <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="taille_id"
                                id="taille">
                                @foreach ($tailles as $taille)
                                    <option value="{{ $taille->id }}">{{ $taille->format }}</option>
                                @endforeach
                            </select>
                        @else
                            <h2>Il n'y a aucune taille</h2>
                        @endif
                    </div>

                    <div>
                        <label for="qteArticle">Définir une nouvelle quantité disponible :</label>
                        <input class="@error('quantite_max') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                            style="width:100%;" type="number" name="quantite_max" id="quantite_max" min="0"
                            placeholder="Valeur par défaut est 5"
                            value="{{ old('quantite_max', $article_campagne->quantite_max) }}">
                        @error('quantite_max')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <br>
                    <button type="submit" class="w3-button w3-block w3-hover-red btnColor">modifier un article de la
                        campagne</button>
                </form>

                <br>

                <div class="center">
                    <a href="{{ route('accueil') }}">Retour</a>
                </div>
            </div>

        @endforeach
    @endif

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleCampagneRequest') !!}


@endsection
