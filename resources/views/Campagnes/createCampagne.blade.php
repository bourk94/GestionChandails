@extends('layouts.app')

@section('title', 'Créer une campagne')
@section('contenu')


<div class="">
    <div class="">
        <h2>Créer une campagne</h2>
        <form action="{{ route('campagnes.store') }}" method="POST">
            @csrf
            <div>
                <label for="nom">Nom de la campagne</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div>
                <label for="dateDebut">Date de début</label>
                <input type="date" name="dateDebut" id="dateDebut">
            </div>
            <div>
                <label for="dateFin">Date de fin</label>
                <input type="date" name="dateFin" id="dateFin">
            </div>
    </div>


    <div class="">
        <button>Ajouter un article</button>
    </div>
</div>











@endsection