<x-layout>
   
    <div class="container mx-auto p-6">
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mt-4 mb-2 shadow-lg">
                DailyAide, <span class="text-laravel">simplifiez le bricolage!</span>
              </h1>
              <p class="text-lg text-gray-600 mt-6">Rejoignez la communauté où le bricolage devient un plaisir partagé.</p>
        </div>

        <div class="flex justify-center space-x-4 mb-10">
            <a href="/client/login" class="bg-laravel text-white px-4 py-2 rounded hover:bg-laravel-600 transition ease-in-out duration-150">
                Demandez un service
            </a>
            <a href="#" class="bg-white text-gray-800 px-4 py-2 rounded hover:bg-gray-800 hover:text-white transition ease-in-out duration-150 border border-gray-800">
                Proposer mes services
            </a>
        </div>
        

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-14">
            <!-- Hardcoded content for each service provider with reviews -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="{{asset('images/plombier.jpeg')}}" alt="Yassin's profile">
                    </div>
                    <div>
                        <div class="text-lg font-medium text-gray-900">Yassin</div>
                        <div class="text-sm text-gray-500">125 avis</div>
                        <div class="text-sm font-semibold text-gray-900">29€/h</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="text-yellow-400">
                        <!-- Sample star ratings -->
                        <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span>
                        <span class="fas fa-star-half-alt"></span>
                        <span class="far fa-star"></span>
                    </div>
                    <div class="text-sm text-gray-600 ml-2">(4.5)</div>
                </div>
                <div class="mt-3">
                    <p class="text-sm text-gray-600">"Travail soigné et professionnel, je recommande fortement Yassin pour vos travaux de plomberie."</p>
                </div>
            </div>

            <!-- Repeat blocks for other service providers -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="{{asset('images/jardinier.jpeg')}}" alt="Yassin's profile">
                    </div>
                    <div>
                        <div class="text-lg font-medium text-gray-900">Reda</div>
                        <div class="text-sm text-gray-500">33 avis</div>
                        <div class="text-sm font-semibold text-gray-900">10€/h</div>
                    </div>
                </div>
                <!-- Additional content for reviews -->
                <div class="flex items-center">
                    <div class="text-yellow-400">
                        <!-- Sample star ratings -->
                        <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span>
                        <span class="far fa-star"></span>
                        <span class="far fa-star"></span>
                    </div>
                    <div class="text-sm text-gray-600 ml-2">(3)</div>
                </div>
                <div class="mt-3">
                    <p class="text-sm text-gray-600">"Déçu par les résultats, le jardin n'a pas été entretenu comme convenu. Je ne peux malheureusement pas recommander"</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{asset('images/logo.png')}}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <!-- ... -->
        </div>
        
    </div>
    <div class="bg-gray-100 py-8 mt-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800">À propos de nous</h2>
            <p class="text-gray-600 mt-4">DailyAide est votre partenaire de confiance pour tous les travaux de bricolage à domicile. Notre équipe de professionnels qualifiés est là pour vous aider à réaliser vos projets de rénovation et d'embellissement.</p>
        </div>
    </div>

   

</x-layout>