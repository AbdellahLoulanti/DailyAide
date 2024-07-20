<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d’inscription d’expert</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/signup.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="Category[]"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var checkedCount = Array.from(checkboxes).filter(item => item.checked).length;
                    if (checkedCount > 3) {
                        alert('Vous ne pouvez sélectionner que 3 catégories maximum.');
                        checkbox.checked = false;
                    }
                });
            });

            const services = @json($services);
            const categoryCheckboxes = document.querySelectorAll('input[type="checkbox"][name="Category[]"]');
            const servicesSelect = document.getElementById('services');

            function updateServices() {
                let addedServices = new Set();
                servicesSelect.innerHTML = '';

                Array.from(categoryCheckboxes).filter(c => c.checked).forEach(checkbox => {
                    const cat = checkbox.value;
                    if (services.hasOwnProperty(cat)) {
                        services[cat].forEach(service => {
                            if (!addedServices.has(service.id)) {
                                const option = document.createElement('option');
                                option.value = service.id;
                                option.textContent = service.nom;
                                servicesSelect.appendChild(option);
                                addedServices.add(service.id);
                            }
                        });
                    }
                });

                servicesSelect.style.display = addedServices.size > 0 ? 'block' : 'none';
            }

            updateServices();
            categoryCheckboxes.forEach(checkbox => checkbox.addEventListener('change', updateServices));
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <h1>Formulaire d’inscription d’expert</h1>
        <form action="{{ route('partenaire.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for security -->
            <label for="nom">Prénom</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Nom</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="image">Photo</label>
            <input type="file" id="image" name="image">

            <div class="form-group">
                <label for="btncheck1">Catégorie</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck1" name="Category[]" value="bricolage">
                    <label class="btn btn-outline-primary" for="btncheck1">Bricolage</label>
                    <input type="checkbox" class="btn-check" id="btncheck2" name="Category[]" value="animaux">
                    <label class="btn btn-outline-primary" for="btncheck2">Animaux</label>
                    <input type="checkbox" class="btn-check" id="btncheck3" name="Category[]" value="cours">
                    <label class="btn btn-outline-primary" for="btncheck3">Cours & Assistance</label>
                    <input type="checkbox" class="btn-check" id="btncheck4" name="Category[]" value="menage">
                    <label class="btn btn-outline-primary" for="btncheck4">Ménage</label>
                </div>
                <label for="services">Services (Ctrl-click to select multiple):</label>
                <select id="services" class="form-select" name="services[]" multiple required style="height: 150px;">
                    <!-- Les options sont ajoutées ici par JS -->
                </select>
            </div>

            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <label for="telephone">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="region">Ville/Région</label>
            <input type="text" id="region" name="region" required>

            <label for="experience_years">Années d'expérience</label>
            <input type="text" id="experience_years" name="experience_years" required>

            <label for="availability">Disponibilité</label>
            <input type="text" id="availability" name="availability" required>

            <label for="pricing_Model">Modèle de prix</label>
            <input type="text" id="pricing_Model" name="pricing_Model" required>

            <input type="submit" value="s'inscrire">
        </form>
        <p class="login-link">Vous avez déjà un compte? <a href="{{ route('partenaire.login') }}">Connectez-vous ici</a>.</p>
    </div>
</body>
</html>
