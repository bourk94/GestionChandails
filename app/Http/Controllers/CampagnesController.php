<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\Article;
use App\Models\Couleur;
use App\Models\Taille;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CampagneRequest;
use App\Models\Commande;
use Illuminate\Support\Facades\File;

class CampagnesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $couleurs = Couleur::all();
        $tailles = Taille::all();
        $campagnes = Campagne::all();
        $commandes = Commande::all();
        
        return view('accueil', compact('articles', 'couleurs', 'tailles', 'campagnes', 'commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::all();

        return view('campagnes.createCampagne', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampagneRequest $request)
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
