@extends('layouts.app')
@section('contenu')

<div class="padding">

<h2 class="center">Liste des administrateurs</h2>

<div class="center">
    <a href="{{ route('admin.create') }}" class="buttonSite">Créer un administrateurs</a>
</div>

<table class="customers">
  <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Email</th>
  </tr>
  @if(count($usagers))
    @foreach($usagers as $usager)
        @if($usager->type == 'admin')
            <tr>
            <td>{{$usager->prenom}}</td>
            <td>{{$usager->nom}}</td>
            <td>{{$usager->email}}</td>
            <td>
                <div class="row">
                    <a href="{{ route('usagers.edit', [$usager->id]) }}" class="buttonSite">Modifier</a>
                    <form class="" method="POST" action="{{route('usagers.destroy', [$usager->id]) }}">
                    @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer l\'administrateur {{$usager->prenom}} {{$usager->nom}} ?')" class="buttonSite">Supprimer</button>
                    </form>
                </div>
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

@endsection