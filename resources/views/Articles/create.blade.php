@extends('layouts.app')

@section('title', 'Créer un article de campagne')
@section('contenu')

    <form id="my-form" action="{{ route('articles.storeArticleCampagne') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <!--les champs entrés manuellement par l'admin-->
                        <!--nom, type, description, prix, image, quantite (quantite disponible), couleur_id, taille_id-->
                        <h2>Créer un article de campagne</h2>
                        @foreach ($campagnes as $campagne)
                            @if ($campagne->statut == 'en cours')
                                <input type="hidden" name="campagne_id" value="{{ $campagne->id }}">
                            @endif
                        @endforeach

                        {{-- menu déroulant pour afficher les articles (template disponible dans la table Article) --}}
                        <div>

                            @if (count($articles))
                                <div>
                                <label for="listeArticle">Choisir un article</label>
                                <select name="article_id" id="article_id">
                                    @foreach ($articles as $article)
                                        <option value="{{ $article->id }}">{{ $article->nom }}</option>
                                    @endforeach
                                        <option value="autre">Créer un nouvel article</option>
                                </select>
                                </div>

                            @else

                                <div>
                                    <label for="nomArticle">Nom de l'article</label>
                                    <input type="text" class="@error('nom') is-invalid @enderror" name="nom"
                                        id="nom">

                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- champs qui sera entré automatiquement suite à la sélection dans le menu déroulant (lien avec un article) --}}
                                <div>
                                    <label for="typeArticle">Type de l'article</label>
                                    <select class="@error('type') is-invalid @enderror" name="type" id="type">

                                        <option value="Chandail">Chandail</option>

                                        <option value="Kangourou">Kangourou</option>

                                        <option value="Accessoire">Accessoire</option>

                                    </select>

                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- champs qui sera entré automatiquement suite à la sélection dans le menu déroulant (lien avec un article) --}}
                                <div>
                                    <label for="descriptionArticle">Description</label>
                                    <textarea class="@error('description') is-invalid @enderror" name="description" class="description" id="description"></textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                        </div>

                        @endif

                        {{-- champs entré manuellement par l'admin pour ajouter une image sur l'article campagne --}}
                        <div>
                            <label for="imageArticleCampagne">Image de l'article</label>
                            <input type="file" class="@error('image') is-invalid @enderror" name="image"
                                id="image">
                                

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- nouveau champs pour créer un article campagne --}}
                        <div>
                            <label for="prixArticle">Prix</label>
                            <input type="number" class="@error('prix') is-invalid @enderror" name="prix" id="prix"
                                min="0">
                                
                            @error('prix')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- affichage pour rendre les couleurs de l'article campagne disponible --}}
                        <div>
                            @if (count($couleurs))
                                <label for="couleurArticle">Couleur</label>
                                <select name="couleur_id" id="couleur">
                                    @foreach ($couleurs as $couleur)
                                        <option value="{{ $couleur->id }}">{{ $couleur->nom_couleur }}</option>
                                    @endforeach
                                </select>
                            @else
                                <h2>Il n'y a aucune couleur</h2>
                            @endif
                        </div>

                        {{-- affichage pour rendre les tailles de l'article campagne disponible --}}
                        <div>
                            @if (count($tailles))
                                <label for="tailleArticle">Taille</label>
                                <select name="taille_id" id="taille">
                                    @foreach ($tailles as $taille)
                                        <option value="{{ $taille->id }}">{{ $taille->format }}</option>
                                    @endforeach
                                </select>
                            @else
                                <h2>Il n'y a aucune taille</h2>
                            @endif
                        </div>

                        {{-- nouveau champs pour créer un article campagne --}}
                        <div>
                            <label for="qteArticle">Quantité disponible</label>
                            <input type="number" class="@error('quantite_max') is-invalid @enderror" name="quantite_max"
                                id="quantite_max" min="0" placeholder="Valeur par défaut est 5">

                            @error('quantite_max')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex__center margin__top">
                <button class="btn bg__orange color__white" type="submit">Ajouter un article à la campagne</button>
            </div>
        </div>

    </form>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleCampagneRequest') !!}


@endsection
