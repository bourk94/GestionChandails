@extends('layouts.app')

@section('title', 'modification/suppression d''une taille')
@section('contenu')

    <form id="my-form" method="PATCH" action="{{ route('tailles.update'), [$taille->id]) }}">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Modifier une taille</h2>
                        <div>
                            <label for="formatTaille">Nouveau format</label>
                            <input type="text" class="@error('code_couleur') is-invalid @enderror" id="format" name="format" value="{{ old('format', $taille->format) }}">

                            @error('format')
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
            <button class="btn bg__orange color__white" type="submit">Modifier une taille</button>
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

    <!--Formulaire de suppression d'une taille-->

    <form method="POST" action="{{ route('tailles.destroy', [$taille->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer une taille</button>
    </form>


    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}


@endsection
