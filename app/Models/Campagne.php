<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;

    protected $fillable = ['nom_campagne', 'date_debut_campagne', 'date_fin_campagne', 'date_debut_collecte', 'date_fin_collecte', 'progression', 'statut'];

    //Jointure avec la table Article
    //Une campagne peut posséder un ou plusieurs articles, un article peut faire partie d'une ou plusieurs campagnes
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    //Jointure avec la table Usager
    //Une
}
