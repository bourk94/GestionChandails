@extends('layouts.app')

@section('title', "modification/suppression d''une couleur")
@section('contenu')

    <form method="POST" action="{{ route('couleurs.update', [$couleur->id]) }}">
        @csrf
        @method('PATCH')
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Modifier une couleur</h2>
                        <div>
                            <label for="nomCouleur">Nouveau nom de couleur</label>
                            <input type="text" class="@error('nom_couleur') is-invalid @enderror" id="nom_couleur"
                                name="nom_couleur" value="{{ old('nom_couleur', $couleur->nom_couleur) }}">

                            @error('nom_couleur')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="nomArticle">Nouvelle couleur</label>
                            <input type="color" class="@error('nom_couleur') is-invalid @enderror" name="code_couleur"
                                id="code_couleur" value="{{ old('code_couleur', $couleur->code_couleur) }}">

                            @error('code_couleur')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Modifier une couleur</button>
        </div>
    </form>


    <!--Formulaire de suppression d'une couleur-->

    <form method="POST" action="{{ route('couleurs.destroy', [$couleur->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit"
            onclick="return confirm('Êtes-vous certain de vouloir supprimer la couleur {{ $couleur->nom_couleur }} ?')"
            class="buttonSite">Supprimer
        </button>





@endsection
