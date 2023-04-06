<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['nom_client', 'prenom_client', 'adresse_client', 'email', 'telephone_client'];

    protected $hidden = ['password'];
}


