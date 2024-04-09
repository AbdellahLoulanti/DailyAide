<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Signup Form</title>
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    <script src="https://cdn.tailwindcss.com"></script>
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
<div class="container mx-auto max-w-lg mt-10 bg-white p-8 rounded-lg shadow">
    <h1 class="text-2xl font-semibold mb-6">Profil Edit</h1>
    <form action="{{ route('client.update-profile') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf <!-- CSRF token for security -->
        @method('PUT')
        <div>
            <label for="first_name" class="block font-medium text-gray-700">First Name</label>
            <input type="text" id="nom" name="nom" required value="{{$client->nom}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="last_name" class="block font-medium text-gray-700">Last Name</label>
            <input type="text" id="prenom" name="prenom" required value="{{$client->prenom}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="picture" class="block font-medium text-gray-700">Picture</label>
            <div class="flex items-center space-x-4">
                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100">
                <img class="w-24 h-24 rounded-full" src="{{$client->image ? asset('storage/' . $client->image) : asset('/images/no-image.png')}}" alt="">
            </div>
        </div>

        <div>
            <label for="email" class="block font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email" required value="{{$client->email}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>


        <div>
            <label for="phone_number" class="block font-medium text-gray-700">Phone Number</label>
            <input type="tel" id="telephone" name="telephone" required value="{{$client->telephone}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        {{-- change password --}}
        <div class="flex justify-between items-center">
            <a href="/change-password" class="text-blue-500 hover:text-blue-700 transition duration-150 ease-in-out">Change Password</a>
        </div>

        <div>
            <label for="address" class="block font-medium text-gray-700">Address</label>
            <input type="text" id="adresse" name="adresse" required value="{{$client->adresse}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="city_region" class="block font-medium text-gray-700">City/Region</label>
            <input type="text" id="region" name="region" required value="{{$client->region}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <input type="submit" value="Update" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    </form>
    <a href="/profil" class="inline-flex items-center mt-4 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Back
    </a>
</div>

       

</body>
</html>
