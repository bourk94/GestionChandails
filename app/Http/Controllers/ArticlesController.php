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
        try
        {
            $article = new Article($request->all());

            $uploadedFile = $request->file('image');

            $nomFichierUnique = str_replace(' ', '_', $article->nom) . '-' . uniqid() . '.' . $uploadedFile->extension();

            try
            {
                //If pour gérer le tri des images selon le type de l'article

                if ($article->type == "chandail")
                {
                    $request->image->move(public_path('img/chandails'), $nomFichierUnique);
                }
                else if ($article->type == "kangourou")
                {
                    $request->image->move(public_path('img/kangourou'), $nomFichierUnique);
                }
                else
                {
                    $request->image->move(public_path('img/autres'), $nomFichierUnique);
                }
                    
            }
            catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $e)
            {
                Log::error("Erreur lors du téléversement du fichier. ", [$e]);
            }

            $article->image = $nomFichierUnique;
            $article ->save();

            
            return redirect()->route('accueil')->with('message', "Ajout de l'article " . $article->nom . " réussi!");
        }
        catch (\Throwable $e)
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
}
