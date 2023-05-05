<?php

namespace App\Http\Controllers;

use App\Http\Requests\TailleRequest;
use App\Models\Taille;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TaillesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tailles = Taille::all();

        return view('tailles.index', compact('tailles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tailles.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TailleRequest $request)
    {
        try {
            $taille = new Taille($request->all());
            $taille->save();

            return redirect()->route('tailles')->with('message', "Ajout de la taille " . $taille->format . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('tailles')->withErrors(['L\'ajout n\'a pas fonctionné!']);
        }

        return redirect()->route('tailles');
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
        $taille = Taille::findOrFail($id);

        return view('tailles.modifierTaille', compact('taille'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TailleRequest $request, $id)
    {
        try {
            $taille = Taille::findOrFail($id);

            //Le champs du update (format)

            $taille->format = $request->format;

            $taille->save();

            return redirect()->route('tailles')->with('message', "Modification de la taille " . $taille->format . " réussi!");
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('tailles')->withErrors(['La modification n\'a pas fonctionnée']);
        }

        return redirect()->route('tailles');
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
            $taille = Taille::findOrFail($id);
            $taille->delete();

            return redirect()->route('tailles')->with('message', "Suppression de " . $taille->format . " réussi!");

        } catch (\Throwable $e)
        {
            Log::debug($e);
            return redirect()->route('tailles')->with('message', "La suppression n'a pas fonctionnée.  Il est impossible de supprimer une taille attachée à un article!");
        }

        return redirect()->route('tailles');
    }
}
