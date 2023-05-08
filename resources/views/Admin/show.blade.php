@extends('layouts.app')
@section('contenu')

    <div class="padding center">

        <br>

        @if (count($campagnes->where('statut', 'en cours')) > 0)
            @foreach ($campagnes->where('statut', 'en cours') as $campagne)
                <a href="{{ route('campagnes.edit', $campagne->id) }}" class="a_decoration_none">
                    <button class="w3-button w3-block w3-hover-red btnColor" type="button">Modifier la campagne en
                        cours</button>
                </a>
            @endforeach
        @endif

        <h2 class="center">
            Campagne
            @if (count($campagnes->where('statut', 'en cours')) > 0)
                @foreach ($campagnes->where('statut', 'en cours') as $campagne)
                    {{ $campagne->nom_campagne }}
                    [{{ $campagne->statut }}]
                    <br>
                    Est en : {{ $campagne->progression }}
                    <br>
                    du {{ $campagne->date_debut_campagne }} au {{ $campagne->date_fin_campagne }}
        </h2>

        <div class="w3-content w3-padding" style="max-width:1564px">
            <div class="w3-row-padding">
                @if (count($articles))
                    @foreach ($articles->unique('article_id') as $article)
                        <div class="w3-col l3 m6 w3-margin-bottom">
                            <div class="w3-panel w3-border w3-round-large">
                                <br>
                                <img src= "{{ asset('/img/' . $article->type . '/' . $article->type . '.jpg') }}" alt="{{$article->type}}" style="width:100%"/>
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

                                <a href="{{ route('articles.editArticleCampagne', [$article->article_campagne_id]) }}" class="a_decoration_none">
                                    <button class="w3-button w3-block w3-hover-red btnColor" type="button">Modifier</button>
                                </a>

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
