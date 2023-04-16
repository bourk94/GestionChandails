<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class Usager extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    protected $hidden = ['password'];

    public function usagerable()
    {
        return $this->morphTo();
    }

    public function isAdmin()
    {
        return $this->usagerable_type === 'App\Models\Administrateur';
    }

    public function isClient()
    {
        return $this->usagerable_type === 'App\Models\Client';
    }

    public function isSuperAdmin()
    {
        return $this->usagerable_type === 'App\Models\SuperAdmin';
    }
}
