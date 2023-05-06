@extends('layouts.app')
@section('contenu')

    <h2 class="center">Page admin</h2>

    <div class="padding">
        <!-- Section informations de la campagne -->
        <h2 class="center">
            Campagne
            @if (count($campagnes->where('statut', 'en cours')) > 0))
            
            @foreach ($campagnes->where('statut', 'en cours') as $campagne)
                
                    {{ $campagne->nom_campagne }}
                    [{{ $campagne->statut }}]
                    <br>
                    Est en : {{ $campagne->progression }}
                    <br>
                    du {{ $campagne->date_debut_campagne }} au {{ $campagne->date_fin_campagne }}

                    <!-- Section qui permet de modifier l'état de campagne -->
                    <form method="POST" action="{{-- route('campagnes.update', [$campagne->campagne_id]) --}}">
                        @csrf
                        @method('PATCH')
                        <div class="flex__center">
                            <div class="flex__inline">
                                <label for="statut">Statut</label>
                                <select name="statut" id="statut">
                                    <option value="en cours">En cours</option>
                                    <option value="terminé">Terminé</option>
                                </select>
                            </div>
                            <div class="flex__inline">
                                <button type="submit" class="buttonSite">Modifier</button>
                            </div>
                        </div>
                    </form>

                    <!-- Section qui permet de modifier la progression de la camapgne -->
                    <form method="POST" action="{{-- route('campagnes.update', [$campagne->campagne_id]) --}}">
                        @csrf
                        @method('PATCH')
                        <div class="flex__center">
                            <div class="flex__inline">
                                <label for="progression">Progression</label>
                                <select name="progression" id="progression">
                                    <option value="intention">intention</option>
                                    <option value="paiement">paiement</option>
                                    <option value="collecte">collecte</option>
                                </select>
                            </div>
                            <div class="flex__inline">
                                <button type="submit" class="buttonSite">Modifier</button>
                            </div>
                        </div>
                    </form>
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
                        <p>Prix estimé:{{ $article->prix }} $</p>
                        <p>Nombre de {{ $article->nom }} que vous pouvez commander: {{ $article->quantite }}</p>
                    </div>

                    <!-- Section choix de couleurs -->
                    <div class="rightObjets">
                        @foreach ($couleurs->where('article_id', 'like', $article->article_id) as $couleur)
                            <label class="{{ $couleur->nom_couleur }}">
                                <input type="radio" name="color" value="{{ $couleur->nom_couleur }}" class="radNone">
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
                                    <input type="radio" name="size" value="{{ $taille->format }}" class="radNone">
                                    <div class="button"><span>{{ $taille->format }}</span></div>
                                </label>
                            @endforeach
                        @endif
                    </div>

                    <div class="rightObjets">
                        <form method="POST" action="{{ route('articles.destroy', [$article->article_id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Êtes-vous certain de vouloir supprimer l\'article {{ $article->nom }} ?')"
                                class="buttonSite">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucun article</p>
        @endif

    
        @endforeach

        @else
            <p>Aucune campagne en cours</p>
        @endif
    </div>



    <script>
        var couleurs = document.createElement('style');
        couleurs.innerHTML =
            `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
        document.head.appendChild(couleurs);
    </script>

@endsection
