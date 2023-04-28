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
                        {{-- <p>Nombre de {{ $article->nom }} que vous pouvez commander: {{ $article->quantite }}</p> --}}
                    </div>

                    <!-- Section choix de couleurs -->
                    <div class="rightObjets">

                        <!-- affichage simple-->
                        <label class="{{ $article->nom_couleur }}">
                            <input type="radio" name="{{ $article->nom }}color" value="{{ $article->couleur_id }}"
                                class="radNone">
                            <div class="button"><span></span></div>

                        </label>

                        <!-- Affichage multiple -->

                        {{-- @if (count($couleurs))
                            @foreach ($article->couleurs as $couleur)
                                <label class="{{ $couleur->nom_couleur }}">
                                    <input type="radio" name="color" value="{{ $couleur->nom_couleur }}"
                                        class="radNone">
                                    <div class="button"><span></span></div>
                                </label>
                            @endforeach
                        @endif --}}



                    </div>

                    <!-- Section choix de taille -->
                    <div class="rightObjets">
                        <!-- affichage simple-->
                        <label>
                            <input type="radio" name="{{ $article->nom }}size" value="{{ $article->taille_id }}"
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
                        @if (Auth::check())
                            <a href="#" class="buttonSite">Ajouter au panier</a>
                        @else
                            <button id="btnModalLogin" class="buttonSite">Ajouter au panier</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucun article</p>
        @endif


        <!-- Script qui fait apparaitre un modal -->
        <div id="modalLogin" class="modal">
            <section class="modal-content">
                <div class=" card__padding">
                    <div class="card__container">
                        <div class="flex__center">
                            <h1>Connexion</h1>
                            <div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <label for="email" class="form-label">Adresse courriel</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required>
                                    </div>
                                    <div>
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="flex__center">
                                        <a class="hover__orange color__white" href="{{ route('usagers.create') }}">Créer un
                                            compte</a>
                                    </div>
                                    <div class="flex__center">
                                        <div class="flex__inline margin__top">
                                            <button class="btn bg__orange color__white" type="submit">Connexion</button>
                                            <a href="/forgot-password"><button
                                                    class="btn bg__orange color__white margin__top" type="button">Mot de
                                                    passe oublié</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            //Mettre dans un .JS
            var modalLogin = document.getElementById("modalLogin");
            var btnModalLogin = document.getElementById("btnModalLogin");
            var span = document.getElementsByClassName(" close")[0];
            btnModalLogin.onclick = function() {
                modalLogin.style.display = "block";
            }
            span.onclick = function() {
                modalLogin.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modalLogin) {
                    modalLogin.style.display = "none";
                }
            }
        </script>


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
    <script>
        var couleurs = document.createElement('style');
        couleurs.innerHTML =
            `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
        document.head.appendChild(couleurs);
    </script>
@endsection
