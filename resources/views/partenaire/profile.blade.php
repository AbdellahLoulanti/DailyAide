<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('cssfiles/profile.css')}}" >

    <title>Profil d'expert</title>

</head>
<body>
<div class="container">
    <div class="profile-header">
        <h1>Profil de {{ $partenaire->prenom }}</h1>
    </div>
    <div class="profile-picture">
<img src="{{ asset('storage/' . $partenaire->image) }}" alt="Profile Image">
    </div>
    <div class="profile-info">
<?php
// Assumer que $domaine_expertise contient la chaîne JSON ["cleaning","Animaux","Cours & Assistance"]
$domaine_expertise = Auth::guard('Partenaire')->user()->domaine_expertise;
// Décoder le JSON en tableau PHP
$expertiseArray = json_decode($domaine_expertise, true);
// Créer une chaîne avec les valeurs séparées par " . "
$formatted_expertise = '  ' . implode('  /  ', $expertiseArray);

?>



<div><strong>Nom:</strong> {{ Auth::guard('Partenaire')->user()->nom }}</div>
<div><strong>Prénom:</strong> {{ Auth::guard('Partenaire')->user()->prenom }}</div>
<div><strong>Email:</strong> {{ Auth::guard('Partenaire')->user()->email }}</div>
<div><strong>Téléphone:</strong> {{ Auth::guard('Partenaire')->user()->telephone }}</div>
<div><strong>Région:</strong> {{ Auth::guard('Partenaire')->user()->region }}</div>
<div><strong>Disponibilite:</strong> {{ Auth::guard('Partenaire')->user()->disponibilite }}</div>
<div><strong>Modèle tarifaire:</strong> {{ Auth::guard('Partenaire')->user()->model_pricing }}</div>
<div><strong>Années d'expérience:</strong> {{ Auth::guard('Partenaire')->user()->expertise_years }}</div>
<!-- <div><strong>Services:</strong> {{ Auth::guard('Partenaire')->user()->description }}</div> -->
<div><strong>Domaine d'expertise:</strong> {{ $formatted_expertise }}</div>
<div><strong>Services:</strong> {{ $formattedServices }}</div>
        
    </div>
    <div class="button-group">
    <a href="/partenaire/dashboard" class="button btn-primary" style="text-decoration: none; border: none;">
        <i class="fas fa-arrow-left mr-2"></i>
        Back
    </a>
        <a href="/partenaire/edit" class="button btn-primary" style="text-decoration: none; border: none;">Modifier</a>
    </div>

</div>
</body>
</html>
