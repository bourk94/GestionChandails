@extends('layouts.app')

@section('title', 'Commandes')
@section('contenu')

    <div class="padding">

        <h1 class="center">Vos commandes</h1>
        <div style="overflow-x: auto;">
            <table class="customers w3-border w3-bordered">
                <tr>
                    <th>Nom de la campagne</th>
                    @if (Auth::user()->type == 'admin')
                        <th id="ColListeCouleur">Nom du client</th>
                    @endif
                    <th id="ColListeCouleur"> Date de commande</th>
                    <th id="ColListeCouleur">Nom de l'article</th>
                    <th id="ColListeCouleur">Couleur</th>
                    <th id="ColListeCouleur">Visualisation</th>
                    <th id="ColListeCouleur">Quantitée</th>
                    <th id="ColListeCouleur">Montant dû</th>
                    <th id="ColListeCouleur">État de la commande</th>
                    @if (Auth::user()->type == 'admin')
                        <th id="ColListeCouleur"> Modifier le statut</th>
                    @endif
                </tr>
                @if (!Auth::user()->type == 'admin')

                    @if (count($commandes->where('usager_id', Auth::user()->id)) > 0)
                        @foreach ($commandes->where('usager_id', Auth::user()->id) as $commande)
                            <tr>
                                <td>{{ $commande->nom_campagne }}</td>
                                <td>{{ $commande->date }}</td>
                                <td>{{ $commande->nom_article }}</td>
                                <td>{{ $commande->nom_couleur }}</td>
                                <td style="background: {{ $commande->code_couleur }}"></td>
                                <td>{{ $commande->quantite }}</td>
                                <td>{{ $commande->montant }} $</td>
                                <td>{{ $commande->statut }}</td>

                            </tr>
                        @endforeach
                    @else
                        <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                        <tr>
                            <td colspan="3">Aucune commande</td>
                        </tr>
                        <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                    @endif
                @else
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{ $commande->nom_campagne }}</td>
                            @if (Auth::user()->type == 'admin')
                                <td>{{ $commande->usager_nom }} {{ $commande->usager_prenom }}</td>
                            @endif
                            <td>{{ $commande->date }}</td>
                            <td>{{ $commande->nom_article }}</td>
                            <td>{{ $commande->nom_couleur }}</td>
                            <td style="background: {{ $commande->code_couleur }}"></td>
                            <td>
                                {{ $commande->quantite }}
                            </td>
                            <td>
                                {{ $commande->montant }} $
                            </td>
                            <td>{{ $commande->statut }}</td>
                            @if (Auth::user()->type == 'admin')
                                <td>
                                    <form action="{{ route('commandes.update', [$commande->commande_id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="commande_id" value="{{ $commande->commande_id }}">
                                        <select name="statut" id="statut" class="btn">
                                            <option value="Non payé">Non payé</option>
                                            <option value="Payé">Payé</option>
                                            <option value="Ron ramassé">Non ramassé</option>
                                            <option value="Ramassé">Ramassé</option>
                                        </select>
                                        <button type="submit" class="w3-button w3-block">Modifier</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
