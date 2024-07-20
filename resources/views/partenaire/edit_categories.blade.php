<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d’inscription d’expert</title>
    <link rel="stylesheet" href="{{asset('cssfiles/signup.css')}}" >
    <link rel="stylesheet" href="{{asset('cssfiles/dashboard.css')}}" >
    <link rel="icon" href="images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('cssfiles/dashboard.css')}}" >
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
});

</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<!-- <div class="container">
    <h1>Formulaire d’inscription d’expert</h1>
    <form action="{{ route('partenaire.store') }}" method="POST" enctype="multipart/form-data"> -->
        <!-- @csrf CSRF token for security -->
        <!-- Your existing form fields -->
    <!-- </form>
</div> -->


<script>
document.addEventListener('DOMContentLoaded', function() {
    const services = @json($services);

    const categoryCheckboxes = document.querySelectorAll('input[type="checkbox"][name="Category[]"]');
    const servicesSelect = document.getElementById('services');

    function updateServices() {
        let addedServices = new Set(); // Create a set to track added services
        servicesSelect.innerHTML = ''; // Clear the dropdown

        Array.from(categoryCheckboxes).filter(c => c.checked).forEach(checkbox => {
            const cat = checkbox.value;
            if (services.hasOwnProperty(cat)) {
                services[cat].forEach(service => {
                    if (!addedServices.has(service.id)) { // Check if service is already added
                        const option = document.createElement('option');
                        option.value = service.id;
                        option.textContent = service.nom;
                        servicesSelect.appendChild(option);
                        addedServices.add(service.id); // Add service id to the set
                    }
                });
            }
        });

        servicesSelect.style.display = addedServices.size > 0 ? 'block' : 'none'; // Show/hide based on services added
    }

    // Call updateServices initially to populate based on any preselected categories
    updateServices();

    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateServices);
    });
});
</script>
<a href="/partenaire/dashboard" class="inline-flex items-center mt-4 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Back
    </a>
<div class="container mx-auto max-w-lg mt-10 bg-white p-8 rounded-lg shadow">
<form method="POST" action="{{ route('partenaire.editCategories') }}">
@csrf
<div class="form-group">
           
           <label for="category">Catégorie</label>
           <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
           <input type="checkbox" class="btn-check" id="btncheck1" name="Category[]" value="bricolage" />
           <label class="btn btn-outline-primary" for="btncheck1">Bricolage</label>
<input type="checkbox" class="btn-check" id="btncheck2" name="Category[]" value="animaux" />
<label class="btn btn-outline-primary" for="btncheck2">Animaux</label>
<input type="checkbox" class="btn-check" id="btncheck3" name="Category[]" value="cours" />
<label class="btn btn-outline-primary" for="btncheck3">Cours & Assistance</label>
<input type="checkbox" class="btn-check" id="btncheck4" name="Category[]" value="menage" />
<label class="btn btn-outline-primary" for="btncheck4">Ménage</label>
</div>
           <!-- <label for="services">Services :</label> -->
</br><label for="services">Services (Ctrl-click to select multiple):</label>
   <select id="services" class="form-select" name="services[]" multiple required style="height: 150px;"> <!-- Adjusted height -->
       <!-- Les options sont ajoutées ici par JS -->
   </select>
   

<input type="submit" value="Update" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    </form>
   

</div>
</div>
</body>
</html>