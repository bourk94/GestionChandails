@extends('layouts.app')
@section('contenu')

    <div class="padding">

        <h1 class="center">Liste des couleurs</h1>


        <a href="{{ route('couleurs.create') }}" class="w3-button w3-block w3-hover-red btnColor">Ajouter une couleur</a>

        <br>
        
        <div style="overflow-x: auto;">
            <table class="customers w3-border w3-bordered">
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
                                <a class="a_decoration_none" href="{{ route('couleurs.edit', [$couleur->id]) }}">
                                    <span>
                                        <button class="w3-button w3-block" type="button"><strong>Modifier</strong></button>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a class="close">
                                    <form method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
                                        @csrf
                                            @method('DELETE')
                                            <span><button class="w3-button w3-block" type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer la couleur {{ $couleur->nom_couleur }} ?')">&times;</button></span>
                                    </form>
                                </a>
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
    </div>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\CouleurRequest') !!}

@endsection
