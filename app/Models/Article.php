<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //'couleur_id', 'taille_id'
    protected $fillable = ['image', 'nom', 'type'];
}
