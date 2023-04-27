@extends('layouts.app')

@section('title', 'modification/suppression d''un article')
@section('contenu')

    <form id="my-form" method="PATCH" action="{{ route('articles.update'), [$article->id]) }}">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <!--les champs que l'admin peut modifier-->
                        <!--nom, type, description, prix-->
                        <h2>Modifier un article</h2>                        
                        <div>
                            <label for="nomArticle">Nouveau nom d'article</label>
                            <input type="text" class="@error('description') is-invalid @enderror" name="nom" id="nom" value="{{ old('nom', $article->nom) }}">

                            @error('nom')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="typeArticle">Nouveau type d'article</label>
                            <select class="@error('description') is-invalid @enderror" name="type" id="type" value="{{ old('type', $article->type) }}">

                                <option value="Chandail">Chandail</option>

                                <option value="Kangourou">Kangourou</option>

                                <option value="Accessoire">Accessoire</option>
                                
                            </select>


                            @error('type')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror

                        </div>

                        <div>
                            <label for="descriptionArticle">Nouvelle description</label>
                            <textarea class="@error('description') is-invalid @enderror" name="description" class="description" id="description" value="{{ old('description', $article->description) }}"></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div>
                            <label for="prixArticle">Nouveau prix</label>
                            <input type="number" class="@error('prix') is-invalid @enderror" name="prix" id="prix" min="0" value="{{ old('prix', $article->prix)  }}">

                            @error('prix')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        

                    </div>
                </div>
            </div>
        </div>

        <!-- <template id="my-template">
                    <div class="card__padding">
                        <div class="card__container">
                            <div class="flex__center">
                                <div>
                                    <label for="nomArticle">Nom de l'article</label>
                                    <input name="nomArticle" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </template> -->

        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Modifier un article</button>
        </div>

    </form>

    <!--SCRIPT POUR LA FONCTION DU BOUTON-->

    <!-- <script>
        document.getElementById('add-button').addEventListener('click', function(event) {
            var form = document.getElementById('my-form'),
                //template = document.getElementById('my-template'),
                clone = document.importNode(form.content, true);


            form.appendChild(clone);
        }, false);

        var event = new Event('click');
        document.getElementById('add-button').dispatchEvent(event);
    </script> -->

    <!--Formulaire de suppression d'article-->

    <form method="POST" action="{{ route('articles.destroy', [$article->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer un article</button>
    </form>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}


@endsection
