<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>Vos demandes</title>
    <link href="{{ asset('css/mesdemandes.css') }}" rel="stylesheet">
<style>body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
.container {
    display: flex;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
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
.demandes-container {
    margin-left: 30px;
    flex-grow: 1;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.demande-card {
    background: #FFFFFF;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-bottom: 16px;
    padding: 20px;
    display: flex;
    align-items: center;
}
.demande-icon {
    font-size: 2em;
    margin-right: 16px;
    color: #6c757d;
    margin-bottom: 58px;
    margin-left:8px;
    padding:5px;
}
.demande-info {
    flex-grow: 1;
}
.demande-title {
    margin: 0;
    color: #333;
    font-size: 1.2em;
    font-weight: bold;
}
.demande-description {
    color: #666;
}
.demande-date {
    color: #999;
    font-size: 0.9em;
}
.demande-actions {
    text-align: right;
}
.demande-button {
    text-decoration: none;
    padding: 8px 16px;
    background-color: #5cb85c;
    color: #FFFFFF;
    border-radius: 5px;
    transition: background-color 0.3s;
    border: none;
    cursor: pointer;

}
.demande-button:hover {
    background-color: #4cae4c;
}
.btn-delete {
background-color: #dc3545;
margin-left: 8px; /* Espace entre les boutons */
}

.btn-delete:hover {
background-color: #c82333;
}
.demande-actions {
    display: flex;
    align-items: center;
    gap: 10px; /* Ajustez l'espace entre les boutons si nécessaire */
}
</style>
</head>
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
    <div class="container">
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
                <a href="{{ route('client.MesDemandes') }}" style="text-decoration: none;color:black">mes demandes</a>
            </div>
            <div class="sidebar-item">
                <span class="sidebar-icon">↩️</span>
                <a href="{{ route('client.login') }}" style="text-decoration: none;color:black">Se déconnecter</a>
            </div>
        </div>



        <div class="demandes-container">
            <h1>Gérer mes demandes de services</h1>
            @foreach ($demandes as $demande)
                <div class="demande-card">
                    <div class="demande-icon">
                        <i class="fas fa-toolbox"></i> <!-- Changez l'icône selon le type de demande -->
                    </div>
                    <div class="demande-info">
                        <h4 class="demande-title">{{ $demande->typeService }}</h4><hr style="color:gray; width:580px;margin-left:-8px;">
                        <p class="demande-description">{{ $demande->statut }}</p>
                        <small class="demande-date">Demandée le {{ $demande->created_at->format('d/m/Y') }}</small>
                    </div>
                    <div class="demande-actions">
                        <a href="{{ route('demande.show', $demande->id) }}" class="demande-button">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                                                <!-- Bouton de suppression -->
                        <form action="{{ route('demande.destroy', $demande->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');" style="margin-top:5px;padding: 8px 16px;background-color: #dc3545; color: white; border: none;border-radius: 4px;cursor: pointer; transition: background-color 0.2s; text-decoration: none; font-size: 14px;">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </form>

                    </div>
                </div>
            @endforeach
        </div>








    </div>
</body>
</html>
