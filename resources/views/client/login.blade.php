<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <title>Client Login Form</title>
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
