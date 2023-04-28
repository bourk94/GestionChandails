@extends('layouts.app')
@section('contenu')
    <h1>Page des couleurs</h1>
    @if(isset($couleur))
        <li>{{ $couleur->nom_couleur }}</li>
        <li>{{ $couleur->code_couleur }}</li>
    @else
        <p>Le film n'existe pas</p>
    @endif
@endsection
