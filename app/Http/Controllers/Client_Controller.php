<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request; // Correct namespace
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Client_Controller extends Controller
{
    public function create()
    {
        // Return the view with the signup form
        return view('client.client_signup');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validate that it's an image file if provided
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required', // The 'confirmed' rule checks if 'password_confirmation' matches
            'telephone' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'region' => 'required|string|max:255',
        ]);

        // Handle file upload
        $imagePath = null;
if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('images', 'public'); // Correction ici, utiliser 'images'
}

        // Insert the new client record into the database


        $client = new Client([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'image' => $imagePath, // Store image path or null
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'region' => $request->region,
        ]);

        $client->save(); // Save the client to the database

        // Redirect to the form or another page with a success message
        Auth::guard('client')->login($client);
        return redirect()->intended('/dashboard');
    }


// Ajoutez les méthodes suivantes dans votre Client_Controller (assurez-vous que le nom de la classe correspond à celui de votre fichier)

public function showLoginForm()
{
    return view('client.login'); // retourne la vue de connexion
}
public function dashboard()
{
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.dashboard',compact('client')); // retourne la vue de connexion
}
public function demande()
{
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    return view('client.demande',compact('client')); // retourne la vue de connexion
}
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Trouver le client par e-mail
    $client = Client::where('email', $credentials['email'])->first();

    if ($client && Hash::check($credentials['password'], $client->password)) {
        // Si le mot de passe est correct, connectez le client
        Auth::guard('client')->login($client);
        return redirect()->intended('/dashboard');
    }

    // Si l'authentification échoue, renvoie à la page de connexion avec une erreur
    return redirect()->back()->with('error', 'Adresse e-mail ou mot de passe incorrect.');
}


public function edit(){

    $client = Auth::guard('client')->user();
    return view('client.edit', ['client'=> $client]);

}


public function update(Request $request)
{
    
    $client = Auth::guard('client')->user(); 
    
    // Validate the request data
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'email' => 'required|string|email|max:255',
        'telephone' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'region' => 'required|string|max:255',
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $client->image = $imagePath; // Update image path if a new file is uploaded
    }

    // Update the client record with new data, excluding the password
    $client->nom = $request->nom;
    $client->prenom = $request->prenom;
    if ($request->email !== $client->email) {
        $client->email = $request->email;
    }
    $client->telephone = $request->telephone;
    $client->adresse = $request->adresse;
    $client->region = $request->region;

    $client->save(); // Save the updated client to the database

    // Redirect to a page with a success message
    return redirect()->route('client.profile')->with('success', 'Profile updated successfully.');
}




public function showProfile()
{
    // Récupérer l'utilisateur client actuellement connecté
    $client = Auth::guard('client')->user(); // Assurez-vous que le guard 'client' est configuré correctement

    // Passer les données du client à la vue de profil
    return view('client.profile', compact('client'));
}


public function logout(Request $request){
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

     return redirect('/')->with('message','You\'ve been logged out');
}
public function showProfileforpart($id)
{
    $client = Client::findOrFail($id); // Fetch the client
    return view('client.profilecl', compact('client')); // Assuming you have a view for this
}


}
