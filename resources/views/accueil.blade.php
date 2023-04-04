@extends('layouts.app')
@section('contenu')

<div class="padding">
    <h2 class="center">
        Campagne d’hiver 2023 [en cours]
        <br>
        Intention d’achats disponible du X au X
    </h2>

    <div class="bckgroundObjets">
        <div class="leftObjets">
            <div class="zoneImageVide">

            </div>
        </div>
        <div class="rightObjets">
            <h2>Chandail</h2>
            <form>
                <select id="couleur" name="couleur">
                    <option selected disabled hidden>Couleurs</option>
                    <option value="noir">Noir</option>
                    <option value="blanc">Blanc</option>
                    <option value="rouge">Rouge</option>
                </select>
                <br><br>
                <select id="taille" name="taille">
                    <option selected disabled hidden>Tailles</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </form>
        </div>
    </div>
</div>
    

@endsection