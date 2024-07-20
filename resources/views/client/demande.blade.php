<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('cssfiles/demande.css')}}" >
    <title>Sélectionnez votre catégorie</title>

</head>
<body>
    <div class="page-container">
        @include('components.nav');

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
