<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    //
    public function store(Request $request)
    {
        $article_campagne = $request->input('article_campagne_id');
    }
}
