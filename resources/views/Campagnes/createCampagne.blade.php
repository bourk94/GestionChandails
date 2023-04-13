@extends('layouts.app')

@section('title', 'Créer une campagne')
@section('contenu')

    <form id="my-form" action="{{ route('campagnes.store') }}" method="POST">
        @csrf
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <div>
                        <h2>Créer une campagne</h2>
                        <div>
                            <label for="nom">Nom de la campagne</label>
                            <input type="text" name="nom" id="nom">
                        </div>
                        <div>
                            <label for="dateDebut">Date de début</label>
                            <input type="date" name="dateDebut" id="dateDebut">
                        </div>
                        <div>
                            <label for="dateFin">Date de fin</label>
                            <input type="date" name="dateFin" id="dateFin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <template id="my-template">
            <div class="card__padding">
                <div class="card__container">
                    <div class="flex__center">
                        <div>
                            <label for="nomArticle">Nom de l'article</label>
                            <input name="nomArticle" type="text"/>
                        </div>
                    </div>
                </div>
            </div>
        </template>     
    </form>

        <div class="flex__center margin__top" id="btnAjouter">
            <button class="btn bg__orange color__white" id="add-button" type="button">Ajouter un article</button>
        </div>

    <script>
        document.getElementById('add-button').addEventListener('click', function(event) {
        var form = document.getElementById('my-form'),
            template = document.getElementById('my-template'),
            clone = document.importNode(template.content, true);

            
        form.appendChild(clone);
        }, false);

        var event = new Event('click');
        document.getElementById('add-button').dispatchEvent(event);
    </script>



@endsection
