<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/demande.css">
    <title>Sélectionnez votre catégorie</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
}
.categories-list {
    display: flex;
    justify-content: center;
    gap: 16px; /* Adjust the gap between the cards */
}
.category-card {
    background-color: #DADADA; /* Example background color */
    border-radius: 10px;
    padding: 20px;
    width: 200px;
    height: 250px; /* Adjust the width as needed */
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Example box shadow */
    transition: transform 0.3s ease;
}
.category-card:hover {
    transform: translateY(-5px);
}
.category-icon {
    height: 100px; /* Adjust the height as needed */
    width: auto;
    margin-bottom: 10px;
}
.category-title {
    font-size: 1.2em;
    color: #333;
    margin: 0;
}
/* Additional styles */
.header {
    text-align: center;
    margin-bottom: 40px;
}
.navbar {
    display: flex;

    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.navbar-logo {
    font-size: 24px;
    color: #333;
    text-decoration: none;
}
.navbar-links {
    display: flex;
    align-items: center;
    gap: 20px;
}
.navbar-link {
    text-decoration: none;
    color: #333;
    font-size: 16px;
}
.navbar-link:hover {
    text-decoration: underline;
}
.user-profile {
    display: flex;
    align-items: center;
    gap: 10px;
}
.user-profile img {
    width: 32px;
    height: 32px;
    border-radius: 50%;
}
.dropdown {
    position: relative;
}
.button-demander {
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
}
.button-demander:hover {
    background-color: #45a049;
}
.dropdown-content {
display: none; /* Cache le menu déroulant jusqu'au survol */
position: absolute;
right: 0;
background-color: #ffffff; /* Fond blanc pour le contenu déroulant */
min-width: 160px; /* Largeur minimale */
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); /* Ombre pour un effet 3D */
z-index: 1;
}
.dropdown-content a {
color: black; /* Couleur du texte pour les éléments du menu */
padding: 12px 16px; /* Espacement autour du texte */
text-decoration: none; /* Supprime le soulignement des liens */
display: block; /* Affiche chaque lien comme un bloc, ce qui permet de cliquer sur toute la zone */
border-bottom: 1px solid #f2f2f2; /* Ligne séparatrice entre les éléments */
}
.dropdown-content a:last-child {
border-bottom: none; /* Pas de ligne séparatrice pour le dernier élément */
}

.dropdown-content a:hover {
background-color: #f7f7f7; /* Couleur de fond au survol */
}

.dropdown:hover .dropdown-content {
display: block; /* Affiche le menu déroulant au survol */
}
.page-container {
display: flex;
flex-direction: column;
}

    </style>
</head>
<body>
    <div class="page-container">
    <div class="navbar">
        <a href="#" class="navbar-logo">DailyAide🔔</a>
        <div class="navbar-links">
            <a href="{{ route('client.demande') }}" class="button-demander">Demander un service</a>
            <a href="#" class="navbar-link">🔔</a>
            <a href="#" class="navbar-link">✉️</a>
            <div class="dropdown">
                <div class="profile-picture">
                    <img src="{{ asset('storage/' . $client->image) }}" alt="Profile Image" style="width: 55px;
                    height: 55px;
                    border-radius: 50%;
                    overflow: hidden;
                    margin: 20px auto;">
                        </div>
                <div class="dropdown-content">
                    <a href="{{ route('client.dashboard') }}">Tableau de bord</a>
                    <a href="{{ route('client.profile') }}">Mon profil</a>
                    <a href="{{ route('client.MesDemandes') }}">mes demandes</a>

                </div>
            </div>
        </div>
    </div>
    <div class="categories-container">
        <div class="header">
            <h1>Sélectionnez votre catégorie</h1>
        </div>
        <div class="categories-list">
            <!-- Bricolage -->
            <a href="{{ route('client.formDemande') }}" class="category-card-link">
                <div class="category-card">
                    <img src="{{ asset('storage/images/tools.png') }}" alt="Bricolage" class="category-icon">
                    <div class="category-title">Bricolage</div>
                </div>
            </a>
            <!-- Animaux -->
            <a href="{{ route('client.formDemandeAnimaux') }}" class="category-card-link">

            <div class="category-card">
                <img src="{{ asset('storage/images/pawprint.png') }}" alt="Animaux" class="category-icon">
                <div class="category-title">Animaux</div>
            </div>
        </a>
            <!-- Aide ménagère -->
            <a href="{{ route('client.formDemandeMenage') }}" class="category-card-link">

            <div class="category-card">
                <img src="{{ asset('storage/images/cleaning.png') }}" alt="Aide ménagère" class="category-icon">
                <div class="category-title">Aide ménagère</div>
            </div>
        </a>
            <!-- Cours & Assistance -->
            <a href="{{ route('client.formDemandeCours') }}" class="category-card-link">

            <div class="category-card">
                <img src="{{ asset('storage/images/online-learning.png') }}" alt="Cours & Assistance" class="category-icon">
                <div class="category-title">Cours & Assistance</div>
            </div>
        </a>
        </div>
    </div>
</div>
</body>
</html>
