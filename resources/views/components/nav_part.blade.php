<div class="navbar">
    <a href="#" class="navbar-logo">DailyAide🔔</a>
    <div class="navbar-links">
        <!-- <a href="{{ route('client.demande') }}" class="button-demander">Demander un service</a> -->
        <a href="#" class="navbar-link">🔔</a>
        <a href="#" class="navbar-link">✉️</a>
        <div class="dropdown">
            <div class="profile-picture">
                <img src="{{ asset('storage/' . $partenaire->image) }}" alt="Profile Image" style="width: 55px;
                height: 55px;
                border-radius: 50%;
                overflow: hidden;
                margin: 20px auto;
                cursor: pointer;">
                    </div>
            <div class="dropdown-content">
                <a href="{{ route('partenaire.dashboard') }}">Tableau de bord</a>
                <a href="{{ route('partenaire.profile') }}">Mon profil</a>
          

            </div>
        </div>
    </div>
</div>
