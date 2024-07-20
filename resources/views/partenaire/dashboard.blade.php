<?php
use App\Models\DemandeService;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css"> 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}
.list {
  position: relative;
}
.list h2 {
  color: #fff;
  font-weight: 700;
  letter-spacing: 1px;
  margin-bottom: 10px;
}
.list ul {
  position: relative;
}
.list ul li {
  position: relative;
  left: 0;
  color: #f8da5b;
  list-style: none;
  margin: 4px 0;
  border-left: 2px solid #fcff82;
  transition: 0.5s;
  cursor: pointer;
}
.list ul li:hover {
  left: 10px;
}
.list ul li span {
  position: relative;
  padding: 8px;
  padding-left: 12px;
  display: inline-block;
  z-index: 1;
  transition: 0.5s;
}
.list ul li:hover span {
  color: #111;
}
.list ul li:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #fcff82;
  transform: scaleX(0);
  transform-origin: left;
  transition: 0.5s;
}
.list ul li:hover:before {
  transform: scaleX(1);
}
h1{
    
    color:#247291;
    
}
strong {
    color: #f8da5b; 
}
.main-content {
    flex-grow: 1;
    padding-left: 60px;
    padding-right: 150px;
    
}
.button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
.list-group{
    margin-right: -350px;
    /* padding-left: 20%; */
    padding-right: 20%;
}

    </style>
</head>

<body>
    @include('components.nav_part');
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-item">
                <span class="sidebar-icon">🏠</span>
                <a href="{{ route('partenaire.dashboard') }}" style="text-decoration: none;color:black">Tableau de bord</a>
            </div>
            <div class="sidebar-item">
                <span class="sidebar-icon">⚙️</span>
                <a href="{{ route('partenaire.profile') }}" style="text-decoration: none;color:black">Mon profil</a>
            </div>
            <div class="sidebar-item">
                <span class="sidebar-icon">✉️</span>
                <a href="{{ route('partenaire.appointment') }}" style="text-decoration: none;color:black">Rendez-vous</a>
            </div>
            <div class="sidebar-item">
                <span class="sidebar-icon">📅</span>
                <a href="{{ route('partenaire.historique') }}" style="text-decoration: none;color:black">Historique</a>
            </div>

           
            <div class="sidebar-item">


                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit"><i class="fa-solid fa-door-closed"></i>  Se déconnecter</button>
                    </form>

            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content" >

       <div class="features" >

                <div class="feature-item" style="margin-top:5px;" >
        <div  style="margin-top:5px; border-radius: 8px;">
            <h1 style="font-size: 30px; margin-left: 20px;">SERVICES</h1>
            <div class="list list-group">
            <ul>
                @forelse($services as $service)
                    <li><span>{{ $service }}<span></li>
                @empty
                    <li><span>Aucun service enregistré<span></li>
                @endforelse
            </ul>
        </div>
    </div>
    
</div>

</br>
<div class="button-container">
    <a href="/partenaire/edit_categories" class="btn btn-outline-secondary">Modifier les categories ou les services</a>
</div>
         
        </div>
        <div class="features" >
        <div class="request-container" style="margin-top: 20px;">
        <h1 style="font-size: 30px; margin-left: 20px;">DEMANDES EN ATTENTE</h1></br>
            
            <div class="list-group">
                @forelse ($requests as $request)
                    <a href=/partenaire/all-requests class="list-group-item list-group-item-action">
                        <p><strong>Demande id : </strong> {{ $request->id }}</p>
                        <p><strong>Descreption du demande : </strong>{{ $request->description }}</p>
                        <p><strong>Date : </strong> {{ $request->dateservice }}</p>
                        <small>Submitted on {{ $request->created_at->format('d M Y') }}</small>
                    </a>
                @empty
                    <p>Aucune demande en attente.</p>
                @endforelse
            </div>
            
            <div style="text-align: center; margin-top: 20px;">
    <a href="/partenaire/all-requests" class="btn btn-outline-secondary" style="text-decoration: none;">Voir plus</a>
</div>

        </div>
            
    </div>
</div>
</body>
</html>

<!-- Dashboard Header -->
<!-- <div class="dashboard-header">
                <h1  style="margin-left:230px;margin-top:-8px;">YOUSRAAAAAAAAAAAAAAAAAAAAAAAAA</h1>
                <p style="margin-left:150px;margin-top:5px;margin-buttom:15px;">Créez votre demande gratuitement et recevez rapidement des offres !</p>
                <div style="margin-left:300px;margin-top:14px;" >
                <a href="{{ route('client.demande') }}" >Demander un service</a>
                </div>
            </div> -->

            <!-- Features Section -->
            <!-- <div class="features" >

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
            </div> -->

            <!-- Footer Contact Section -->
            <!-- <div class="footer">
                <p>Une question ou un souci ? Nous sommes là pour vous !</p>
                <button>Contactez-nous</button>
            </div> -->
