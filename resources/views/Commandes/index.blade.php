@extends('layouts.app')

@section('title', 'Commandes')
@section('contenu')

    <div class="padding">

        <h1 class="center">Vos commandes</h1>
        <div style="overflow-x: auto;">
            <table class="customers w3-border w3-bordered">
                <tr>
                    <th id="ColListeCouleur">Nom de l'article</th>
                    <th id="ColListeCouleur">Couleur</th>
                    <th></th>
                    <th id="ColListeCouleur">Quantitée</th>
                    
                    <th></th>
                </tr>
                @if (count($commandes))
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{ $commande->nom_article }}</td>
                            <td>{{ $commande->nom_couleur }}</td>
                            <td style="background: {{ $commande->code_couleur }}"></td>
                            <td>
                                {{ $commande->quantite }}
                            </td>
                            <td>

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
