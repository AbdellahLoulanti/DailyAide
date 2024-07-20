<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Signup Form</title>
    <link rel="stylesheet" href="{{asset('cssfiles/signup.css')}}" >
</head>
<body>
    <!-- At the top, below the <body> tag -->
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
        <h1>Client Signup Form</h1>
        <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for security -->
            <label for="first_name">First Name</label>
            <input type="text" id="nom" name="nom" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="picture">Picture</label>
            <input type="file" id="image" name="image">

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <label for="phone_number">Phone Number</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="address">Address</label>
            <input type="text" id="adresse" name="adresse" required>

            <label for="city_region">City/Region</label>
            <input type="text" id="region" name="region" required>

            <input type="submit" value="Sign Up">
        </form>
        <p class="login-link">Already have an account? <a href="{{ route('client.login') }}">Log in here</a>.</p>

    </div>
</body>
</html>
