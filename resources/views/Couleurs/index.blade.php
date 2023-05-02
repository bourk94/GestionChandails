@extends('layouts.app')
@section('contenu')

    <div class="padding">

        <h2 class="center">Liste des couleurs</h2>

        <div class="center">
            <a href="{{ route('couleurs.create') }}" class="buttonSite">Ajouter une couleur</a>
        </div>

        <table class="customers">
            <tr>
                <th id="ColListeCouleur">Nom de la couleur</th>
                <th id="ColListeCouleur">Code de la couleur</th>
                <th id="ColListeCouleur">Visualisation</th>
                <th></th>
                <th></th>
            </tr>
            @if (count($couleurs))
                @foreach ($couleurs as $couleur)
                    <tr>
                        <td>{{ $couleur->nom_couleur }}</td>
                        <td>{{ $couleur->code_couleur }}</td>
                        <td style = "background: {{ $couleur->code_couleur }}"></td>
                        <td>
                            <div class="row">
                                <a href="{{ route('couleurs.edit', [$couleur->id]) }}" class="buttonSite">Modifier</a>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <form method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer la couleur {{ $couleur->nom_couleur }} ?')" class="buttonSite">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                <tr>
                    <td colspan="3">Aucune couleur</td>
                </tr>
                <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
            @endif
        </table>
    </div>

@endsection
