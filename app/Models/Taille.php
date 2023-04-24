<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;

    protected $fillable = ['format'];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
        
    }
}
