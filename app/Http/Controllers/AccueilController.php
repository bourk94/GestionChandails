<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;
use App\Models\Couleurs;


class AccueilController extends Controller
{
    public function index()
    {
        $couleurs = Couleur::all();
        return view('accueil',compact('couleurs'));
    }
}
