<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['date_commande'];

    
    //Méthodes pour créer le lien de jointure

    //Jointure avec la table ArticleCampagne
    public function articles_campagnes()
    {
        return $this->belongsToMany('App\Models\ArticleCampagne');
    }

    //Jointure avec la table Usager
    public function usagers()
    {
        return $this->belongsToMany('App\Models\Usager');
    }
}
