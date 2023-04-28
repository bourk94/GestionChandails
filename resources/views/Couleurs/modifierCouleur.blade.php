@extends('layouts.app')

@section('title', "modification/suppression d''une couleur")
@section('contenu')

    <form id="my-form" method="PATCH" action="{{ route('couleurs.update'), [$couleur->id] }}">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Modifier une couleur</h2>
                        <div>
                            <label for="nomCouleur">Nouveau nom de couleur</label>
                            <input type="text" class="@error('nom_couleur') is-invalid @enderror" id="nom_couleur" name="nom_couleur" value="{{ old('nom_couleur', $couleur->nom_couleur) }}">

                            @error('nom_couleur')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="nomArticle">Nouvelle couleur</label>
                            <input type="color" class="@error('nom_couleur') is-invalid @enderror" name="code_couleur" id="code_couleur" value="{{ old('code_couleur', $couleur->code_couleur) }}">

                            @error('code_couleur')
                                <span class="text-danger">{{ $messsage }}</span>
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
            <button class="btn bg__orange color__white" type="submit">Modifier une couleur</button>
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

    <!--Formulaire de suppression d'une couleur-->

    <form method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer une couleur</button>
    </form>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}


@endsection
