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
            <div class="zoneImageVide"></div>
        </div>
        <div class="rightObjets">
            <h2>Chandail</h2>
        </div>
            <div class="rightObjets">
                <label class="orange">
                    <input type="radio" name="color" value="orange">
                    <div class="button"><span></span></div>
                </label>

                <label class="amber">
                    <input type="radio" name="color" value="amber">
                    <div class="button"><span></span></div>
                </label>

                <label class="lime">
                    <input type="radio" name="color" value="lime">
                    <div class="button"><span></span></div>
                </label>

                <label class="teal">
                    <input type="radio" name="color" value="teal">
                    <div class="button"><span></span></div>
                </label>

                <label class="blue">
                    <input type="radio" name="color" value="blue">
                    <div class="button"><span></span></div>
                </label>

                <label class="indigo">
                    <input type="radio" name="color" value="indigo">
                    <div class="button"><span></span></div>
                </label>
            </div>
            <div class="rightObjets">
                <label class="small">
                    <input type="radio" name="size" value="small">
                    <div class="button"><span></span></div>
                </label>

                <label class="medium">
                    <input type="radio" name="size" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="large">
                    <input type="radio" name="size" value="large">
                    <div class="button"><span></span></div>
                </label>

                <label class="xlarge">
                    <input type="radio" name="size" value="xlarge" checked>
                    <div class="button"><span></span></div>
                </label>
            </div>
            <!-- <form>
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
            </form> -->
        </div>
    </div>
</div>
    

@endsection