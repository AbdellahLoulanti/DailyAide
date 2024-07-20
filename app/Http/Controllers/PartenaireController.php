<?php



namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\DemandeService;

use App\Models\Client;
use App\Models\Commentaire;


class PartenaireController extends Controller
{

    use HasFactory;
    public function create()
    {
        $services = Service::all()->groupBy('categorie');

        return view('partenaire.partenaire_signup', compact('services'));
    }
    
    // public function services()
    // {
    //     return $this->belongsToMany(Service::class, 'partenaire_service', 'partenaire_id', 'service_id');
    // }
    

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'email' => 'required|string|email|max:255|unique:partenaires',
            'password' => 'required',
            'telephone' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'Category' => 'required|array',
            'availability' => 'required|string|max:255',
            'pricing_Model' => 'required|string|max:255',
            'services' => 'required|array', // Assurez-vous que cela est bien envoyé par le formulaire
        ]);
        // Handle file upload
        $imagePath = null;
if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('images', 'public'); // Correction ici, utiliser 'images'
}

// Prepare the categories
$categories = $request->input('Category', []);
$categoriesString = json_encode($categories); // Convert array to JSON string

// $services = $request->input('services', []);
// $servicesString = json_encode($services);


        // Insert the new Partenaire record into the database


        // $Partenaire = new Partenaire([
        //     'nom' => $request->nom,
        //     'prenom' => $request->prenom,
        //     'image' => $imagePath, // Store image path or null
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password), // Hash the password
        //     'telephone' => $request->telephone,
            
        //     'region' => $request->region,
        //     'expertise_years' => $request->experience_years,
        //     'disponibilite' => $request->availability,
        //     'model_pricing' => $request->pricing_Model,
        //     // 'description' => $request->description,
        //     'domaine_expertise' => $categoriesString,
        //     'services' => $servicesString,
        // ]);
        $partenaire = new Partenaire([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'image' => $imagePath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'region' => $request->region,
            'expertise_years' => $request->experience_years,
            'disponibilite' => $request->availability,
            'model_pricing' => $request->pricing_Model,
            'domaine_expertise' => json_encode($request->Category),
            'services' => json_encode($request->services), // Encode services array to JSON string
        ]);
    
        $partenaire->save();
    
        Auth::guard('Partenaire')->login($partenaire);
        return redirect()->intended('/partenaire/dashboard');
    }


    public function showLoginForm()
{
    return view('partenaire.partenaire_login'); // retourne la vue de connexion
}


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Trouver le client par e-mail
    $partenaire = partenaire::where('email', $credentials['email'])->first();

    if ($partenaire && Hash::check($credentials['password'], $partenaire->password)) {
        // Si le mot de passe est correct, connectez le client
        Auth::guard('Partenaire')->login($partenaire);
        return redirect()->intended('/partenaire/dashboard');
    }

    // Si l'authentification échoue, renvoie à la page de connexion avec une erreur
    return redirect()->back()->with('error', 'Adresse e-mail ou mot de passe incorrect.');
}
public function showProfile()
{
    // Récupérer l'utilisateur client actuellement connecté
    $partenaire = Auth::guard('Partenaire')->user(); 

    // Passer les données du client à la vue de profil
    $serviceIds = json_decode($partenaire->services, true);

    // Fetch service names based on these IDs
    $services = Service::whereIn('id', $serviceIds)->pluck('nom')->toArray();
    $formattedServices = implode(' / ', $services); // Convert array of names to a comma-separated string

    return view('partenaire.profile', compact('partenaire', 'formattedServices'));
    // return view('partenaire.profile', compact('partenaire'));
}
public function dashboard()
{
    $partenaire = Auth::guard('Partenaire')->user();

    
    $serviceIds = json_decode($partenaire->services, true);
    $services = Service::findMany($serviceIds)->pluck('nom');
    
    $requests = DemandeService::where('partenaire_id', $partenaire->id)
                              ->where('statut', 'en_attente')
                              ->get(); 

    return view('partenaire.dashboard', compact('partenaire', 'services', 'requests'));
}


public function edit(){

    $partenaire = Auth::guard('Partenaire')->user();
    return view('partenaire.edit', ['partenaire'=> $partenaire]);

}


public function update(Request $request)
{
    
    $partenaire = Auth::guard('Partenaire')->user(); 
    
    // Validate the request data
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validate that it's an image file if provided
        'email' => 'required|string|email|max:255',
        // 'password' => 'required', // The 'confirmed' rule checks if 'password_confirmation' matches
        'telephone' => 'required|string|max:255',
        'region' => 'required|string|max:255',
       
        'availability' => 'required|string|max:255',
        'pricing_Model' => 'required|string|max:255',
        
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $partenaire ->image = $imagePath; // Update image path if a new file is uploaded
    }
    $categories = $request->input('Category', []);
    $categoriesString = json_encode($categories);
    // Update the partenaire  record with new data, excluding the password
    $partenaire ->nom = $request->nom;
    $partenaire ->prenom = $request->prenom;
    if ($request->email !== $partenaire ->email) {
        $partenaire ->email = $request->email;
    }
    $partenaire ->telephone = $request->telephone;

    $partenaire ->region = $request->region;
    $partenaire ->expertise_years = $request->experience_years;
    $partenaire ->model_pricing = $request->pricing_Model;
    $partenaire ->disponibilite = $request->availability;
   
    
   

    $partenaire ->save(); // Save the updated client to the database

    // Redirect to a page with a success message
    return redirect()->route('partenaire.profile')->with('success', 'Profile updated successfully.');
}



public function editPasswordform(){
    $partenaire = Auth::guard('Partenaire')->user();
    return view('partenaire.edit_password', ['partenaire'=> $partenaire]);

}

public function editPassword(Request $request)
{
    $partenaire = Auth::guard('Partenaire')->user();

    // Validation des données de la requête
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    // Vérifier si le mot de passe actuel est correct
    if (!Hash::check($request->current_password, $partenaire->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    // Mettre à jour le mot de passe
    $partenaire->password = Hash::make($request->new_password);
    $partenaire->save();

    // Redirection vers une page avec un message de succès
    return redirect()->route('partenaire.profile')->with('success', 'Mot de passe mis à jour avec succès.');
}
public function edit_categories(){
    $services = Service::all()->groupBy('categorie');

        return view('partenaire.edit_categories', compact('services'));

    // return view('partenaire.edit_categories', compact('partenaire', 'formattedServices'));
    

}
public function editCategories(Request $request)
{
    $request->validate([
        'Category' => 'required|array',
        'services' => 'required|array',
    ]);

    $partenaire = Auth::guard('Partenaire')->user();

    // Update categories
    $partenaire->domaine_expertise = json_encode($request->Category);
    
    // Update services
    $partenaire->services = json_encode($request->services);

    $partenaire->save();

    return redirect()->route('partenaire.dashboard')->with('success', 'Profile updated successfully.');
}

public function allRequests()
{
    $partenaire = Auth::guard('Partenaire')->user();
    $requests = DemandeService::where('partenaire_id', $partenaire->id)
                              ->where('statut', 'en_attente')
                              ->get();  // Get all pending requests for the logged-in partner

    return view('partenaire.all-requests', compact('requests'));
}


public function acceptRequest($id)
{
    $request = DemandeService::find($id);
    if ($request) {
        $request->statut = 'En cours de traitement';
        $request->save();
        return back()->with('success', 'Demande acceptée.');
    }
    return back()->with('error', 'Demande introuvable.');
}

public function rejectRequest($id)
{
    $request = DemandeService::find($id);
    if ($request) {
        $request->statut = 'Refusée';
        $request->save();
        return back()->with('success', 'Demande refusée.');
    }
    return back()->with('error', 'Demande introuvable.');
}



public function appointment()
{
    $partenaire = Auth::guard('Partenaire')->user(); 
    $appointments = DemandeService::with('client') 
                                  ->where('partenaire_id', $partenaire->id)
                                  ->where('statut', 'En cours de traitement')
                                  ->get(); 

    return view('partenaire.appointment', compact('appointments')); 
}

public function showProfileforpart($id)
{
    $client = Client::findOrFail($id); // Fetch the client
    return view('partenaire.profilecl', compact('client')); // Assuming you have a view for this
}

public function completeAppointment($id)
{
    $appointment = DemandeService::findOrFail($id);
    $appointment->statut = 'Terminer';
    $appointment->save();

    return back();
}



public function historique(){

    $partenaire = Auth::guard('Partenaire')->user(); 
    $id_part = Auth::guard('Partenaire')->id();

    $historique = DemandeService::join('services', 'demande_services.service_id', '=', 'services.id')
                                ->join('clients', 'demande_services.client_id', '=', 'clients.id')
                                ->where('demande_services.statut', 'Terminer')
                                ->orderBy('demande_services.id', 'desc') // Ajout du tri par id en ordre descendant
                                ->get([
                                    'services.categorie',
                                    'services.nom',                                  
                                    'demande_services.id',
                                    'demande_services.dateservice',
                                    'clients.id as client_id',
                                    'clients.nom as client_nom',
                                    'clients.prenom as client_prenom',
                                    'demande_services.statut'
                                ]);

    foreach ($historique as $history) {
    $history->commentaireExiste = Commentaire::where('id_cli', $history->client_id)
                                                ->where('id_part', $id_part)
                                                ->where('id_dem_ser', $history->id)
                                                ->exists();
                                }
    return view('partenaire.historique', compact('historique', 'partenaire'));

}


public function storeCommentaire(Request $request)
{
                           
    //$id_part = auth()->id();
    $partenaire = Auth::guard('Partenaire')->user(); 
    $id_part = Auth::guard('Partenaire')->id();
    //dd($id_part);
//     $commentaireExiste = Commentaire::where('id_cli', $request->id_cli)
//     ->where('id_part', $id_part)
//     ->where('id_dem_ser', $request->id_dem_ser)
//     ->exists();

// if ($commentaireExiste) {
// return back()->with('error', 'Vous avez déjà commenté ce client pour cette demande de service.');
// }



$validatedData = $request->validate([
        'id_cli' => 'required|exists:clients,id',
        'id_dem_ser' => 'required|exists:demande_services,id',
        'commentaire' => 'required|string',
        'sendby' => 'required|in:partenaire,client',
    ]);

    // dd($validatedData);

    // Commentaire::create([
    //     'id_cli' => $request->id_cli,
    //     'id_part' => auth()->user()->id, // ou la méthode appropriée pour obtenir l'ID du partenaire connecté
    //     'id_dem_ser' => $request->id_dem_ser,
    //     'commentaire' => $request->commentaire,
    //     'sendby' => $request->sendby,
    //     'date_saisie' => now(), // Laravel remplira automatiquement `created_at`
    // ]);

    $commentaire = new Commentaire();
    $commentaire->id_cli = $request->id_cli;
    $commentaire->id_part = $id_part; // ou la méthode appropriée pour obtenir l'ID du partenaire connecté
    $commentaire->id_dem_ser = $request->id_dem_ser;
    $commentaire->commentaire = $request->commentaire;
    $commentaire->sendby = $request->sendby;
    $commentaire->date_saisie = now(); // Laravel remplira automatiquement `created_at`

    // Enregistrer le commentaire dans la base de données
    $commentaire->save();
    
    return back()->with('success', 'Votre commentaire a été enregistré.');
}


}
