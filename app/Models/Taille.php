<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;

    protected $fillable = ['format'];

    //Jointure avec la table Article_Campagne
    public function articles_campagnes()
    {
        return $this->hasMany('App\Models\ArticleCampagne');
    }
}
