<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCampagneRequest;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCampagne;
use App\Models\Campagne;
use App\Models\Couleur;
use App\Models\Taille;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Symfony\Component\ErrorHandler\Debug;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Pour les articles
     */
    public function create()
    {
        $campagnes = Campagne::all();
        return view('articles.createArticle', compact('campagnes'));
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ArticleRequest $request)
    {
        try {
            $article = new Article($request->all());
            $article->save();

            return redirect()->route('accueil')->with('message', "Ajout de l'article " . $article->nom . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->with('message', ['L\'ajout n\'a pas fonctionné!']);
        }


        return redirect()->route('accueil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }


 


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.modifierArticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        try {
            $article = Article::findOrFail($id);

            //Les champs du update (nom, type, description, prix)

            $article->nom = $request->nom;
            $article->type = $request->type;
            $article->description = $request->description;

            $article->save();

            return redirect()->route('accueil')->with('message', "Modification de " . $article->nom . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->withErrors(['La modification n\'a pas fonctionnée']);
        }

        return redirect()->route('accueil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);

            //Gérer les liens avec les tables de jointures
            $article->campagnes()->detach();
            $article->commandes()->detach();

            //Gérer le lien avec la table de jointure Caracteristique
            //$article->caracteristiques()->detach();

            $article->delete();

            //Retour à la page d'accueil suite à la suppression
            return redirect()->route('accueil')->with('message', "Suppression de " . $article->nom . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);

            return redirect()->route('accueil')->withErrors(['La suppression n\'a pas fonctionnée']);
        }

        return redirect()->route('accueil');
    }

    


}
