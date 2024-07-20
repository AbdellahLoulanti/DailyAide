<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Illuminate\Http\Request; // Correct namespace
use App\Models\Client;
use App\Models\DemandeService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Partenaire;
use App\Mail\PartenaireNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceRequestCreated;



class DemandeServiceController extends Controller
{
    public function formDemande()
{
    $client = Auth::guard('client')->user();
    // Assurez-vous que le guard 'client' est configuré correctement
    $services = Service::where('categorie', 'bricolage')->get();
    return view('client.formDemande',compact('client','services')); // retourne la vue de connexion
}
public function formDemandeAnimaux()
{
    $client = Auth::guard('client')->user();
    $services = Service::where('categorie', 'animaux')->get(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.formAnimaux',compact('client','services')); // retourne la vue de connexion
}

public function formDemandeMenage()
{
    $client = Auth::guard('client')->user();
    $services = Service::where('categorie', 'menage')->get(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.formMenage',compact('client','services')); // retourne la vue de connexion
}
public function formDemandeCours()
{
    $client = Auth::guard('client')->user();
    // Assurez-vous que le guard 'client' est configuré correctement
    $services = Service::where('categorie', 'cours')->get();

    return view('client.formCours',compact('client','services')); // retourne la vue de connexion
}
public function service()
{
    return $this->belongsTo(Service::class, 'service_id');
}

public function MesDemandes()
{
    // Assurez-vous que l'utilisateur est connecté avant de faire une requête.

    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement
    $client_id = Auth::guard('client')->id();
    $demandes = DemandeService::with('service')
    ->where('client_id', $client_id)
    ->get();
    return view('client.MesDemandes', compact('demandes','client'));// Renvoie la vue avec les demandes de l'utilisateur
}


// public function store(Request $request)
 //{

//     // Validation des données
//     $validatedData = $request->validate([
//         'titre' => 'required|string|max:255',
//         'adresse' => 'required|string|max:255',
//         'description' => 'nullable|string',
//         'date' => 'date', // Si vous attendez une date du formulaire
//         'statut' =>'string',
//         'duree'=>'number',
//         'typeService' => 'required|string|max:255',


//         // Ajoutez toutes les autres règles de validation nécessaires ici
//     ]);

//     // Création de la demande de service
//     $demandeService = new DemandeService([
//         'client_id' => Auth::guard('client')->id(), // Assurez-vous que l'utilisateur est connecté
//         'partenaire_id' => null, // ou une logique pour définir le partenaire
//         'service_id' => null,
//         'titre' => $request->titre,
//         'adresse' => $request->adresse,
//         'description' => $request->description,
//         'date' => now(), // ou une date fournie par l'utilisateur
//         'statut' => 'en_attente', // un statut initial pour la demande
//         'duree' =>3,
//         'typeService' =>$request->typeService,
//     ]);
//     $demandeService->save();

//     // Redirection ou retour de réponse
//     return redirect()->route('client.dashboard')->with('success', 'Demande créée avec succès.');
// }



public function destroy($id)
{
    $demande = DemandeService::findOrFail($id);

    $demande->delete();

    return redirect()->route('client.MesDemandes')->with('success', 'La demande a été supprimée.');
}


public function show($id)
{
    $client = Auth::guard('client')->user();
    $demande = DemandeService::findOrFail($id);
    return view('client.showDemande', compact('demande','client'));
}


public function store(Request $request)
{
    // Stocker les données du formulaire dans la session
    $request->session()->put('formAnimauxData', $request->all());

    // Rediriger pour choisir un partenaire
    return redirect()->route('select.partenaire');
}

public function finalizeDemande(Request $request)
{
    // Récupérer les données du formulaire stockées dans la session
    $formData = $request->session()->get('formAnimauxData');
    // Vérification de l'existence des données essentielles

    // Récupérer l'ID du partenaire à partir du corps de la requête POST
    $partenaireId = $request->input('partenaire_id');

    // Ajouter l'ID du partenaire aux données du formulaire
    $formData['partenaire_id'] = $partenaireId;
    $formData['client_id'] = Auth::guard('client')->id();  // S'assurer que l'utilisateur est connecté
    $formData['date'] = $formData['date'] ?? now();
    $formData['statut'] = $formData['statut'] ?? 'en_attente';

    // Valider les données du formulaire
    // $validatedData = $request->validate([
    //     'titre' => 'required|string|max:255',
    //     'adresse' => 'required|string|max:255',
    //     'description' => 'nullable|string',
    //     'date' => 'date',
    //     'statut' => 'string',
    //     'duree' => 'numeric',
    //     'typeService' => 'required|string|max:255',
    //     'client_id' => 'required',
    //     'partenaire_id' => 'required',
    //     // Assurez-vous d'inclure toutes les validations nécessaires ici
    // ]);

    // Créer la demande de service avec les données complètes
    $demandeService = new DemandeService($formData);
    $demandeService->save();

    $partenaire = Partenaire::find($formData['partenaire_id']);
    // Envoyer l'email
    Mail::to($partenaire->email)->send(new ServiceRequestCreated($demandeService));

    // Nettoyer la session après l'utilisation
    $request->session()->forget('formAnimauxData');

    // Rediriger vers le tableau de bord avec un message de succès
    return redirect()->route('client.dashboard')->with('success', 'Demande créée avec succès.');
}





}
