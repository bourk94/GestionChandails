@extends('layouts.app')
@section('contenu')



    <div class="padding">

        <h1 class="center">Liste des articles</h1>

        <a href="{{ route('articles.createArticle') }}" class="w3-button w3-block w3-hover-red btnColor">Ajouter un
            article</a>

        <br>

        <div style="overflow-x: auto;">
            <table class="customers w3-border w3-bordered">
                <tr>
                    <th id="ColListeCouleur">nom</th>
                    <th id="ColListeCouleur">type</th>
                    <th id="ColListeCouleur">description</th>
                    <th></th>
                    <th></th>
                </tr>
                @if (count($articles))
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->type }}</td>
                            <td>{{ $article->description }}</td>
                            <td>
                                <a class="a_decoration_none" href="{{ route('articles.edit', [$article->id]) }}">
                                    <span>
                                        <button class="w3-button w3-block" type="button"><strong>Modifier</strong></button>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a class="close">
                                    <form method="POST" action="{{ route('articles.destroy', [$article->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <span><button class="w3-button w3-block" type="submit"
                                                onclick="return confirm('Êtes-vous certain de vouloir supprimer l''article{{ $article->nom }} ?')">&times;</button></span>
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                    <tr>
                        <td colspan="3">Il n'y a aucun article</td>
                    </tr>
                    <!-- FAIRE EN SORTE DE FAIRE UN JOLI MESSAGE S'IL N'Y A RIEN ! -->
                @endif
            </table>
        </div>
    </div>

    <!--SCRIPTS DE VALIDATION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{ asset('js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest') !!}



@endsection
