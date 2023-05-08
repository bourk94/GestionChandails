@extends('layouts.app')

@section('title', 'Créer un article de campagne')
@section('contenu')


    @if (count($articles))
        <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

            <h1 class="center">Créer un article de campagne</h1>

            <form class="w3-container" id="my-form" action="{{ route('articles.storeArticleCampagne') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                @foreach ($campagnes as $campagne)
                    @if ($campagne->statut == 'en cours')
                        <input type="hidden" name="campagne_id" value="{{ $campagne->id }}">
                    @endif
                @endforeach

                <div class="w3-section">
                    <label for="listeArticle">Choisir un article :</label>
                    <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="article_id"
                        id="article_id">
                        @foreach ($articles as $article)
                            <option value="{{ $article->id }}">{{ $article->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w3-section">
                    <label for="imageArticleCampagne">Image de l'article :</label>
                    <input type="file"
                        class="@error('image') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" name="image" id="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w3-section">
                    <label for="prixArticle">Prix :</label>
                    <input type="number"
                        class="@error('prix') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" name="prix" id="prix" min="0">
                    @error('prix')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    @if (count($couleurs))
                        <label for="couleurArticle">Couleur :</label>
                        <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="couleur_id"
                            id="couleur_id">
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
                        <label for="tailleArticle">Taille :</label>
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
                    <label for="qteArticle">Quantité disponible</label>
                    <input class="@error('quantite_max') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" type="number" name="quantite_max" id="quantite_max" min="0"
                        placeholder="Valeur par défaut est 5">
                    @error('quantite_max')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <br>

                <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Ajouter un article à la
                    campagne</button>
            </form>

            <br>

            <div class="center">
                <a href="{{ route('accueil') }}">Retour</a>
            </div>
        </div>
    @else
        <div>
            <h2>Il n'y a aucun article</h2>
            <a href="{{ route('articles.createArticle') }}" class="btn bg__orange color__white">Créer un
                article</a>
        </div>
    @endif

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleCampagneRequest') !!}


@endsection
