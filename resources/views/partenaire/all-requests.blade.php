<?php
use App\Models\DemandeService;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css"> 
    <link rel="icon" href="images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="stylesheet" href="{{asset('cssfiles/dashboard.css')}}" >
        <script src="https://cdn.tailwindcss.com"></script>
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}
.list {
  position: relative;
}
.list h2 {
  color: #fff;
  font-weight: 700;
  letter-spacing: 1px;
  margin-bottom: 10px;
}
.list ul {
  position: relative;
}
.list ul li {
  position: center;
  left: 0;
  color: #f8da5b;
  list-style: none;
  margin: 4px 0;
  border-left: 2px solid #fcff82;
  transition: 0.5s;
  cursor: pointer;
}
.list ul li:hover {
  left: 10px;
}
.list ul li span {
  position: relative;
  padding: 8px;
  /* padding-left: 12px; */
  display: inline-block;
  z-index: 1;
  transition: 0.5s;
}
.list ul li:hover span {
  color: #111;
}
.list ul li:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #fcff82;
  transform: scaleX(0);
  transform-origin: left;
  transition: 0.5s;
}
.list ul li:hover:before {
  transform: scaleX(1);
}
h1{
    
    color:#247291;
    
}
strong {
    color: #f8da5b; 
}
.container {
    flex-grow: 1;
    padding-left: 20%;
    padding-right: 20%;
    margin-top: 0%;
    
}
.list-group{
    margin-right: -350px;
    padding-left: 20%;
    padding-right: 20%;
}

.list-group-item {
    display: flex;
    flex-direction: column;
    align-items: start;
}

.list-group-item .btn-group {
    margin-top: 10px;
}

.btn-group form {
    display: inline; /* Ensure forms are inline */
}

.btn-group button {
    margin-right: 5px; /* Space between buttons */
}


    </style>
</head>

<body>
<a href="/partenaire/dashboard" class="inline-flex items-center mt-4 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Back
    </a>
<div class="container">
<div class="features" >
        <div class="request-container" style="margin-top: 20px;">
        <h1 style="font-size: 30px; margin-left: 90px;">DEMANDES EN ATTENTE</h1></br>
        
            <div class="list-group">
                
            @forelse ($requests as $request)
    <div class="list-group-item list-group-item-action">
        <p><strong>Demande id: </strong> {{ $request->id }}</p>
        <p><strong>Description de la demande: </strong>{{ $request->description }}</p>
        <p><strong>Date: </strong> {{ $request->created_at->format('d M Y') }}</p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <form method="POST" action="{{ route('partenaire.accept', $request->id) }}" style="margin-right: 5px;">
                @csrf
                <button type="submit"  class="btn btn-secondary">Accepter</button>
            </form>
            <form method="POST" action="{{ route('partenaire.reject', $request->id) }}">
                @csrf
                <button type="submit"  class="btn btn-outline-secondary" onclick="return confirm('Are you sure you want to reject this request?');">Refuser</button>

            </form>
        </div>
    </div>

@empty
    <p>Aucune demande en attente.</p>
@endforelse



            </div>
            
            </div>  
           
</div>



