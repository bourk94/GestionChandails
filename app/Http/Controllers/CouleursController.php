<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;
use App\Models\Couleurs;

class CouleursController extends Controller
{
    //
    public function index()
    {
        $couleurs = Couleur::all();
        return view('couleurs.index',compact('couleurs'));
    }

    public function create()
    {
        return view('couleurs.create');
    }

    public function store(Request $request)
    {
        $couleur = new Couleur();
        $couleur->nom = $request->nom;
        $couleur->save();
        return redirect()->route('couleurs.index');
    }

    public function edit($id)
    {
        $couleur = Couleur::find($id);
        return view('couleurs.edit',compact('couleur'));
    }

    public function update(Request $request, $id)
    {
        $couleur = Couleur::find($id);
        $couleur->nom = $request->nom;
        $couleur->save();
        return redirect()->route('couleurs.index');
    }
}
