<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request; // Correct namespace
use App\Models\Client;
use App\Models\DemandeService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DemandeServiceController extends Controller
{
    public function formDemande()
{
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.formDemande',compact('client')); // retourne la vue de connexion
}
public function formDemandeAnimaux()
{
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.formAnimaux',compact('client')); // retourne la vue de connexion
}

public function formDemandeMenage()
{
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.formMenage',compact('client')); // retourne la vue de connexion
}
public function formDemandeCours()
{
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.formCours',compact('client')); // retourne la vue de connexion
}
public function MesDemandes()
{
    // Assurez-vous que l'utilisateur est connecté avant de faire une requête.

    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    $client_id = Auth::guard('client')->id();
    $demandes = DemandeService::where('client_id', $client_id)->get();

    return view('client.MesDemandes', compact('demandes','client'));// Renvoie la vue avec les demandes de l'utilisateur
}
public function store(Request $request)
{

    // Validation des données
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'date', // Si vous attendez une date du formulaire
        'statut' =>'string',
        'duree'=>'number',
        'typeService' => 'required|string|max:255',


        // Ajoutez toutes les autres règles de validation nécessaires ici
    ]);

    // Création de la demande de service
    $demandeService = new DemandeService([
        'client_id' => Auth::guard('client')->id(), // Assurez-vous que l'utilisateur est connecté
        'partenaire_id' => null, // ou une logique pour définir le partenaire
        'service_id' => null,
        'titre' => $request->titre,
        'adresse' => $request->adresse,
        'description' => $request->description,
        'date' => now(), // ou une date fournie par l'utilisateur
        'statut' => 'en_attente', // un statut initial pour la demande
        'duree' =>3,
        'typeService' =>$request->typeService,
    ]);
    $demandeService->save();

    // Redirection ou retour de réponse
    return redirect()->route('client.dashboard')->with('success', 'Demande créée avec succès.');
}



public function destroy($id)
{
    $demande = DemandeService::findOrFail($id);

    $demande->delete();

    return redirect()->route('client.MesDemandes')->with('success', 'La demande a été supprimée.');
}


public function show($id)
{
    $demande = DemandeService::findOrFail($id);
    return view('client.showDemande', compact('demande'));
}



}
