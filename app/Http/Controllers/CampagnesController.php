<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\Article;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\Usager;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CampagneRequest;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CampagnesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campagnes = Campagne::all();
        $articles = DB::table('articles')
            ->join('article_campagne', 'article_campagne.article_id', '=', 'articles.id')
            ->join('campagnes', 'article_campagne.campagne_id', '=', 'campagnes.id')
            ->select(
                'articles.id as article_id',
                'articles.nom as nom',
                'articles.description as description',
                'article_campagne.prix as prix',
                'articles.type as type',
                'article_campagne.image as image',
                'article_campagne.quantite_max as quantite',
                'article_campagne.id as article_campagne_id'
            )
            ->where('campagnes.statut', '=', 'en cours')
            ->groupBy('articles.id', 'articles.nom', 'articles.description', 'article_campagne.prix', 'articles.type', 'article_campagne.quantite_max', 'article_campagne.image', 'article_campagne.id')
            ->get();

        $couleurs = DB::table('couleurs')
            ->distinct()
            ->join('article_campagne', 'article_campagne.couleur', '=', 'couleurs.id')
            ->join('articles', 'article_campagne.article_id', '=', 'articles.id')
            ->Select(
                'couleurs.nom_couleur as nom_couleur',
                'couleurs.id as couleur_id',
                'couleurs.code_couleur as code_couleur',
                'articles.id as article_id',
            )
            ->get();
        $tailles = DB::table('tailles')
            ->distinct()
            ->join('article_campagne', 'article_campagne.taille', '=', 'tailles.id')
            ->join('articles', 'article_campagne.article_id', '=', 'articles.id')
            ->Select(
                'tailles.format as format',
                'tailles.id as taille_id',
                'articles.id as article_id',
            )
            ->get();

        $usagers = Usager::all();

        $articles_campagnes = DB::table('article_campagne')
            ->join('articles', 'article_campagne.article_id', '=', 'articles.id')
            ->join('campagnes', 'article_campagne.campagne_id', '=', 'campagnes.id')
            ->join('couleurs', 'article_campagne.couleur', '=', 'couleurs.id')
            ->join('tailles', 'article_campagne.taille', '=', 'tailles.id')
            ->get();



        return view('accueil', compact('campagnes', 'articles', 'couleurs', 'tailles', 'usagers', 'articles_campagnes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::all();
        $campagnes = Campagne::all();

        return view('campagnes.createCampagne', compact('articles', 'campagnes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampagneRequest $request)
    {
        try {
            $campagne = new Campagne($request->all());

            $campagne->save();

            return redirect()->route('accueil')->with('message', "Ajout de la campagne " . $campagne->date_debut . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné!']);
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function storeArticleCampagneCommande(Request $request)
    // {
    //     try {
    //         $campagne = new Campagne($request->all());
    //         $campagne->save();

    //         $article = Article::find($request->article_id);
    //         $article->campagnes()->attach($campagne->id);

    //         $couleur = Couleur::find($request->couleur_id);
    //         $couleur->campagnes()->attach($campagne->id);

    //         $taille = Taille::find($request->taille_id);
    //         $taille->campagnes()->attach($campagne->id);

    //         return redirect()->route('accueil')->with('message', "Ajout de la campagne " . $campagne->date_debut . " réussi!");
    //     } catch (\Throwable $e) {
    //         Log::debug($e);
    //         return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné!']);
    //     }
    // }
}
