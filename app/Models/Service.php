<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
       'service_id', 'partenaire_id','categorie', 'nom', 'description', 'prix', 'duree',
    ];

    public function partenaire()
    {
        return $this->belongsToMany(Partenaire::class, 'partenaire_id');
    }

    public function demandesServices()
    {
        return $this->hasMany(DemandeService::class, 'service_id');
    }

}

