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
        <!-- Section choix de couleurs -->
            <div class="rightObjets">
                <label class="orange">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="amber">
                    <input type="radio" name="couleurs" value="medium" checked>
                    <div class="button"><span></span></div>
                </label>

                <label class="lime">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="teal">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="blue">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="indigo">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>
            </div>
            
            <!-- Section choix de taille -->
            <div class="rightObjets">
                <label class="small">
                    <input type="radio" name="size" value="small">
                    <div class="button"><span>S</span></div>
                </label>

                <label class="medium">
                    <input type="radio" name="size" value="medium" checked>
                    <div class="button"><span>M</span></div>
                </label>

                <label class="large">
                    <input type="radio" name="size" value="large">
                    <div class="button"><span>L</span></div>
                </label>

                <label class="xlarge">
                    <input type="radio" name="size" value="xlarge">
                    <div class="button"><span>XL</span></div>
                </label>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------------ -->

    <!-- <div class="bckgroundObjets">
        <div class="leftObjets">
            <div class="zoneImageVide"></div>
        </div>
        <div class="rightObjets">
            <h2>Chandail</h2>
        </div>

            <div class="rightObjets">
                <label class="orange">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="amber">
                    <input type="radio" name="couleurs" value="medium" checked>
                    <div class="button"><span></span></div>
                </label>

                <label class="lime">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="teal">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="blue">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>

                <label class="indigo">
                    <input type="radio" name="couleurs" value="medium">
                    <div class="button"><span></span></div>
                </label>
            </div>
            

            <div class="rightObjets">
                <label class="small">
                    <input type="radio" name="size" value="small">
                    <div class="button"><span>S</span></div>
                </label>

                <label class="medium">
                    <input type="radio" name="size" value="medium" checked>
                    <div class="button"><span>M</span></div>
                </label>

                <label class="large">
                    <input type="radio" name="size" value="large">
                    <div class="button"><span>L</span></div>
                </label>

                <label class="xlarge">
                    <input type="radio" name="size" value="xlarge">
                    <div class="button"><span>XL</span></div>
                </label>
            </div>
        </div>
    </div> -->

    <!-- ------------------------------------------------------------------ -->

</div>
    

@endsection