<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Couleur;
use App\Models\Taille;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

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
     */
    public function create()
    {
        return view('articles.createArticle');
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
            return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné!']);
        }


        return redirect()->route('accueil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

            //Les champs du update (image, nom, type)

            $article->image = $request->image;
            $article->nom = $request->nom;
            $article->type = $request->type;
            $article->description = $request->description;
            $article->prix = $request->prix;

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

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Se passer l'id de l'article et de la campagne
    public function storeArticleCampagne(Request $request, $id, $idCampagne)
    {
        try {
            $article = Article::findOrFail($id);
            $article->campagnes()->attach($idCampagne);
            $uploadedFile = $request->file('image');

            $nomFichierUnique = str_replace(' ', '_', $article->nom) . '-' . uniqid() . '.' . $uploadedFile->extension();

            try {
                //If pour gérer le tri des images selon le type de l'article

                if ($article->type == "Chandail") {
                    $request->image->move(public_path('img/chandails'), $nomFichierUnique);
                } else if ($article->type == "Kangourou") {
                    $request->image->move(public_path('img/kangourou'), $nomFichierUnique);
                } else {
                    $request->image->move(public_path('img/autres'), $nomFichierUnique);
                }
            } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
                Log::error("Erreur lors du téléversement du fichier. ", [$e]);
            }

            $article->image = $nomFichierUnique;

            $article->campagnes()->attach($request->campagne_id);

            return redirect()->route('accueil')->with('message', "La liaison entre l'article " . $article->nom . " à la campagne " . $request->campagne_id . "  a réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);

            return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné']);
        }

        return redirect()->route('accueil');
    }
}
