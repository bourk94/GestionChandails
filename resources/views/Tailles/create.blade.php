@extends('layouts.app')

@section('title', 'Ajouter une couleur')
@section('contenu')

<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
        
    <h1 class="center">Ajouter une taille</h1>

    <form class="w3-container" id="form_taille" action="{{ route('tailles.store') }}" method="POST">
    @csrf

        <div class="w3-section">
            <label for="formatTaille">Format :</label>
            <input class="@error('format') is-invalid @enderror w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="format" id="format">
            @error('format')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Ajouter une taille</button>
    </form>

    <br>
        
    <div class="center">
        <a href="{{ route('tailles') }}">Retour</a>
    </div>
</div>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\TailleRequest') !!}

@endsection
