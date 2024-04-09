<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <title>Client Login Form</title>
</head>
<style>
    body {
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

    /* Add additional styles as necessary */
    </style>
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
        <h1>Client Login Form</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('client.login.submit') }}" method="POST">
            @csrf
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="{{ route('client.create') }}">Sign up here</a>.</p>

    </div>
</body>
</html>
