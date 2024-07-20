<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Demande</title>
    <link rel="stylesheet" href="{{asset('cssfiles/form.css')}}" >

</head>
<body>
    @include('components.nav');

    <div class="pre-form-message">
        Décrivez votre besoin afin que nous prévenions nos menuisiers dans votre région et recevez des offres dans les 4 heures.
    </div>
    <div class="form-container" >

        <form action="{{ route('demande-serviceMenage.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Make sure to include the CSRF token for form submissions in Laravel -->

        <div class="form-group">
            <label for="typeService">Type de service demandé</label>
            <select id="typeService" name="service_id" required>
                <option value="Sélectionnez un type de service">Sélectionnez un type de service</option>
                @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->nom }}</option>
                @endforeach
            </select>
        </div>
        @include('components.form');

            <button type="submit">Continuer</button>
        </form>
    </div>
</body>
</html>
