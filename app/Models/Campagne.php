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
    // public function articles()
    // {
    //     return $this->belongsToMany('App\Models\Article');
    // }

    //Jointure avec la table Usager
    //Un usager (Admin) peut créer une ou plusieurs campagnes, une campagne est créee par un seul usager (Admin)
    public function usagers()
    {
        return $this->belongsTo('App\Models\Usager');
    }

    //Jointure avec la table Campagne_Modifier
    //Un usager (Admin) peut modifier une ou plusieurs campagne(s), une campagne peut être modifier par un ou plusieurs usagers (Admin)
    public function campagnes_modifier()
    {
        return $this->belongsToMany('App\Models\Usager');
    }

    //Jointure avec la table Article_Campagne
    public function articles_campagnes()
    {
        return $this->belongsToMany('App\Models\Article', 'article_campagne', 'campagne_id', 'article_id');
    }
}
