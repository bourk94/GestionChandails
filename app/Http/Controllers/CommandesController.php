<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\Log;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $commandes = Commande::all();

        // return view('commandes.index', compact('commandes'));
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


            $commande = new Commande($request->all());
            $commande->save();

            //return redirect()->route('accueil')->with('message', "Ajout de la commande " . $commande->date_commande . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            //return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné!']);
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
        try{
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
    public function storeArticleCampagneCommande(Request $request)
    {
        try {
            $articlecampagnecommande = new ArticleCampagneCommande($request->all());
            $articlecampagnecommande->save();

            return redirect()->route('accueil')->with('message', "Ajout de l'article " . $articlecampagnecommande->nom . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('accueil')->withErrors(['L\'ajout n\'a pas fonctionné!']);
        }

        return redirect()->route('accueil');
    }
}
