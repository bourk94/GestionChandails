<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCampagne extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'couleur_id', 'taille_id', 'quantite'];

    //Jointure avec la table Couleur
    public function couleurs()
    {
        return $this->belongsTo('App\Models\Couleur');
    }

    //Jointure avec la table Taille
    public function tailles()
    {
        return $this->belongsTo('App\Models\Taille');
    }

    //Jointure avec la table Commande
    public function commandes()
    {
        return $this->belongsToMany('App\Models\Commande');
    }

    
}
