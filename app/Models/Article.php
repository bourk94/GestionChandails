<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //'couleur_id', 'taille_id'
    protected $fillable = ['image', 'nom', 'type'];

    //Méthodes pour créer le lien de jointure

    //Jointure avec la table Campagne
    public function campagnes()
    {
        return $this->belongsToMany('App\Models\Campagne');
    }

    //Jointure avec la table Commande
    public function commandes()
    {
        return $this->belongsToMany('App\Models\Commande');
    }
}
