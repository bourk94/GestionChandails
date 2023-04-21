@extends('layouts.app')
@section('contenu')

<!-- <div class="row"> -->
<div class="padding">
    <!-- Section informations de la campagne -->
    <h2 class="center">
        Campagne
        @foreach($campagnes as $campagne)
            @if($campagne->statut == 'en cours')
                {{$campagne->nom_campagne}}
                [{{$campagne->statut}}]
                <br>
                {{$campagne->progression}} disponible
                <br>
                du {{$campagne->date_debut_campagne}} au {{$campagne->date_fin_campagne}}
       
    </h2>

    <!-- Section qui affiche les articles disponibles dans la campagne avec les couleurs et les tailles -->

    @foreach($campagne->articles as $article)
            <div class="bckgroundObjets">
                <div class="leftObjets">
                    <div class="zoneImageVide"></div>
                </div>
                <div class="rightObjets">
                    <h2>{{$article->nom}}</h2>
                </div>

                <!-- Section choix de couleurs -->
                <div class="rightObjets">
                    @if(count($couleurs))
                        @foreach($article->couleurs as $couleur)
                            <label class="{{$couleur->nom_couleur}}">
                                <input type="radio" name="color" value="{{$couleur->nom_couleur}}" class="radNone">
                                <div class="button"><span></span></div>
                            </label>
                        @endforeach
                    @endif
                    <script> 
                        var couleurs = document.createElement('style');
                        couleurs.innerHTML = `@foreach($couleurs as $couleur) .{{$couleur->nom_couleur}} .button span { background-color: {{$couleur->code_couleur}}; } @endforeach`;
                        document.head.appendChild(couleurs);
                    </script>
                </div>
                    
                <!-- Section choix de taille -->
                <div class="rightObjets">
                    @if(count($tailles))
                        @foreach($article->tailles as $taille)
                            <label>
                                <input type="radio" name="size" value="{{$taille->format}}" class="radNone">
                                <div class="button"><span>{{$taille->format}}</span></div>
                            </label>
                        @endforeach
                    @endif
                </div>
                <div class="rightObjets">
                    <a href="#" class="buttonSite">Ajouter au panier</a>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun article</p>
    @endif


        @endforeach
{{-- 
    @if(count($articles))
        @foreach($articles as $article)
            <div class="bckgroundObjets">
                <div class="leftObjets">
                    <div class="zoneImageVide"></div>
                </div>
                <div class="rightObjets">
                    <h2>{{$article->nom}}</h2>
                </div>

                <!-- Section choix de couleurs -->
                <div class="rightObjets">
                    @if(count($couleurs))
                        @foreach($couleurs as $couleur)
                            <label class="{{$couleur->nom_couleur}}">
                                <input type="radio" name="color" value="{{$couleur->nom_couleur}}" class="radNone">
                                <div class="button"><span></span></div>
                            </label>
                        @endforeach
                    @endif
                    <script> 
                        var couleurs = document.createElement('style');
                        couleurs.innerHTML = `@foreach($couleurs as $couleur) .{{$couleur->nom_couleur}} .button span { background-color: {{$couleur->code_couleur}}; } @endforeach`;
                        document.head.appendChild(couleurs);
                    </script>
                </div>
                    
                <!-- Section choix de taille -->
                <div class="rightObjets">
                    @if(count($tailles))
                        @foreach($tailles as $taille)
                            <label>
                                <input type="radio" name="size" value="{{$taille->format}}" class="radNone">
                                <div class="button"><span>{{$taille->format}}</span></div>
                            </label>
                        @endforeach
                    @endif
                </div>
                <div class="rightObjets">
                    <a href="#" class="buttonSite">Ajouter au panier</a>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun article</p>
    @endif --}}

</div>
    

@endsection