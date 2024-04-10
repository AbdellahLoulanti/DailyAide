<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formDemande.css">

    <title>Formulaire de Demande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Include padding in total width and height */
        }
        textarea {
            resize: vertical; /* User can resize vertically, but not horizontally */
        }
        button {
            padding: 10px 20px;
            background-color: #0e0e0e;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .form-note {
            font-size: 0.9em;
            color: #666;
        }
        .navbar {
            margin-bottom:30px;
            margin-top:-20px;


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
        .form-group select {
    width: 100%; /* Makes the select box take up the full container width */
    padding: 8px 12px; /* Adds some padding inside the select box */
    border: 1px solid #ccc; /* A light grey border */
    border-radius: 4px; /* Rounded corners */
    background-color: white; /* A white background color */
    box-sizing: border-box; /* Includes padding and border in the width */
    margin-top: 5px; /* Adds some space above the select box */
    margin-bottom: 20px; /* Adds some space below the select box */
    font-size: 16px; /* Sets a readable default font size */
}

.form-group select:focus {
    border-color: #0044cc; /* A blue border color when the select box is focused */
    outline: none; /* Removes the default focus outline */
}

/* Styling for options */
.form-group option {
    padding: 10px; /* Adds some padding inside options */
}

/* You can add custom styles for disabled or selected options if needed */
.form-group select:disabled {
    background-color: #eeeeee; /* A light grey background for disabled select */
}

.form-group select option:disabled {
    color: #999999; /* A lighter text color for disabled options */
}
.pre-form-message {
            font-size: 20px; /* Example font size, adjust as needed */
            text-align: center; /* Center align text */
            margin-bottom: 20px; /* Space before the form starts */
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
                    <img src="{{ asset('storage/' . $client->image) }}" alt="Profile_Image" style="width: 55px;
                    height: 55px;
                    border-radius: 50%;
                    overflow: hidden;
                    margin: 20px auto;">
                        </div>
                <div class="dropdown-content">
                    <a href="#">Tableau de bord</a>
                    <a href="{{ route('client.profile') }}">Mon profil</a>
                    <a href="#">mes demandes</a>

                </div>
            </div>
        </div>
    </div>
    <div class="pre-form-message">
        Décrivez votre besoin afin que nous prévenions nos menuisiers dans votre région et recevez des offres dans les 4 heures.
    </div>
    <div class="form-container" >

        <form action="{{ route('demande-service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Make sure to include the CSRF token for form submissions in Laravel -->

        <div class="form-group">
            <label for="typeService">Type de service demandé</label>
            <select id="typeService" name="service_id" required>
                <option value="Sélectionnez un type de service">Sélectionnez un type de service</option>
                @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->nom }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="titre">Titre de votre demande</label>
                <input type="text" id="titre" name="titre" placeholder="Entrez le titre de votre demande" required>
            </div>
            <div class="form-group">
                <label for="adresse">Le service doit être réalisé à l'adresse suivante</label>
                <input type="text" id="adresse" name="adresse" placeholder="Entrez une adresse complète" required>
            </div>
            <div class="form-group">
                <label for="description">Informations supplémentaires qui peuvent s'avérer utiles pour la réalisation de votre service.</label>
                <textarea id="description" name="description" placeholder="Détaillez votre demande" rows="4"></textarea>
            </div>
            <div class="form-note">
                Important : ne partagez pas d'informations personnelles (numéro, site web, adresse mail, etc.) à ce stade-ci.
            </div>
            <button type="submit">Continuer</button>
        </form>
    </div>
</body>
</html>
