<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeService extends Model
{
    protected $fillable = [
        'demande_id', 'client_id', 'partenaire_id', 'service_id','titre','adresse', 'date', 'statut', 'description', 'duree','typeService','dateservice',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'partenaire_id');
    }

    // public function service()
    // {
    //     return $this->belongsTo(Service::class, 'service_id');
    // }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'demande_id');
    }
    public function service()
{
    return $this->belongsTo(Service::class, 'service_id');  
}
// In DemandeService model



}

