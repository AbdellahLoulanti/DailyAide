<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('cssfiles/mesdemandes.css')}}" >
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Vos demandes</title>
</head>
<body class="bg-white text-gray-700">
    @include('components.nav')

    <div class="flex">
        <div class="w-64 p-5 bg-gray-100">
            <div class="flex items-center p-2 mb-4 text-gray-700">
                <span class="mr-2 text-xl">🏠</span>
                <a href="{{ route('client.dashboard') }}" class="text-gray-700 hover:text-gray-900">Tableau de bord</a>
            </div>
            <div class="flex items-center p-2 mb-4">
                <span class="mr-2 text-xl">⚙️</span>
                <a href="{{ route('client.profile') }}" class="text-gray-700 hover:text-gray-900">Mon profil</a>
            </div>
            <div class="flex items-center p-2 mb-4">
                <span class="mr-2 text-xl">✉️</span>
                <a href="{{ route('client.MesDemandes') }}" class="text-gray-700 hover:text-gray-900">Mes demandes</a>
            </div>
            <div class="flex items-center p-2 mb-4">
                <span class="mr-2 text-xl">↩️</span>
                <a href="{{ route('client.login') }}" class="text-gray-700 hover:text-gray-900">Se déconnecter</a>
            </div>
        </div>

        <div class="flex-1 p-5">
            <h1 class="text-2xl font-bold mb-5 text-gray-900">Gérer mes demandes de services</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($autresDemandes as $demande)
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-toolbox text-lg text-yellow-500 mr-2"></i>
                            <h4 class="text-lg font-semibold">{{ $demande->service->nom }}</h4>
                        </div>
                        <p>{{ $demande->statut }}</p>
                        <small class="block mt-2 mb-4 text-gray-600">Demandée le {{ $demande->created_at->format('d/m/Y') }}</small>
                        <div class="flex space-x-2">
                            <a href="{{ route('demande.show', $demande->id) }}" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Voir</a>
                            <form action="{{ route('demande.destroy', $demande->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <h2 class="text-xl font-bold mt-10 mb-5 text-gray-900">Demandes Terminées</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($demandesTerminees as $demande)
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-toolbox text-lg text-yellow-500 mr-2"></i>
                            <h4 class="text-lg font-semibold">{{ $demande->service->nom }}</h4>
                        </div>
                        <p>{{ $demande->statut }}</p>
                        <small class="block mt-2 mb-4 text-gray-600">Demandée le {{ $demande->created_at->format('d/m/Y') }}</small>
                        @if ($demande->created_at->diffInDays(now()) <= 7)
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="demande_id" value="{{ $demande->id }}">
                                <textarea name="commentaire" required placeholder="Ajoutez un commentaire..." class="mt-2 p-2 w-full bg-gray-200 border border-gray-300 rounded"></textarea>
                                <button type="submit" class="mt-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Commenter</button>
                                <p class="text-xs text-gray-500 mt-2">
                                    Vous pouvez commenter jusqu'au {{ $demande->created_at->addDays(7)->format('d/m/Y') }}.
                                </p></form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
