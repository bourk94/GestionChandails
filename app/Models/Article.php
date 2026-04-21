<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'description'];

    //Méthodes pour créer le lien de jointure

    //Jointure avec la table Campagne
    /**
     *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany 
     */
    // public function campagnes() : BelongsToMany
    // {
    //     return $this->belongsToMany('App\Models\Campagne');
    // }

    //Jointure avec la table Article_Campagne
    public function articles_campagnes()
    {
        return $this->belongsToMany('App\Models\Campagne', 'article_campagne', 'article_id', 'campagne_id');
    }
}
