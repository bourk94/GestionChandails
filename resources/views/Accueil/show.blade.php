@extends('layouts.app')
@section('contenu')

    <div class="padding center">

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
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="w3-col l3 m6 w3-margin-bottom margin">
                                <div class="w3-panel w3-border w3-round-large">
                                    <br>
                                    <img src= "{{ asset('/img/' . $article->type . '/' . $article->type . '.jpg') }}" alt="{{$article->type}}" style="width:100%"/>
                                    <h3>{{ $article->nom }}</h3>
                                    <p>Prix : {{ $article->prix }} $</p>
                                    <p>Commande maximale : {{ $article->quantite }}</p>
                                    <p>Description : {{ $article->description }}</p>
                                    <div class="w3-row-padding">
                                        @foreach ($couleurs->where('article_id', 'like', $article->article_id) as $couleur)
                                            <label class="{{ $couleur->nom_couleur }}">
                                                <input type="radio" name="couleur_id" value="{{ $couleur->couleur_id }}"
                                                    class="radNone">
                                                <div class="button"><span></span></div>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="w3-row-padding">
                                        @if (count($tailles))
                                            @foreach ($tailles->where('article_id', 'like', $article->article_id) as $taille)
                                                <label>
                                                    <input type="radio" name="taille_id" value="{{ $taille->taille_id }}"
                                                        class="radNone" required>
                                                    <div class="button"><span
                                                            class="prevent-select w3-text-black">{{ $taille->format }}</span>
                                                    </div>
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>

                                    @livewire('counter', ['idarticle' => $article->article_id])

                                    <br>

                                    <div>
                                        @if ($campagne->progression == 'intention d\'achat')
                                            <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Ajouter au panier</a>
                                        @elseif($campagne->progression == 'paiement' || 'collecte')
                                            <button type="submit" disabled class="w3-button w3-block w3-hover-red btnColor">Ajout indisponible</a>
                                        @else
                                            <button id="btnModalLogin" class="w3-button w3-block w3-hover-red btnColor">Ajouter au panier</a>
                                        @endif

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="0">
                            <input type="hidden" name="article_id" value="{{ $article->article_id }}">
                            <input type="hidden" name="name" value="{{ $article->nom }}">
                            <input type="hidden" value="{{ $article->prix }}" name="price">
                            <input type="hidden" value="{{ $article->image }}" name="image">
                            <input type="hidden" name="campagne_id" value="{{ $campagne->id }}">
                        </form>
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
