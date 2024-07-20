<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la demande</title>
    <link rel="stylesheet" href="{{asset('cssfiles/showDemandes.css')}}" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
@include('components.nav');

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
            <form action="{{ route('demande.destroy', $demande->id) }}" method="POST" style="display: flex;float: right;margin-top:55px;margin-right:100px;" >
                @csrf
                @method('DELETE')
                <button class="button" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');" style="float: right;" >Annuler</button>
    </form>
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
