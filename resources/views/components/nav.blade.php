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
                <a href="{{ route('client.MesDemandes') }}">Mes demandes</a>

            </div>
        </div>
    </div>
</div>
