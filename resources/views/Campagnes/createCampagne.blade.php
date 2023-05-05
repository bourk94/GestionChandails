@extends('layouts.app')

@section('title', 'Créer une campagne')
@section('contenu')

    <form id="my-form" action="{{ route('campagnes.store') }}" method="POST">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Créer une campagne</h2>
                        <div>
                            <label for="nom">Nom de la campagne</label>
                            <input type="text" name="nom" id="nom">
                        </div>
                        <div>
                            <label for="dateDebut">Date de début</label>
                            <input type="date" name="dateDebut" id="dateDebut">
                        </div>
                        <div>
                            <label for="dateFin">Date de fin</label>
                            <input type="date" name="dateFin" id="dateFin">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>

            <div class="card__padding">
                <div class="card__container">
                    @if (count($articles) > 0)
                        <div class="flex__center">
                            <label for="articlesprefait">Articles préfait</label>
                            <div>
                                @foreach ($articles as $article)
                                    <input type="checkbox" name="article" id="article" value="{{ $article->id }}">
                                    <label for="article">{{ $article->nom }}</label>
                                @endforeach
                            </div>
                        @else
                            <p>Vous n'avez pas d'articles</p>
                            <a href="{{ route('articles.create') }}"class="btn bg__orange color__white"
                                id="add-article">Créer un article</a>
                    @endif
                    <a href="{{ route('articles.create') }}"class="btn bg__orange color__white" id="add-article">Créer un
                        article</a>
                </div>
            </div>
        </div>
        </div>


        <div class="flex__center margin__top" id="btnAjouter">
            <button class="btn bg__orange color__white" id="add-article" type="submit">Créer la campagne</button>
        </div>
    </form>
    {{-- à gérer plus tard
     
    <div id="div-cible"></div>

    <template id="my-template">
        <form id="article-form" action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card__padding">

                <div class="card__container">

                    <div class="flex__center">

                        <div>
                            <h2>Créer un article</h2>

                            <div>

                                <label for="imageArticle">image de l'article</label>

                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    class="form-control-file" id="image" name="image">
                            </div>

                            <div>

                                <label for="nomArticle">Nom de l'article</label>

                                <input type="text" name="nom" id="nom">

                                @error('nom')
                                    <span class="text-danger">{{ $messsages }}</span>
                                @enderror


                            </div>

                            <div>

                                <label for="typeArticle">type de l'article</label>

                                <select name="type" id="type">

                                    <option value="Chandail">Chandail</option>

                                    <option value="Kangourou">Kangourou</option>

                                    <option value="Accessoire">Accessoire</option>

                                </select>

                                @error('type')
                                    <span class="text-danger">{{ $messsages }}</span>
                                @enderror

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
            <div class="flex__center margin__top" id="btnAjouterArticle">
                <button class="btn bg__orange color__white" id="add-button" type="button">Ajouter un article</button>
            </div>
        </form>
    </template>

    <script>
        document.getElementById('add-article').addEventListener('click', function(event) {
            var
                template = document.getElementById('my-template'),
                form = document.getElementById('div-cible'),
                clone = document.importNode(template.content, true);


            form.appendChild(clone);
        }, false);

        var event = new Event('click');
        document.getElementById('add-article').dispatchEvent(event);
    </script> --}}



@endsection
