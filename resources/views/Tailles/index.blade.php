@extends('layouts.app')
@section('title', 'Tailles')
@section('contenu')

        <div class="padding">



    <div class="padding">

            <a href="{{ route('tailles.create') }}" class="w3-button w3-block w3-hover-red btnColor">Ajouter une taille</a>

            <br>

            <div style="overflow-x: auto;">
                <table class="customers w3-border w3-bordered">
                    <tr>
                        <th id="ColListeCouleur">Taille/Format</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @if (count($tailles))
                        @foreach ($tailles as $taille)
                            <tr>
                                <td>{{ $taille->format }}</td>
                                <td>
                                    <a class="a_decoration_none" href="{{ route('tailles.edit', [$taille->id]) }}">
                                        <span>
                                            <button class="w3-button w3-block"
                                                type="button"><strong>Modifier</strong></button>
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <a class="close">
                                        <form method="POST" action="{{ route('tailles.destroy', [$taille->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <span><button class="w3-button w3-block" type="submit"
                                                    onclick="return confirm('Êtes-vous certain de vouloir supprimer la taille {{ $taille->format }} ?')">&times;</button></span>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                        <tr>
                            <td>{{ $taille->format }}</td>
                            <td>
                                <a class="a_decoration_none" href="{{ route('tailles.edit', [$taille->id]) }}">
                                    <span>
                                        <button class="w3-button w3-block" type="button"><strong>Modifier</strong></button>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a class="close">
                                    <form method="POST" action="{{ route('tailles.destroy', [$taille->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <span><button class="w3-button w3-block" type="submit"
                                                onclick="return confirm('Êtes-vous certain de vouloir supprimer la taille {{ $taille->format }} ?')">&times;</button></span>
                                    </form>
                                </a>
                            </td>
                        </tr>
                        <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                    @endif
                </table>
            </div>
        </div>

        <!--SCRIPTS DE VALIDATION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\TailleRequest') !!}


@endsection
