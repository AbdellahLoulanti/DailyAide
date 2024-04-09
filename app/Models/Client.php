<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $fillable = [
        'nom', 'prenom','image','email', 'password','telephone', 'adresse', 'region',
    ];

    public function demandesServices()
    {
        return $this->hasMany(DemandeService::class, 'client_id');
    }
}

