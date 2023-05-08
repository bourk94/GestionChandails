@extends('layouts.app')

@section('title', 'Créer un article')
@section('contenu')


<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
        
    <h1 class="center">Créer un article</h1>

    <form class="w3-container" action="{{ route('articles.storeArticle') }}" method="POST">
    @csrf

        <div class="w3-section">
            <label for="nomArticle">Nom de l'article :</label>
            <input class="@error('nom') is-invalid @enderror w3-input w3-border w3-hover-border-black" type="text" name="nom" id="nom">
            @error('nom')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <br>
            <label for="typeArticle">Type de l'article :</label>
            <select class="@error('type') is-invalid @enderror w3-input w3-border w3-hover-border-black" name="type" id="type">
                <option value="chandails">Chandail</option>
                <option value="kangourou">Kangourou</option>
                <option value="accessoire">Accessoire</option>
            </select>
            @error('type')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <br>
            <br>

            <label for="descriptionArticle">Description :</label>
            <textarea class="@error('description') is-invalid @enderror w3-input w3-border w3-hover-border-black" name="description" class="description" id="description"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Ajouter un article</button>
    </form>

    <br>
        
    <div class="center">
        <a href="{{ route('usagers.login') }}">Retour</a>
    </div>
</div>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}


@endsection
