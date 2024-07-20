<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('cssfiles/profile.css')}}" >

    <title>Profil du Client</title>

</head>
<body>
<div class="container">
    <div class="profile-header">
        <h1>Profil de {{ $client->prenom }}</h1>
    </div>
    <div class="profile-picture">
<img src="{{ asset('storage/' . $client->image) }}" alt="Profile Image">
    </div>
    <div class="profile-info">
        <div><strong>Nom:</strong> {{ Auth::guard('client')->user()->nom }}</div>
<div><strong>Prénom:</strong> {{ Auth::guard('client')->user()->prenom }}</div>
<div><strong>Email:</strong> {{ Auth::guard('client')->user()->email }}</div>
<div><strong>Téléphone:</strong> {{ Auth::guard('client')->user()->telephone }}</div>
<div><strong>Adresse:</strong> {{ Auth::guard('client')->user()->adresse }}</div>
<div><strong>Région:</strong> {{ Auth::guard('client')->user()->region }}</div>

        <!-- Ajoutez ici d'autres informations du profil si nécessaire -->
    </div>
    <div class="button-group">
        <button onclick="history.back()" class="button btn-secondary">Retour</button>
        
    </div>

</div>
</body>
</html>
