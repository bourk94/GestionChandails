<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = DB::table('commandes')
            ->join('usagers', 'commandes.usager_id', '=', 'usagers.id')
            ->join('article_campagne_commande', 'commandes.id', '=', 'article_campagne_commande.commande_id')
            ->join('article_campagne', 'article_campagne_commande.article_campagne_id', '=', 'article_campagne.id')
            ->join('articles', 'article_campagne.article_id', '=', 'articles.id')
            ->join('couleurs', 'article_campagne.couleur_id', '=', 'couleurs.id')
            ->join('tailles', 'article_campagne.taille_id', '=', 'tailles.id')
            ->join('campagnes', 'article_campagne.campagne_id', '=', 'campagnes.id')
            ->select('commandes.date_commande as date',
             'articles.nom as nom_article',
             'article_campagne_commande.quantite as quantite',
              'couleurs.nom_couleur as nom_couleur',
              'couleurs.code_couleur as code_couleur',
               'tailles.format as format', 
               'usagers.id as usager_id',
               'campagnes.nom_campagne as nom_campagne')
            ->get();

        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('commandes.createCommande');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
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
        try {
            $commande = Commande::find($id);
            $commande->delete();
            return redirect()->route('accueil')->with('message', "Suppression de la commande " . $commande->date_commande . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->withErrors(['La suppression n\'a pas fonctionné!']);
        }

        return redirect()->route('accueil');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Revoir cette méthode la classe est le problème
    // public function storeArticleCampagneCommande(Request $request)
    // {
    //     try {
    //         $article =  new Article($request->article_id);
    //         $commande = new Commande($request->commande_id);

    //         $commande->articles()->attach($article);

    //        // return redirect()->route('accueil')->with('message', "Ajout de l'article  réussi!");
    //     } catch (\Throwable $e) {
    //         Log::debug($e);
    //         return redirect()->route('')->withErrors(['La liaison'.' n\'a pas fonctionné!']);
    //     }

    //     return redirect()->route('accueil');
    // }
}
