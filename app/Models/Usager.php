<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class Usager extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'nom',
        'prenom',
        'no_telephone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Jointure avec la table Commande
    //Un usager (Client) peut faire plusieurs commande, une commande appartient à un seul usager (Client)
    public function commandes()
    {
        return $this->hasMany('App\Models\Commande');
    }

    //Jointure avec la table Campagne
    //Un usager (Admin) peut créer une ou plusieurs campagne(s), une campagne est créée par un seul usager (Admin)
    public function campagnes()
    {
        return $this->hasMany('App\Models\Campagne');
    }

    //Jointure avec la table Campagne_Modifier
    //Un usager (Admin) peut modifier une ou plusieurs campagnes, une campagne peut être modifiée par un ou plusieurs usagers (Admin)
    public function campagnes_modifier()
    {
        return $this->belongsToMany('App\Models\Campagne');
    }
}
