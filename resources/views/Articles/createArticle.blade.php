@extends('layouts.app')

@section('title', 'Créer un article')
@section('contenu')

    <form id="my-form" action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <!--les champs entrés manuellement par l'admin-->
                        <!--nom, type, description, prix-->
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

                        <div>
                            <label for="prixArticle">Prix</label>
                            <input type="number" class="@error('prix') is-invalid @enderror" name="prix" id="prix" min="0">

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
            <button class="btn bg__orange color__white" type="submit">Ajouter un article</button>
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
    </script>         -->

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}


@endsection
