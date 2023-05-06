@extends('layouts.app')

@section('title', "modification/suppression d'une couleur")
@section('contenu')

<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
        
    <h1 class="center">Modifier une couleur "{{$couleur->nom_couleur}}"</h1>

    <form class="w3-container" id="form_couleur" action="{{ route('couleurs.update', [$couleur->id]) }}" method="POST">
    @csrf
    @method('PATCH')

        <div class="w3-section">
            <label for="nomCouleur">Nouveau nom de la couleur :</label>
            <input class="@error('nom_couleur') is-invalid @enderror w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nom_couleur" id="nom_couleur" value="{{ old('nom_couleur', $couleur->nom_couleur) }}">
            @error('nom_couleur')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="w3-section">
            <label for="codeCouleur">Nouvelle couleur :</label>
            <input class="@error('code_couleur') is-invalid @enderror w3-input w3-border w3-hover-border-black" style="width:100%;" type="color" name="code_couleur" id="code_couleur" value="{{ old('code_couleur', $couleur->code_couleur) }}">
            @error('code_couleur')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Modifier la couleur</button>
    </form>

    <br>

    <form class="w3-container" method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
        @csrf
        @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer la couleur {{ $couleur->nom_couleur }} ?')" class="w3-button w3-block w3-black w3-hover-red">Supprimer</button>
    </form>

    <br>
        
    <div class="center">
        <a href="{{ route('couleurs') }}">Retour</a>
    </div>
</div>

        <!--SCRIPTS DE VALIDATION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script src="{{ asset('js/jsvalidation.js') }}"></script>

        {!! JsValidator::formRequest('App\Http\Requests\CouleurRequest') !!}


    @endsection
