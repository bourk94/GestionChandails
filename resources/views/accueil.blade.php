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
            @endif
        @endforeach
    </h2>

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
                                <input type="radio" name="size" value="{{$taille->grandeur}}" class="radNone">
                                <div class="button"><span>{{$taille->grandeur}}</span></div>
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

<!-- <div class="w3-row w3-border"> -->
<div class="row">
<div class="w3-twothird w3-container w3-red">
  <h2>w3-twothird</h2>  
  <p>The w3-twothird class uses 66% of the parent container.</p>
  <p>On screens smaller than 601 pixels it resizes to full screen.</p>
</div>

<div class="w3-third w3-container">
  <h2>w3-third</h2>
  <p>The w3-twothird class uses 33% of parent container.</p>
  <p>On screens smaller than 601 pixels it resizes to full screen.</p>
</div>
</div>

</div>
    

@endsection