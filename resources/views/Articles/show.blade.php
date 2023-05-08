@extends('layouts.app')
@section('contenu')

    <!-- <div class="row"> -->
    <div class="padding">
        <!-- Section informations sur un article de la campagne -->
        <h2 class="center">Article {{ $article->nom }}</h2>
        <!-- Section qui affiche les articles disponibles dans la campagne avec les couleurs et les tailles -->    
        @if (count($articles))            
            {{-- @foreach ($articles as $article) --}}
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
                        <p>Prix estimé:{{ $article->prix }} $</p>
                        <p>Nombre de {{ $article->nom }} que vous pouvez commander: {{ $article->quantite }}</p>
                    </div>

                    <!-- Section pour affichage et choix de la couleur -->
                    <div class="rightObjets">

                        @foreach ($couleurs->where('article_id', 'like', $article->article_id) as $couleur)
                            <label class="{{ $couleur->nom_couleur }}">
                                <input type="radio" name="color" value="{{ $couleur->nom_couleur }}" class="radNone">
                                <div class="button"><span></span></div>
                            </label>
                        @endforeach

                    </div>

                    <!-- Section pour affichage et choix de la taille -->
                    <div class="rightObjets">
                        <!-- Affichage multiple-->
                        @if (count($tailles))
                            @foreach ($tailles->where('article_id', 'like', $article->article_id) as $taille)
                                <label>
                                    <input type="radio" name="size" value="{{ $taille->format }}" class="radNone">
                                    <div class="button"><span>{{ $taille->format }}</span></div>
                                </label>
                            @endforeach
                        @endif
                    </div>
                    <div>

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
            var couleurs = document.createElement('style');
            couleurs.innerHTML =
                `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
            document.head.appendChild(couleurs);
        </script>

    @endsection
