@extends('layouts.app')

@section('title', 'Ajouter une couleur')
@section('contenu')

    <form id="form_couleur" action="{{ route('couleurs.store') }}" method="POST">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Ajouter une couleur</h2>
                        <div>
                            <label for="nomCouleur">Nom de la couleur</label>
                            <input type="text" class="@error('nom_couleur') is-invalid @enderror" name="nom_couleur"
                                id="nom_couleur">

                            @error('nom_couleur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div>
                            <label for="codeCouleur">Choisir une couleur</label>
                            <input type="color" class="@error('code_couleur') is-invalid @enderror" name="code_couleur"
                                id="code_couleur">

                            @error('code_couleur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex__center margin__top">
            <button class="btn bg__orange color__white" type="submit">Ajouter une couleur</button>
        </div>
    </form>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\CouleurRequest') !!}

@endsection
