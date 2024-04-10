




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css"> <!-- Lien vers votre fichier CSS -->
    <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
    <title>Tableau de Bord</title>

</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}
.dashboard-container {
    display: flex;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
}
.sidebar {
    width: 250px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    height: fit-content;
}
.sidebar-item {
    display: flex;
    align-items: center;
    padding: 10px 5px;
    font-size: 16px;
    border-bottom: 1px solid #eee;
}
.sidebar-item:last-child {
    border-bottom: none;
}
.sidebar-icon {
    margin-right: 10px;
    display: inline-block;
    width: 24px;
    text-align: center;
}
.sidebar-item:hover {
    background-color: #f7f7f7;
    cursor: pointer;
    border-radius: 5px;
}
.main-content {
    flex: 1;
    margin-left: 30px;
}
.dashboard-header, .features, .footer {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.dashboard-header h1 {
    margin-bottom: 0.5em;
    color: #333;
}
.dashboard-header p {
    color: #666;
}
.dashboard-header a {
    background-color: #0056b3;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
    margin-top: 7px;
}
.dashboard-header a:hover {
    background-color: #003d82;
}
.features {
display: flex;
flex-direction: column; /* Cela place tous les éléments en colonne */
align-items: flex-start; /* Cela aligne les éléments à gauche */
}       .feature-item {
    display: flex;
    align-items: center; /* Align image and text vertically */
    margin-right: 20px;
}
.feature-item img {
    margin-right: 10px;
    width: 50px; /* Adjust as needed */
}
.feature-item p {
    text-align: left; /* Align text to the left */
    margin: 0;
    color: #666;
    font-size: 14px;
}
.footer {
    text-align: center;
    padding: 20px;
}
.footer p {
    color: #666;
}
.footer button {
    background-color: #5cb85c;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}
.footer button:hover {
    background-color: #4cae4c;
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
</style>
<body>
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
                    <a href="#">Tableau de bord</a>
                    <a href="{{ route('client.profile') }}">Mon profil</a>
                    <a href="{{ route('client.MesDemandes') }}">mes demandes</a>

                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-item">
                <span class="sidebar-icon">🏠</span>
                <a href="{{ route('client.dashboard') }}" style="text-decoration: none;color:black">Tableau de bord</a>
            </div>
            <div class="sidebar-item">
                <span class="sidebar-icon">⚙️</span>
                <a href="{{ route('client.profile') }}" style="text-decoration: none;color:black">Mon profil</a>
            </div>
            <div class="sidebar-item">
                <span class="sidebar-icon">✉️</span>
                <a href="{{ route('client.MesDemandes') }}" style="text-decoration: none;color:black">Mes demandes</a>
            </div>
            <div class="sidebar-item">
                
    
                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit"><i class="fa-solid fa-door-closed"></i>  Se déconnecter</button>
                    </form>
                
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <h1  style="margin-left:120px;margin-top:-8px;">Vous n'avez pas de demande en cours</h1>
                <p style="margin-left:150px;margin-top:-3px;">Créez votre demande gratuitement et recevez rapidement des offres !</p>
                <a href="{{ route('client.demande') }}" style="margin-left:300px;" >Demander un service</a>
            </div>

            <!-- Features Section -->
            <div class="features" >

                <div class="feature-item" style="margin-top:5px;" >
                    <img src="{{ asset('storage/images/icon-prix.png') }}" alt="Icon" style="width: 24px; vertical-align: middle;">
                    <span style="margin-left: 8px; vertical-align: middle;font-size:20px;margin-left:20px">Des prix imbattables</span>
                </div>
                <div class="feature-item" style="margin-top:20px;">
                    <img src="{{ asset('storage/images/icon-declarations.png') }}" alt="Des prix imbattables" style="width: 24px; vertical-align: middle;">

                    <span style="margin-left: 8px; vertical-align: middle;font-size:20px;margin-left:20px">Des prestations déclarées</span>
                </div>

                <div class="feature-item" style="margin-top:20px;">
                    <img src="{{ asset('storage/images/icon-acces.png') }}" alt="Des prix imbattables" style="width: 24px; vertical-align: middle;">

                    <span style="margin-left: 8px; vertical-align: middle;font-size:20px;margin-left:20px;">Accès illimité à 227.467 prestataires</span>
                </div>
                <div class="feature-item" style="margin-top:20px;">
                    <img src="{{ asset('storage/images/icon-securise.png') }}" alt="Paiement en ligne 100% sécurisé" style="width: 24px; vertical-align: middle;">
                    <span style="margin-left: 8px; vertical-align: middle;font-size:20px;margin-left:20px">Paiement en ligne 100% sécurisé</span>
                </div>
            </div>

            <!-- Footer Contact Section -->
            <div class="footer">
                <p>Une question ou un souci ? Nous sommes là pour vous !</p>
                <button>Contactez-nous</button>
            </div>
        </div>
    </div>
</body>
</html>
