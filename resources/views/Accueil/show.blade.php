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

        </h2>
        
        <!-- Section qui affiche les articles disponibles dans la campagne avec les couleurs et les tailles -->
        @if (count($articles))   
            @foreach ($articles->unique('article_id') as $article)
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                            <input type="hidden" name="article_id" value="{{ $article->article_id }}">
                        </div>

                        @foreach ($couleurs->where('article_id', 'like', $article->article_id) as $couleur)
                            <label class="{{ $couleur->nom_couleur }}">
                                <input type="radio" name="couleur_id" value="{{ $couleur->couleur_id }}" class="radNone" >
                                <div class="button"><span></span></div>
                            </label>
                        @endforeach

                    </div>

                    <!-- Section choix de taille -->
                    <div class="rightObjets">
                        <!-- Affichage multiple-->
                        @if (count($tailles))
                            @foreach ($tailles->where('article_id', 'like', $article->article_id) as $taille)
                                <label>
                                    <input type="radio" name="taille_id" value="{{ $taille->taille_id }}" class="radNone" required>
                                    <div class="button"><span>{{ $taille->format }}</span></div>
                                </label>
                            @endforeach
                        @endif
                    </div>
                    <div class="rightObjets">
                        @livewire('counter', ['idarticle' => $article->article_id])
                    </div>
                    <div class="rightObjets">
                        @if (Auth::check())
                        <button type="submit" class="buttonSite">Ajouter au panier</a>
                        @else
                            <button id="btnModalLogin" class="buttonSite">Ajouter au panier</a>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="id" value="0">
                <input type="hidden" name="article_id" value="{{ $article->article_id }}">
                <input type="hidden" name="name" value="{{ $article->nom }}">
                <input type="hidden" value="{{ $article->prix }}" name="price">
                <input type="hidden" value="{{ $article->image }}"  name="image">
                <input type="hidden" name="campagne_id" value="{{ $campagne->id }}">
           
            </form>    
            @endforeach  
        @else
            <p>Aucun article</p>
        @endif
        
        @endif
        @endforeach

         @endif
                @endforeach
        
    <script>
        var couleurs = document.createElement('style');
        couleurs.innerHTML =
            `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
        document.head.appendChild(couleurs);
    </script>
   
    @endsection
