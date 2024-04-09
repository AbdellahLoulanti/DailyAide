<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Signup Form</title>
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
</head>
<style>body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="tel"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box; /* Makes sure the padding doesn't affect the overall width */
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #0f100f; /* Bootstrap 'success' green */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #4cae4c; /* A slightly darker green */
}
</style>
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
