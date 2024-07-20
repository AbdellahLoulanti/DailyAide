<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Demande de Service</title>
</head>
<body>
    <h1>Nouvelle Demande de Service</h1>
    <p>Vous avez reçu une nouvelle demande de service.</p>
    <p><strong>Titre de la Demande:</strong> {{ $titre }}</p>
    <p><strong>Description:</strong> {{ $description }}</p>
    <p><strong>Adresse:</strong> {{ $adresse }}</p>

    <a href="{{ url('/demandes/' . $demandeService->id) }}" style="background-color: #007BFF; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Voir la Demande</a>

    <p>Merci,<br>{{ config('app.name') }}</p>
</body>
</html>
