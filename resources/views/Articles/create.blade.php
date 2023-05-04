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

                        {{-- menu déroulant pour afficher les articles (template disponible dans la table Article) --}}
                        <div>
                        <label for="listeArticle">Choisir un article</label>
                            <select  name="nom" id="nom">
                                @if(count($articles))
                                {{-- boucler avec un foreach (afficher tous les articles) --}}
                                @foreach($articles as $article)
                                    <option value="nomArticle" >{{ $article->nom }}</option>  
                                @endforeach
                                @else
                                    <h2>Il n'y a aucun article</h2>
                                @endif                             
                            </select>
                        </div>

                        {{-- champs entré manuellement par l'admin pour ajouter une image sur l'article campagne --}}         
                        <div>                            
                            <label for="imageArticleCampagne">Image de l'article</label>
                            <input type="file" class="@error('nom') is-invalid @enderror" name="nom" id="nom">

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>  

                        {{-- champs qui sera entré automatiquement suite à la sélection dans le menu déroulant (lien avec un article) --}}
                        <div>
                            <label for="nomArticle">Nom de l'article</label>
                            <input type="text" class="@error('nom') is-invalid @enderror" name="nom" id="nom">

                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- champs qui sera entré automatiquement suite à la sélection dans le menu déroulant (lien avec un article) --}}
                        <div>
                            <label for="typeArticle">Type de l'article</label>
                            <select class="@error('type') is-invalid @enderror" name="type" id="type">
                                
                                <option value="Chandail" >Chandail</option>

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

                        {{-- nouveau champs pour créer un article campagne --}}
                        <div>
                            <label for="prixArticle">Prix</label>
                            <input type="number" class="@error('prix') is-invalid @enderror" name="prix" id="prix" min="0">

                            @error('prix')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- affichage pour rendre les couleurs de l'article campagne disponible --}}
                        <div>
                            @if(count($couleurs))
                                @foreach($couleurs as $couleur)
                                    <input type="checkbox" name="color" value="{{ $couleur->nom_couleur }}" class="radNone">
                                    <div class="button"><span></span></div>
                                @endforeach 
                            @else
                                <h2>Il n'y a aucune couleur</h2>
                            @endif
                        </div>

                        {{-- affichage pour rendre les tailles de l'article campagne disponible --}}
                        <div>
                            @if(count($tailles))
                                @foreach($tailles as $taille)
                                    <input type="checkbox" name="color" value="{{ $taille->format }}" class="radNone">
                                    <div class="button"><span></span></div>
                                @endforeach 
                            @else
                                <h2>Il n'y a aucune taille</h2>
                            @endif
                        </div>

                        {{-- nouveau champs pour créer un article campagne --}}
                        <div>
                            <label for="qteArticle">Quantité disponible</label>
                            <input type="number" class="@error('quantite_max') is-invalid @enderror" name="quantite_max" id="quantite_max" min="0">

                            @error('quantite_max')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Ajouter un article à la campagne</button>
        </div>
    </form>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleCampagneRequest') !!}


@endsection
