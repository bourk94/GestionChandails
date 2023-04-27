@extends('layouts.app')
@section('contenu')
    <!-- <div class="row"> -->
    <div class="padding">
        <!-- Section informations de la campagne -->
        <h2 class="center">
            Campagne
            @foreach ($campagnes as $campagne)
                @if ($campagne->statut == 'en cours')
                    {{ $campagne->nom_campagne }}
                    [{{ $campagne->statut }}]
                    <br>
                    Est en : {{ $campagne->progression }}
                    <br>
                    du {{ $campagne->date_debut_campagne }} au {{ $campagne->date_fin_campagne }}
                @endif
            @endforeach
        </h2>
        <!-- Section qui affiche les articles disponibles dans la campagne avec les couleurs et les tailles -->
        @if (count($articles))
            @foreach ($articles as $article)
                <div class="bckgroundObjets ">
                    <div class="leftObjets">
                        @if ($article->image == 'null')
                            <div class="zoneImageVide"></div>
                        @else
                            <img src="{{ asset("img/$article->type/$article->image") }}" alt="Image de l'article">
                        @endif
                    </div>
                    <div class="rightObjets">
                        <h2>{{ $article->nom }}</h2>
                        <p>Description:{{ $article->description }}</p>
                        <p>Estimé de prix:{{ $article->prix }} $</p>
                        <p>Nombre de {{ $article->nom }} que vous pouvez commander: {{ $article->quantite }}</p>
                    </div>

                    <!-- Section choix de couleurs -->
                    <div class="rightObjets">

                        <!-- affichage simple-->
                        <label class="{{ $article->nom_couleur }}">
                            <input type="radio" name="color" value="{{ $article->nom_couleur }}" class="radNone">
                            <div class="button"><span></span></div>
                        </label>

                        <!-- Affichage multiple -->

                        {{-- @if (count($couleurs))
                            @foreach ($couleurs as $couleur)
                                <label class="{{ $couleur->nom_couleur }}">
                                    <input type="radio" name="color" value="{{ $couleur->nom_couleur }}"
                                        class="radNone">
                                    <div class="button"><span></span></div>
                                </label>
                            @endforeach
                        @endif --}}

                        <script>
                            var couleurs = document.createElement('style');
                            couleurs.innerHTML =
                                `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
                            document.head.appendChild(couleurs);
                        </script>
                    </div>

                    <!-- Section choix de taille -->
                    <div class="rightObjets">
                        <!-- affichage simple-->
                        <label>
                            <input type="radio" name="size" value="{{ $article->format }}" class="radNone">
                            <div class="button"><span>{{ $article->format }}</span></div>
                        </label>

                        <!-- Affichage multiple-->
                        {{-- @if (count($tailles))
                            @foreach ($tailles as $taille)
                                <label>
                                    <input type="radio" name="size" value="{{ $taille->format }}" class="radNone">
                                    <div class="button"><span>{{ $taille->format }}</span></div>
                                </label>
                            @endforeach
                        @endif --}}
                    </div>
                    <div>
                        <!-- JavaScript pour compter le nombre d'article et vérifier si la quantité maximale est atteinte selon l'id de l'article -->
                        
                        <label>
                            <input type="number" max="{{ $article->quantite }}" min="1" value="0">
                        </label>
                    </div>
                    <div class="rightObjets">
                        <a href="#" class="buttonSite">Ajouter au panier</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucun article</p>
        @endif








    </div>
@endsection
