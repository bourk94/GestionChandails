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
use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        if (Auth::user()->type != 'admin') 
        {            
            return redirect()->back();
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Pour les articles
     */
    public function createArticle()
    {
        if (Auth::user()->type != 'admin') 
        {            
            return redirect()->back();
        }
        return view('articles.createArticle');
    }


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

        if (Auth::user()->type != 'admin') 
        {            
            return redirect()->back();
        }

        return view('Articles.createArticleCampagne', compact('articles', 'couleurs', 'tailles', 'campagnes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeArticle(ArticleRequest $request)
    {
        try {
            $article = new Article($request->all());
            $article->save();

        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->with('message', 'L\'ajout n\'a pas fonctionné!');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticleCampagne(Article $article)
    {
        // return view('articles.show', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     * 
     * Pour les articles
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (Auth::user()->type != 'admin') 
        {            
            return redirect()->back();
        }

        return view('articles.modifierArticle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * Pour les articles campagne
     */
    public function editArticleCampagne($id)
    {
        $articles_campagnes = DB::table('article_campagne')
            ->join('articles', 'article_campagne.article_id', '=', 'articles.id')
            ->join('campagnes', 'article_campagne.campagne_id', '=', 'campagnes.id')
            ->join('couleurs', 'article_campagne.couleur', '=', 'couleurs.id')
            ->join('tailles', 'article_campagne.taille', '=', 'tailles.id')
            ->where('article_campagne.id', '=' , $id)
            ->get();

        $couleurs = Couleur::all();
        $tailles = Taille::all();
        $campagnes = Campagne::all();

        if (Auth::user()->type != 'admin') 
        {            
            return redirect()->back();
        }

        return view('articles.modifierArticleCampagne', compact('articles_campagnes', 'couleurs', 'tailles', 'campagnes'));
    }


    /**
     * Update the specified resource in storage.
     *
     * Pour les articles campagne
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateArticleCampagne(ArticleCampagneRequest $request, $id)
    {
        try {
            $articles = Article::all();
            $couleurs = Couleur::all();
            $tailles = Taille::all();
            $campagnes = Campagne::all();

            //Les champs du update (nom, type, description, prix, quantite_max)

            $article->nom = $request->nom;
            $article->type = $request->type;
            $article->description = $request->description;
            $article->quantite_max = $request->quantite_max;
            $article->prix = $request->prix;

            $article->save();

            return redirect()->route('accueil')->with('message', "Modification de " . $article->nom . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->with('message', 'La modification n\'a pas fonctionnée');
        }

        return redirect()->route('accueil');
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

            //Les champs du update (nom, type, description)

            $article->nom = $request->nom;
            $article->type = $request->type;
            $article->description = $request->description;

            $article->save();

            return redirect()->route('accueil')->with('message', "Modification de " . $article->nom . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->with('message', 'La modification n\'a pas fonctionnée');
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
        $article = Article::findOrFail($id);
        
        if (Auth::user()->type != 'admin') 
        {            
            return redirect()->back();
        }

        if ($article)
        {
            DB::transaction(function () use ($article)
            {

                // Supprimer les entrées dans la table 'article_campagne_commande'
                DB::table('article_campagne_commande')
                    ->where('article_campagne_id', $article->id)
                    ->delete();

                
                
                // Supprimer les entrées dans la table 'article_campagne'
                DB::table('article_campagne')
                    ->where('article_id', $article->id)
                    ->delete();

                // Supprimer l'article
                $article->delete();
            });

            return redirect()->route('accueil')
                ->with('success', 'Article supprimé avec succès.');
        }

        return redirect()->route('articles.index')
            ->with('error', 'Article non trouvé.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Se passer l'id de l'article et de la campagne
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
                        return redirect()->route('accueil')->with('message', 'L\'ajout n\'a pas fonctionné');
                    }

                    $article->image = $nomFichierUnique;
                    $article->save();
                }

                return redirect()->route('accueil')->with('message', "La liaison entre l'article " . $article->nom . " à la campagne " . $campagne->nom_campagne . "  a réussi!");
            
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->with('message', 'L\'ajout n\'a pas fonctionné');
        }

       
    }


}
