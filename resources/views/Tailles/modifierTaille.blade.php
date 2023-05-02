@extends('layouts.app')

@section('title', "modification/suppression d''une taille")
@section('contenu')

    <form id="my-form" method="POST" action="{{ route('tailles.update', [$taille->id]) }}">
        @csrf
        @method('PATCH')
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Modifier une taille</h2>
                        <div>
                            <label for="formatTaille">Nouveau format</label>
                            <input type="text" class="@error('code_couleur') is-invalid @enderror" id="format"
                                name="format" value="{{ old('format', $taille->format) }}">

                            @error('format')
                                <span class="text-danger">{{ $messsage }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Modifier une taille</button>
        </div>
    </form>


    <!--Formulaire de suppression d'une taille-->

    <form method="POST" action="{{ route('tailles.destroy', [$taille->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit"
            onclick="return confirm('Êtes-vous certain de vouloir supprimer la taille {{ $taille->format }} ?')"
            class="buttonSite">Supprimer
        </button>


     <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!} 


@endsection
