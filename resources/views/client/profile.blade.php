<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">

    <title>Profil du Client</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
.container {
    max-width: 800px;
    margin: 40px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
h1 {
    color: #333;
    font-size: 24px;
}
p {
    color: #666;
    line-height: 1.6;
}
.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    margin: 20px auto;
}
img {
    width: 100%;
    height: auto;
}
.profile-info {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.profile-info div {
    margin-bottom: 10px;
    flex-basis: calc(50% - 20px);
}
.profile-info div:last-child {
    flex-basis: 100%;
}
.profile-header {
    background: #0056b3;
    color: white;
    padding: 10px 20px;
    border-radius: 8px 8px 0 0;
    margin: -20px -20px 20px -20px;
}
.button-group {
    text-align: center;
    margin-top: 20px;
}
.button {
    padding: 10px 15px;
    margin: 0 10px;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}
.btn-primary {
    background-color: #007bff;
}
.btn-primary:hover {
    background-color: #0056b3;
}
.btn-secondary {
    background-color: #6c757d;
}
.btn-secondary:hover {
    background-color: #5a6268;
}

    </style>
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
        <a href="/client/edit" class="button btn-primary">Modifier</a>
    </div>

</div>
</body>
</html>
