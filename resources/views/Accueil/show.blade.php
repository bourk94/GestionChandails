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
                @if ($article->quantite > 0)
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
                            {{-- <label class="{{ $article->nom_couleur }}">
                            <input type="radio" name="{{ $article->nom }}color" value="{{ $article->nom_couleur }}"
                                class="radNone">
                            <div class="button"><span></span></div>
                        </label> --}}

                            <!-- Affichage multiple -->



                            @foreach ($couleurs->where('article_id', 'like', $article->article_id) as $couleur)
                                <label class="{{ $couleur->nom_couleur }}">
                                    <input type="radio" name="color" value="{{ $couleur->nom_couleur }}"
                                        class="radNone">
                                    <div class="button"><span></span></div>
                                </label>
                            @endforeach


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
                                <input type="radio" name="{{ $article->nom }}size" value="{{ $article->format }}"
                                    class="radNone">
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



                            {{-- non-fonctionnel <label>
                            <button id="gestion{{ $article->nom }}addition">+</button>
                            <span id="{{ $article->nom }}input">0</span>
                            <button id="gestion{{ $article->nom }}soustraction">-</button>
                        </label> --}}

                            <!-- JavaScript  qui limite la quantité d'un article dans plusieurs inputs-->


                        </div>
                        <div class="rightObjets">
                            <a href="#" class="buttonSite">Ajouter au panier</a>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p>Aucun article</p>
        @endif
        {{-- non fonctionnel
            <script>
            let inputkangourou = document.getElementById("kangourousinput");
            let addition = document.getElementById("gestionkangourousaddition");
            let soustraction = document.getElementById("gestionkangouroussoustraction");
            let valeur = 0;
            const max = {{ $article->quantite }};
            const min = 0;

            addition.addEventListener("click", function() {
                if (valeur >= max) {
                    valeur = max;
                    
                } else {
                    valeur++;
                    inputkangourou.textContent = valeur;
                }
            });

            soustraction.addEventListener("click", function() {
                if (valeur <= min) {
                    valeur = 0; 
                } else {
                       valeur--;
                    inputkangourou.textContent = valeur;
                }

            });
        </script> --}}

    </div>
@endsection
