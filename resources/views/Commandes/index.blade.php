@extends('layouts.app')

@section('title', 'Commandes')
@section('contenu')

    <div class="padding">

        <h1 class="center">Vos commandes</h1>
        <div style="overflow-x: auto;">
            <table class="customers w3-border w3-bordered">
                <tr>
                    <th >Nom de la campagne</th>
                    <th> Date de commande</th>
                    <th id="ColListeCouleur">Nom de l'article</th>
                    <th id="ColListeCouleur">Couleur</th>
                    <th></th>
                    <th id="ColListeCouleur">Quantitée</th>
                    
                    <th>Montant dû</th>
                </tr>
                @if (count($commandes->where('usager_id', Auth::user()->id)) > 0)
                    @foreach ($commandes->where('usager_id', Auth::user()->id) as $commande)
                        <tr>
                            <td>{{ $commande->nom_campagne }}</td>
                            <td>{{ $commande->date }}</td>
                            <td>{{ $commande->nom_article }}</td>
                            <td>{{ $commande->nom_couleur }}</td>
                            <td style="background: {{ $commande->code_couleur }}"></td>
                            <td>
                                {{ $commande->quantite }}
                            </td>
                            <td>
                                {{$commande->montant}} $
                            </td>
                        </tr>
                    @endforeach
                @else
                    <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                    <tr>
                        <td colspan="3">Aucune commande</td>
                    </tr>
                    <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                @endif
            </table>
        </div>
    </div>
@endsection
