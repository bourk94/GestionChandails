@extends('layouts.app')

@section('title', 'Ajouter une couleur')
@section('contenu')

    <form id="form_couleur" action="{{ route('couleurs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Ajouter une couleur</h2>                        
                        <div>
                            <label for="nomCouleur">Nom de la couleur</label>
                            <input type="text" name="nom_couleur" id="nom_couleur">

                            @error('nom_couleur')
                                <span class="text-danger">{{ $messages }}</span>
                            @enderror

                        </div>
                        <div>
                            <label for="codeCouleur">Code de la couleur</label>
                            <input type="text" name="code_couleur" id="code_couleur" placeholder="Ex: FFFFFF">            

                            @error('code_couleur')
                                <span class="text-danger">{{ $messages }}</span>
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
            <button class="btn bg__orange color__white" type="submit">Ajouter une couleur</button>
        </div>

    </form>

    <!--Form pour l'ajout d'une taille-->
    <form id="form_taille" action="{{ route('tailles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Ajouter une taille</h2>                        
                        <div>
                            <label for="nomCouleur">Nom de la couleur</label>
                            <input type="text" name="nom_couleur" id="nom_couleur">

                            @error('nom_couleur')
                                <span class="text-danger">{{ $messages }}</span>
                            @enderror

                        </div>
                        <div>
                            <label for="codeCouleur">Code de la couleur</label>
                            <input type="text" name="code_couleur" id="code_couleur" placeholder="Ex: FFFFFF">            

                            @error('code_couleur')
                                <span class="text-danger">{{ $messages }}</span>
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
            <button class="btn bg__orange color__white" type="submit">Ajouter une couleur</button>
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
