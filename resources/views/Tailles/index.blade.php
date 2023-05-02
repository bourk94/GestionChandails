@extends('layouts.app')
@section('contenu')

    <div class="padding">

        <h2 class="center">Liste des tailles</h2>

        <div class="center">
            <a href="{{ route('couleurs.create') }}" class="buttonSite">Ajouter une taille</a>
        </div>

        <table class="tailles">
            <tr>
                <th id="ColListeCouleur">Taille</th>                
            </tr>
            @if (count($tailles))
                @foreach ($tailles as $taille)
                    <td>{{ $taille->format }}</td>                  
                    <td>
                        <div class="row">
                            <a href="{{ route('tailles.edit', [$taille->id]) }}" class="buttonSite">Modifier</a>
                            <form method="POST" action="{{ route('tailles.destroy', [$taille->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Êtes-vous certain de vouloir supprimer la taille {{ $taille->format }} ?')"
                                    class="buttonSite">Supprimer
                                </button>
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

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\TailleRequest') !!}

@endsection
