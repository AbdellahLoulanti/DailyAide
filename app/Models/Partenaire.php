<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partenaire extends Authenticatable
{

    use HasFactory;
    protected $table = 'partenaires'; // Ensure this is correctly set

    protected $fillable = [
        'partenaire_id','service_id','nom','prenom','image','domaine_expertise', 'email', 'password','telephone' ,'region', 'services', 'disponibilite','model_pricing','expertise_years',
    ];

    public function scopeFilter($query, array $filters){
        if ($filters['tag'] ?? false){
           $query->where('domaine_expertise', 'like','%'. request('tag').'%');
        }
        if ($filters['search'] ?? false){
           $query->where('nom','LIKE','%'. request('search').'%') 
           -> orWhere('prenom','LIKE','%'. request('search').'%')
           ->orWhere('region','LIKE','%'. request('search').'%')
           ->orWhere('domaine_expertise','LIKE','%'. request('search').'%');
       }
    }
    public function demandesServices()
    {
        return $this->hasMany(DemandeService::class, 'partenaire_id');
    }

    // public function services()
    // {
    //     return $this->belongsToMany(Service::class, 'service_id');
    // }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'services', 'partenaire', 'service_id');
    }
}

