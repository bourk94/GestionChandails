@extends('layouts.app')

@section('title', 'Créer un article')
@section('contenu')

    <form id="my-form" action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Créer un article</h2>
                        <div>                            
                            <label for="imageArticle">image de l'article</label>
                            <input type="file" class="form-control @error('name') is-invalid @enderror" class="form-control-file" id="imageArticle" name="imageArticle">
                        </div>
                        <div>
                            <label for="nomArticle">Nom de l'article</label>
                            <input type="text" name="nomArticle" id="nomArticle">

                            @error('name')
                                <span class="text-danger">{{ $messsages }}</span>
                            @enderror

                        </div>
                        <div>
                            <label for="typeArticle">type de l'article</label> 
                                <div>
                                    <input type="checkbox" name="article1" id="article1">
                                    <label for="article1">Chandail</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="article2" id="article2">
                                    <label for="article2">Kangourou</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="article3" id="article3">
                                    <label for="article3">Accessoire</label>
                                </div>

                                <!--UN TYPE DOIT ÊTRE SÉLECTIONNÉ-->
                                <!--EST CE QUE C'EST GÉRÉ POUR CHAQUE INPUT OU UNE FOIS POUR LA SÉLECTION-->
                                <!--
                                     @error('name')
                                        <span class="text-danger">{{ $messsages }}</span>
                                    @enderror 
                                -->
                        </div>

                        <!--EST CE QUE L'ON GÈRE LES COULEURS À PARTIR D'ICI ???-->
                        <!-- 
                            <div>
                                <label for="nomCouleur">Couleur</label>
                            </div>
                         -->

                    </div>
                </div>
            </div>
        </div>
        <!-- 
            <template id="my-template">
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
            </template>
         -->
    </form>

        <div class="flex__center" id="btnAjouter">
            <button class="btn bg__orange color__white" id="add-button" type="button">Ajouter un article</button>
        </div>

        <!--SCRIPTS DE VALIDATION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script src="{{asset('js/jsvalidation.js')}}"></script>

        {!! JsValidator::formRequest('App\Http\Requests\FilmRequest')!!}


@endsection
