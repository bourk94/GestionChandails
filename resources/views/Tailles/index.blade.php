@extends('layouts.app')
@section('contenu')

    <div class="padding">

        <h2 class="center">Liste des tailles</h2>

        <div class="center">
            <a href="{{ route('couleurs.create') }}" class="buttonSite">Ajouter une taille</a>
        </div>

        <table class="couleurs">
            <tr>
                <th id="ColListeCouleur">Nom de la couleur</th>
                <th id="ColListeCouleur">Code de la couleur</th>
                <th id="ColListeCouleur">Visualisation</th>
            </tr>
            @if (count($couleurs))
                @foreach ($couleurs as $couleur)
                    <td>{{ $couleur->nom_couleur }}</td>
                    <td>{{ $couleur->code_couleur }}</td>
                    <td>
                        <div class="rightObjets">

                            <label class="{{ $couleur->nom_couleur }}">
                                <input type="radio" name="color" value="{{ $couleur->nom_couleur }}" class="radNone">
                                <div class="button"><span></span></div>
                            </label>


                            <script>
                                var couleurs = document.createElement('style');
                                couleurs.innerHTML =
                                    `@foreach ($couleurs as $couleur) .{{ $couleur->nom_couleur }} .button span { background-color: {{ $couleur->code_couleur }}; } @endforeach`;
                                document.head.appendChild(couleurs);
                            </script>

                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <a href="{{ route('couleurs.edit', [$couleur->id]) }}" class="buttonSite">Modifier</a>
                            <form method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
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
