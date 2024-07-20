<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <title>Formulaire de connexion expert</title>
    <link rel="stylesheet" href="{{asset('cssfiles/login.css')}}" >

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
        <h1>Formulaire de connexion expert</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('partenaire.login.submit') }}" method="POST">
            @csrf
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se connecter">
        </form>
        <p>Don't have an account? <a href="{{ route('partenaire.create') }}">Sign up here</a>.</p>

    </div>
</body>
</html>
