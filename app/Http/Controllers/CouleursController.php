<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouleurRequest;
use Illuminate\Http\Request;
use App\Models\Couleur;
use Illuminate\Support\Facades\Log;

class CouleursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs = Couleur::all();

        return view('couleurs.index', compact('couleurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('couleurs.createCouleur');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouleurRequest $request)
    {
        try
        {
            $couleur = new Couleur($request->all());
            $couleur->save();

            return redirect()->route('accueil')->with('message', "Ajout de la couleur " . $couleur->nom_couleur . " réussi!");

        }
        catch(\Throwable $e)
        {
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
        $couleur = Couleur::findOrFail($id);

        return view('couleurs.modifierCouleur', compact('couleur'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouleurRequest $request, $id)
    {
        try
        {
            $couleur = Couleur::findOrFail($id);

            //Les champs du update (nom_couleur, code_couleur)

            $couleur->nom_couleur = $request->nom_couleur;
            $couleur->code_couleur = $request->code_couleur;            

            $couleur->save();
            
            return redirect()->route('accueil')->with('message', "Modification de la couleur " . $couleur->nom_couleur . " réussi!");
        }
        catch(\Throwable $e)
        {
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
        try
        {
            $couleur = Couleur::findOrFail($id);

            //Gérer le lien avec la table de jointure (Article_Campagne)
            //$couleur->article_campagnes()->detach();

           
            $couleur->delete();
            
            return redirect()->route('accueil')->with('message', "Suppression de " . $couleur->nom_couleur . " réussi!");
        }
        catch(\Throwable $e)
        {
            Log::debug($e);
            return redirect()->route('accueil')->withErrors(['La suppression n\'a pas fonctionnée']);            
        }

        return redirect()->route('accueil');
    }
}
