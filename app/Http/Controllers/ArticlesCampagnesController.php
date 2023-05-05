<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCampagneRequest;
use App\Models\Article;
use App\Models\Campagne;
use App\Models\Couleur;
use App\Models\Taille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticlesCampagnesController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * Pour les articles campagne
     */
    public function createArticleCampagne()
    {
        $articles = Article::all();
        $couleurs = Couleur::all();
        $tailles = Taille::all();
        $campagnes = Campagne::all();
        return view('articles.createArticleCampagne', compact('articles', 'couleurs', 'tailles', 'campagnes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticleCampagne(Article $article)
    {
        return view('articles.show', compact('article'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Se passer l'id de l'article et de la campagne


    public function storeArticleCampagne(ArticleCampagneRequest $request)
    {
        try {

            $article = Article::findOrFail($request->article_id);

            $procedureCreateArticleCampagne = DB::select("CALL createArticleCampagne(?,?,?,?,?)", [$request->prix, $article->id, $request->campagne_id, $request->couleur_id, $request->taille_id]);
            DB::prepareBindings($procedureCreateArticleCampagne);

            $campagne = Campagne::findOrFail($request->campagne_id);

            // Vérifier que l'image n'est pas nulle pour enregistrer l'image
            if ($request->hasFile('image')) {
                $uploadedFile = $request->file('image');
                $nomFichierUnique = str_replace(' ', '_', $article->nom) . '-' . uniqid() . '.' . $uploadedFile->extension();
                $path = $this->getPublicPath($article->type);

                try {
                    $uploadedFile->move($path, $nomFichierUnique);
                } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
                    Log::error("Erreur lors du téléversement du fichier. ", [$e]);
                    return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné']);
                }

                $article->image = $nomFichierUnique;
                $article->save();
            }

            return redirect()->route('accueil')->with('message', "La liaison entre l'article " . $article->nom . " à la campagne " . $campagne->nom_campagne . "  a réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
        }

        return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné']);
    }

    private function getPublicPath($type)
    {
        switch ($type) {
            case "Chandail":
                return public_path('img/chandails');
            case "Kangourou":
                return public_path('img/kangourou');
            default:
                return public_path('img/autres');
        }
    }
}
