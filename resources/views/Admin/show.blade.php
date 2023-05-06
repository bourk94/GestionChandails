@extends('layouts.app')
@section('contenu')

    <div class="padding center">

        <h2 class="center">
            Campagne
            @if (count($campagnes->where('statut', 'en cours')) > 0)
                )

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

        <div class="w3-content w3-padding" style="max-width:1564px">
            <div class="w3-row-padding">
                @if (count($articles))
                    @foreach ($articles->unique('article_id') as $article)
                        <div class="w3-col l3 m6 w3-margin-bottom">
                            <div class="w3-panel w3-border w3-round-large">
                                <br>
                                <img src="/img/chandails/Exemple_Chandail_1.jpg" alt="John" style="width:100%">
                                <h3>{{ $article->nom }}</h3>
                                <p>Prix : {{ $article->prix }} $</p>
                                <p>Description : {{ $article->description }}</p>
                                <div class="w3-row-padding">
                                    @foreach ($couleurs->where('article_id', 'like', $article->article_id) as $couleur)
                                        <label class="{{ $couleur->nom_couleur }}">
                                            <input type="radio" name="color" value="{{ $couleur->nom_couleur }}"
                                                class="radNone">
                                            <div class="button"><span></span></div>
                                        </label>
                                    @endforeach
                                </div>
                                <div class="w3-row-padding">
                                    @foreach ($tailles->where('article_id', 'like', $article->article_id) as $taille)
                                        <label>
                                            <input type="radio" name="size" value="{{ $taille->format }}"
                                                class="radNone">
                                            <div class="button"><span class="w3-text-black">{{ $taille->format }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                <a href="#" class="a_decoration_none"><button
                                        class="w3-button w3-block w3-hover-red btnColor"
                                        type="button">Modifier</button></a>

                                <br>

                                <form method="POST" action="{{ route('articles.destroy', [$article->article_id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Êtes-vous certain de vouloir supprimer l\'article {{ $article->nom }} ?')"
                                        class="w3-button w3-block w3-black w3-hover-red">Supprimer</button>
                                </form>
                                <br>
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
        </div>
    </div>

    <script>
        var couleurs = document.createElement('style');
        couleurs.innerHTML =
            `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
        document.head.appendChild(couleurs);
    </script>

@endsection
