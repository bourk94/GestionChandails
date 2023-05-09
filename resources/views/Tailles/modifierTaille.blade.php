@extends('layouts.app')

@section('title', "modification/suppression d''une taille")
@section('contenu')
    @if (Auth::user()->type == 'admin')
        <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">


    <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

        <h1 class="center">Modifier la taille "{{ $taille->format }}"</h1>

        <form class="w3-container" id="my-form" action="{{ route('tailles.update', [$taille->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="w3-section">
                <label for="formatTaille">Nouveau format :</label>
                <input class="@error('format') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                    style="width:100%;" type="text" name="format" id="format"
                    value="{{ old('format', $taille->format) }}">
                @error('format')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <br>

            <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Modifier la taille</button>
        </form>

        <br>

        <form class="w3-container" method="POST" action="{{ route('tailles.destroy', [$taille->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Êtes-vous certain de vouloir supprimer la taille {{ $taille->format }} ?')"class="w3-button w3-block w3-black w3-hover-red">Supprimer</button>
        </form>

        <br>

        <div class="center">
            <a href="{{ route('tailles') }}">Retour</a>
        </div>
    </div>

            <div class="center">
                <a href="{{ route('tailles') }}">Retour</a>
            </div>
        </div>

        <!--SCRIPTS DE VALIDATION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}

        {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}
    @else
        <script>
            window.location.href = "{{ url()->previous() }}";
        </script>
    @endif



@endsection
