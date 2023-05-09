@extends('layouts.app')

@section('title', "modification/suppression d'un article")
@section('contenu')


    <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

        <h1 class="center">Modifier un article</h1>

        <form class="w3-container" method="POST" action="{{ route('articles.update', [$article->id]) }}">
            @csrf
            @method('PATCH')

            <div class="w3-section">
                <label for="nomArticle">Nouveau nom d'article :</label>
                <input type="text"
                    class="@error('description') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                    style="width:100%;" name="nom" id="nom" value="{{ old('nom', $article->nom) }}">

                @error('nom')
                    <span class="text-danger">{{ $messsage }}</span>
                @enderror
            </div>

            <div class="w3-section">
                <label for="typeArticle">Nouveau type d'article :</label>
                <select class="@error('description') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                    style="width:100%;" name="type" id="type" value="{{ old('type', $article->type) }}">

                    <option value="Chandail">Chandail</option>

                    <option value="Kangourou">Kangourou</option>

                    <option value="Accessoire">Accessoire</option>

                </select>
                @error('type')
                    <span class="text-danger">{{ $messsage }}</span>
                @enderror
            </div>

            <div class="w3-section">
                <label for="descriptionArticle">Nouvelle description :</label>
                <textarea class="@error('description') is-invalid @enderror  w3-input w3-border w3-hover-border-black"
                    style="width:100%;" name="description" class="description" id="description"
                    value="{{ old('description', $article->description) }}"></textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <br>

            <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Modifier un article</button>
        </form>

        <br>

        <form class="w3-container" method="POST" action="{{ route('articles.destroy', [$article->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Êtes-vous certain de vouloir supprimer l''article {{ $article->nom }} ?')"
                class="w3-button w3-block w3-black w3-hover-red">Supprimer</button>
        </form>

        <br>

        <div class="center">
            <a href="{{ route('accueil') }}">Retour</a>
        </div>
    </div>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}
    

@endsection
