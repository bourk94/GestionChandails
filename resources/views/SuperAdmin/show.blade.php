@extends('layouts.app')
@section('contenu')
    @if (Auth::user()->type == 'superadmin')
        <div class="padding">

            <h1 class="center">Liste des administrateurs</h1>

            <a class="a_decoration_none" href="{{ route('admin.create') }}"><button
                    class="w3-button w3-block w3-hover-red btnColor" type="button">Créer un administrateur</button></a>

            <br>

            <div style="overflow-x: auto;">
                <table class="customers w3-border w3-bordered">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    @if (count($usagers))
                        @foreach ($usagers as $usager)
                            @if ($usager->type == 'admin')
                                <tr>
                                    <td>{{ $usager->prenom }}</td>
                                    <td>{{ $usager->nom }}</td>
                                    <td>{{ $usager->email }}</td>
                                    <td>
                                        <a class="close">
                                            <form method="POST" action="{{ route('usagers.destroy', [$usager->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <span><button class="w3-button w3-block" type="submit" aria-hidden="true"
                                                        onclick="return confirm('Êtes-vous certain de vouloir supprimer l\'administrateur {{ $usager->prenom }} {{ $usager->nom }} ?')">&times;</button></span>
                                            </form>
                                        </a>

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                        <tr>
                            <td colspan="3">Aucun usager</td>
                        </tr>
                        <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                    @endif
                </table>
            </div>
        </div>
    @else
        <script>
            window.location.href = "{{ url()->previous() }}";
        </script>
    @endif
@endsection
