<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\DemandeService;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    //
    public function store(Request $request)
{
    $validated = $request->validate([
        'demande_id' => 'required|integer',
        'commentaire' => 'required|string'
    ]);

    // Retrieve the demand based on demande_id
    $demande = DemandeService::findOrFail($validated['demande_id']);
    
    // Access the client_id and partenaire_id from the demand
    $client_id = $demande->client_id;
    $partenaire_id = $demande->partenaire_id;

    // Create the new comment
    Commentaire::create([
        'id_dem_ser' => $validated['demande_id'],
        'commentaire' => $validated['commentaire'],
        'id_cli' => $client_id,  // Use client_id from the demand
        'id_part' => $partenaire_id,  // Include partner_id in the comment
        'sendby' => 'client',
        'date_saisie' => now()
    ]);

    return back()->with('success', 'Commentaire ajouté avec succès.');
}

}
