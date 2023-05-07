<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;


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
            ->join('couleurs', 'article_campagne.couleur', '=', 'couleurs.id')
            ->join('tailles', 'article_campagne.taille', '=', 'tailles.id')
            ->join('campagnes', 'article_campagne.campagne_id', '=', 'campagnes.id')
            ->select(
                'commandes.date_commande as date',
                'articles.nom as nom_article',
                'article_campagne_commande.quantite as quantite',
                'article_campagne_commande.montant_total as montant',
                'couleurs.nom_couleur as nom_couleur',
                'couleurs.code_couleur as code_couleur',
                'tailles.format as format',
                'usagers.id as usager_id',
                'campagnes.nom_campagne as nom_campagne'
            )
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
        try {
            $cartItems = \Cart::getContent();
            DB::select('CALL createCommande(?)', [Auth::user()->id]);
            $lastIdCommande = DB::table('commandes')->latest('id')->first();
        foreach ($cartItems as $item) {

            $article_campagne = DB::table('article_campagne')
                ->join('campagnes', 'article_campagne.campagne_id', '=', 'campagnes.id')
                ->where('article_id', $item->id)
                ->where('campagnes.statut', 'like', 'en cours')
                ->where('couleur', $item->attributes->id_couleur)
                ->where('taille', $item->attributes->id_taille)->get();

            if (count($article_campagne) > 0) {
                $procedureCreateCommandeArticle = DB::select('CALL createCommandeArticle (?, ?, ?, ?)', [
                    $lastIdCommande->id,
                    $request->idUsager,
                    $item->id,
                    $item->quantity,
                ]);

                DB::prepareBindings($procedureCreateCommandeArticle);
                DB::commit();     
                } 
            else {
                return redirect()->route('cart.list')->with('message', 'L\'article n\'est pas disponible dans la couleur ' . $request->couleur . ' et la taille ' . $request->taille . '.');
            }
        }
        \Cart::clear();
        return redirect()->route('cart.list')->with('message', "Vous avez bien commandé l'article!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('cart.list')->with('message', 'Une erreur est survenue lors de votre commande.');
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
