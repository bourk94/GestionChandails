@extends('layouts.app')

@section('title', 'Créer une campagne')
@section('contenu')



    @if (!count($campagnes->where('statut', 'en cours')) > 0)
        <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

            <h1 class="center">Créer une campagne</h1>

            <form class="w3-container" id="my-form" action="{{ route('campagnes.store') }}" method="POST">
                @csrf

                <input type="number" name="administrateur_id_creation" id="administrateur_id_creation"
                    value="{{ Auth::user()->id }}" hidden>

                <div class="w3-section">
                    <label for="nom_campagne">Nom de la campagne</label>
                    <input type="text"
                        class="@error('nom_campagne') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" name="nom_campagne" id="nom_campagne" value="{{ old('nom_campagne') }}">
                    @error('nom_campagne')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="date_debut_campagne">Date de début</label>
                    <input type="date"
                        class="@error('date_debut_campagne') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" value="{{ old('date_debut_campagne') }}" min="{{ date('Y-m-d') }}"
                        max="{{ date('Y-m-d', strtotime('+1 year')) }}" onkeydown="return false" onfocus="this.blur( )"
                        class="@error('date_debut_campagne') is-invalid @enderror @error('dateFin') is-invalid @enderror"
                        name="date_debut_campagne" id="date_debut_campagne">
                    @error('date_debut_campagne')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="date_fin_campagne">Date de fin</label>
                    <input type="date"
                        class="@error('date_fin_campagne') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" value="{{ old('date_fin_campagne') }}"
                        min="{{ date('Y-m-d', strtotime('+3 week')) }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}"
                        onkeydown="return false" onfocus="this.blur( )"
                        class="@error('date_fin_campagne') is-invalid @enderror @error('date_fin_campagne') is-invalid @enderror"
                        name="date_fin_campagne" id="date_fin_campagne">
                    @error('date_fin_campagne')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="date_debut_collecte">Date de début de collecte</label>
                    <input type="date"
                        class="@error('date_debut_collecte') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" value="{{ old('date_debut_collecte') }}"
                        min="{{ date('Y-m-d', strtotime('+6 week')) }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}"
                        onkeydown="return false" onfocus="this.blur( )"
                        class="@error('date_debut_collecte') is-invalid @enderror @error('date_debut_collecte') is-invalid @enderror"
                        name="date_debut_collecte" id="date_debut_collecte">
                    @error('date_debut_collecte')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w3-section">
                    <label for="date_fin_collecte">Date de fin de collecte</label>
                    <input type="date"
                        class="@error('date_fin_collecte') is-invalid @enderror w3-input w3-border w3-hover-border-black"
                        style="width:100%;" value="{{ old('date_fin_collecte') }}"
                        min="{{ date('Y-m-d', strtotime('+9 week')) }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}"
                        onkeydown="return false" onfocus="this.blur( )"
                        class="@error('date_fin_collecte') is-invalid @enderror @error('date_fin_collecte') is-invalid @enderror"
                        name="date_fin_collecte" id="date_fin_collecte">
                    @error('date_fin_collecte')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <br>

                <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Créer la campagne</button>
            </form>

            <br>

            <div class="center">
                <a href="{{ route('usagers.login') }}">Retour</a>
            </div>
        </div>
    @else
        <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

            <h1 class="center">Vous avez déjà une campagne en cours</h1>

            <br>

            <a href="{{ route('accueil') }}" class="a_decoration_none">
                <button class="w3-button w3-block w3-hover-red btnColor" type="button">Retourner à l'accueil</button>
            </a>
        </div>
    @endif


@endsection
