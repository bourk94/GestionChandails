<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCampagneCommande extends Model
{
    use HasFactory;

    protected $fillable = ['commande_id', 'article_campagne_id'];

   
    
}
