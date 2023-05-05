@extends('layouts.app')

@section('title', 'Ajouter une couleur')
@section('contenu')

    <form id="form_taille" action="{{ route('tailles.store') }}" method="POST">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Ajouter une taille</h2>
                        <div>
                            <label for="formatTaille">Format</label>
                            <input type="text" class="@error('format') is-invalid @enderror" name="format" id="format">

                            @error('format')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Ajouter une taille</button>
        </div>
    </form>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\TailleRequest') !!}

@endsection
