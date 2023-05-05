@extends('layouts.app')

@section('title', 'Créer un article')
@section('contenu')

    <form id="my-form" action="{{ route('articles.storeArticle') }}" method="POST">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <!--les champs entrés manuellement par l'admin-->
                        <!--nom, type, description-->
                        <h2>Créer un article</h2>                        
                        <div>
                            <label for="nomArticle">Nom de l'article</label>
                            <input type="text" class="@error('nom') is-invalid @enderror" name="nom" id="nom">

                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
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

                        <div>
                            <label for="descriptionArticle">Description</label>
                            <textarea class="@error('description') is-invalid @enderror" name="description" class="description" id="description"></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Ajouter un article</button>
        </div>
    </form>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleCampagneRequest') !!}


@endsection
