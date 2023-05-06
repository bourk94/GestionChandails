@extends('layouts.app')

@section('title', "modification/suppression d'un article")
@section('contenu')

    <form method="POST" action="{{ route('articles.update', [$article->id]) }}">
        @csrf
        @method('PATCH')
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <!--les champs que l'admin peut modifier-->
                        <!--nom, type, description, prix-->
                        <h2>Modifier un article</h2>
                        <div>
                            <label for="nomArticle">Nouveau nom d'article :</label>
                            <input type="text" class="@error('description') is-invalid @enderror" name="nom"
                                id="nom" value="{{ old('nom', $article->nom) }}">

                            @error('nom')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="typeArticle">Nouveau type d'article :</label>
                            <select class="@error('description') is-invalid @enderror" name="type" id="type"
                                value="{{ old('type', $article->type) }}">

                                <option value="Chandail">Chandail</option>

                                <option value="Kangourou">Kangourou</option>

                                <option value="Accessoire">Accessoire</option>

                            </select>
                            @error('type')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="descriptionArticle">Nouvelle description :</label>
                            <textarea class="@error('description') is-invalid @enderror" name="description" class="description" id="description"
                                value="{{ old('description', $article->description) }}"></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Modifier un article</button>
        </div>
    </form>


    <!--Formulaire de suppression d'un article-->

    <form method="POST" action="{{ route('articles.destroy', [$article->id]) }}">
        @csrf
        @method('DELETE')
        <div class="center">
            <button type="submit"
                onclick="return confirm('Êtes-vous certain de vouloir supprimer l''article {{ $article->nom }} ?')"
                class="buttonSite">Supprimer
            </button>
        </div>
    </form>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}


@endsection
