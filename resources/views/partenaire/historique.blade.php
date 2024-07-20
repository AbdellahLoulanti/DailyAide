<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/dashboard.css">  -->
    <!-- <link rel="icon" href="images/favicon.ico" /> -->
        <!-- <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        /> -->
        <!-- <script src="//unpkg.com/alpinejs" defer></script> -->
        <link rel="stylesheet" href="{{asset('cssfiles/dashboard.css')}}" >
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Historique</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        
.historique-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espacement entre les éléments */
    justify-content: flex-start; /* Aligner les éléments au début */
    margin: 0 auto; /* Centrer le conteneur si vous le souhaitez */
    max-width: 1200px; /* Ou la largeur maximale que vous préférez pour le conteneur */
}

.historique-item {
    flex: 0 1 calc(33.333% - 20px); /* Prendre 33.333% de l'espace moins l'espacement */
    box-sizing: border-box;
    background: #ffffff; /* Couleur de fond pour chaque carte */
    border: 2px solid #ddd; /* Bordure légère pour chaque carte */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Ombre légère pour un effet 3D */
    border-radius: 15px; /* Bords arrondis pour les cartes */
    padding: 8px; /* Espacement à l'intérieur des cartes */
    margin-bottom: 20px; /* Espacement en bas de chaque carte */
}

.list-group {
    list-style-type: none; /* Cela enlèvera les puces pour tous les éléments ul avec la classe .list-group */
    padding-left: 0; /* Enlève le padding à gauche habituellement ajouté pour l'indentation des puces */
}

.list-group-item {
    margin-bottom: 0; /* Éliminer les marges de bas si nécessaire */
    border: none; /* Retirer les bordures par défaut si vous utilisez Bootstrap */
    font-family: Georgia, serif;
}

/* Vous pouvez ajouter cette partie si vous souhaitez avoir un effet au survol sur les cartes */
.historique-item:hover {
    box-shadow: 0 15px 10px rgba(0,0,0,0.15);
    transform: translateY(-2px);
    transition: all 0.3s ease;
    cursor: pointer;
}
        strong {
    color: #191970; /* La couleur de votre choix */
    font-weight: bold; /* Normalement strong est déjà en gras, mais cela le renforce si nécessaire */
    font-size: 18px; /* Taille de la police de votre choix */
}

/* Pour le texte qui n'est pas dans strong mais que vous voulez styliser également */
.historique-item p {
    color: #333; /* La couleur de votre choix */
    font-size: 18px; /* Taille de la police de votre choix */
    
}       
       


/* Style pour le textarea */
.text {
    width: 100%; /* Prendre toute la largeur disponible */
    padding: 10px; /* Espacement à l'intérieur du textarea */
    border: 5px solid #ccc; /* Bordure subtile */
    border-radius: 8px; /* Bords arrondis */
    box-sizing: border-box; /* La largeur inclut padding et border */
    resize: vertical; /* Permettre à l'utilisateur de redimensionner verticalement */
}

/* Style pour le bouton */
.btn {
    background-color: #DAA520; /* Couleur de fond bleue */
    color: black; /* Texte blanc */
    padding: 5px 5px; /* Espacement à l'intérieur du bouton */
    border: none; /* Aucune bordure */
    border-radius: 15px; /* Bords arrondis */
    cursor: pointer; /* Pointer le curseur lors du survol */
    transition: background-color 0.3s; /* Transition douce pour l'effet de survol */
    font-family: Georgia, serif;
}

/* Effet de survol pour le bouton */
.btn:hover {
    background-color: #FFA500; /* Couleur plus foncée lors du survol */
}

        

</style>


</head>
<body>
@include('components.nav_part');

    <div class="historique-container">
    @forelse($historique as $history)
        <div class="historique-item">
            <ul class="list-group">
            <li class="list-group-item">
            <p><strong>Catégorie: </strong>{{ $history->categorie }}</p>
            <p><strong>Service: </strong>{{ $history->nom }}</p>
            <p><strong>Date du service: </strong>{{ $history->dateservice }}</p>
            <p><strong>Nom du client: </strong>{{ $history->client_nom }}</p>
            <p><strong>Prénom du client: </strong>{{ $history->client_prenom }}</p>
            <p><strong>Etat: </strong>{{ $history->statut }}</p>   
        </li>
            </ul>

        @if(!$history->commentaireExiste)
        <button onclick="toggleCommentForm('form-{{ $history->id }}')" class="btn btn-primary">Commenter</button>

    <!-- Formulaire caché initialement -->
    <form id="form-{{ $history->id }}" action="{{ route('partenaire.commentaire.store') }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="sendby" value="partenaire">
        <input type="hidden" name="id_cli" value="{{ $history->client_id }}">
        <input type="hidden" name="id_dem_ser" value="{{ $history->id }}">
        <textarea name="commentaire" rows="3" class="text" placeholder="Entrez votre commentaire ici..." required></textarea>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
        @endif
</div>
    
<!-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
@endif -->

<script>
// Utilisez DOMContentLoaded pour vous assurer que le script s'exécute après le chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        // Utilisez SweetAlert2 si vous avez inclus le CDN
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: "{{ session('success') }}"
        });

        // Ou utilisez une alerte native si vous préférez
        // alert("{{ session('success') }}");
    @endif
});

function toggleCommentForm(formId) {
    var form = document.getElementById(formId);
    if (form.style.display === 'block') {
        form.style.display = 'none';
    } else {
        form.style.display = 'block';
    }
}
</script>


    @empty
        <p>Aucun service terminé.</p>
    @endforelse


</div>

</body>
</html>