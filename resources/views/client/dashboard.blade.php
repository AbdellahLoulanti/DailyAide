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
        <link rel="stylesheet" href="{{asset('cssfiles/dashboard.css')}}" >
        <script src="https://cdn.tailwindcss.com"></script>
    <title>Tableau de Bord</title>
</head>

<body>
    @include('components.nav');
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
                <h1  style="margin-left:230px;margin-top:-8px;">Vous n'avez pas de demande en cours</h1>
                <p style="margin-left:150px;margin-top:5px;margin-buttom:15px;">Créez votre demande gratuitement et recevez rapidement des offres !</p>
                <div style="margin-left:300px;margin-top:14px;" >
                <a href="{{ route('client.demande') }}" >Demander un service</a>
                </div>
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
