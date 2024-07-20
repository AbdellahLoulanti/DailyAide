<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires'; // S'assurer que cela correspond au nom de votre table de commentaires

    // Définir les champs qui peuvent être assignés en masse
    protected $fillable = [
        'id_cli', 
        'id_part', 
        'id_dem_ser', 
        'commentaire', 
        'sendby', 
        'date_saisie',
        // Vous pourriez avoir d'autres champs ici selon votre schéma de base de données
    ];

    public $timestamps = false;
    // Si vous utilisez des dates autres que created_at et updated_at, vous devriez les indiquer
    // protected $dates = [
    //     'date_saisie',
    // ];

    // Définir la relation avec la table partenaires
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'id_part');
    }

    // Définir la relation avec la table clients
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cli');
    }

    // Définir la relation avec la table demande_services
    public function demandeService()
    {
        return $this->belongsTo(DemandeService::class, 'id_dem_ser');
    }

    // Ajouter d'autres méthodes personnalisées ou logique métier ici si nécessaire
}
