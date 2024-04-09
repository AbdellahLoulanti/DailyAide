<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la demande</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #1b2e1c;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }
        .container {
    width: 80%;
    margin: 40px auto; /* Cette propriété centre le conteneur horizontalement */
    background: white;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    position: relative; /* Ajouté pour le positionnement relatif */
    top: 50%; /* Déplace le conteneur de 50% de la hauteur de l'écran vers le bas */
    transform: translateY(0%); /* Remonte le conteneur de 50% de sa propre hauteur pour le centrage vertical */
}

        .demande-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 0.5em;
        }
        .type{
            font-size: 2em;

        }
        .demande-details {
            display: flex;
            margin-bottom: 1em;
        }
        .demande-detail {
            margin-right: 2em;
            font-size: 1em;
            color: #666;
        }
        .demande-description {
            color: #333;
            line-height: 1.6;
            border-left: 4px solid #4CAF50;
            padding-left: 1em;
            margin-bottom: 1em;
        }
        .demande-footer {
            display: flex;
            justify-content: flex-end;
        }
        .button {
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            background-color: #5cb85c;
            border-radius: 5px;
            margin-left: 10px;
            transition: background 0.3s ease;
        }
        .button:hover {
            background-color: #f6f9f6;
            color:black;
        }
        .demande-viewed {
            font-size: 0.9em;
            color: #999;
            text-align: right;
        }
        .profile-image{
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="type">Profession - {{ $demande->typeService }}</div>
    <div style="display: flex; gap: 10px;">
        <a href="#"  onclick="history.back()" class="button">Retour</a>
        <form action="{{ route('demande.destroy', $demande->id) }}" method="POST" style="display: flex;">
            @csrf
            @method('DELETE')
            <button class="button" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');" >Annuler</button>
</form>     </div>
</div>

<div class="container">
    <div class="demande-content">
        <h1 class="demande-title">{{ $demande->titre }}</h1>
        <div class="demande-details">
            <p class="demande-detail"> <i class="fas fa-map-marker-alt"></i>
                {{ $demande->adresse }}</p>
            <p class="demande-detail"><i class="fas fa-briefcase"></i>
                Particuliers et indépendants</p>
        </div>
        <p class="demande-description">{{ $demande->description }}</p>
        <div class="demande-footer">
            <p class="demande-viewed">Vue  depuis {{ $demande->updated_at->format('d M Y H:i') }} par {{ $demande->client->prenom }} {{ $demande->client->nom }}.</p>
        </div>
        <div class="client-profile">
            <img src="{{ asset('storage/' . $demande->client->image) }}" alt="Profile Image" class="profile-image">
            <div class="client-info">
                <h4>{{ $demande->client->prenom }} {{ $demande->client->nom }}</h4>
                <p>{{ $demande->client->region }}</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
