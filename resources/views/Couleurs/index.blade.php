@extends('layouts.app')
@section('contenu')

    <div class="padding">

        <h2 class="center">Liste des couleurs</h2>

        {{-- <div class="center">
            <a href="{{ route('couleurs.createCouleur') }}" class="buttonSite">Ajouter une couleur</a>
        </div> --}}

        <table class="couleurs">
            <tr>
                <th>Nom de la couleur</th>
                <th>Code de la couleur</th>
            </tr>
            @if (count($couleurs))
                @foreach ($couleurs as $couleur)
                    <td>{{ $couleur->nom_couleur }}</td>
                    <td>{{ $couleur->code_couleur }}</td>                    
                    <td>
                        <div class="row">
                            <a href="{{ route('couleurs.edit', [$couleur->id]) }}" class="buttonSite">Modifier</a>
                            <form  method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Êtes-vous certain de vouloir supprimer la couleur {{ $couleur->nom_couleur }} ?')"
                                    class="buttonSite">Supprimer</button>
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