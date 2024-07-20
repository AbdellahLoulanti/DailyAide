
<x-layout>
    @include('partials._search')
    <style>
        @keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fadeInUp {
    opacity: 0;  /* Start from invisible */
    animation: fadeInUp 0.5s ease-out forwards;
}

    </style>
    
    <a href="/partners-listing" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
    <x-card class="p-10 bg-black" >
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no_image.png')}}" 
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$listing->nom}} {{$listing->nom}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>


                <x-listing-tags :tagsCsv="$listing->domaine_expertise"/>

                    
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->region}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6 flex flex-col items-center">
                        <p>
                            {{$listing->description}}
                        </p>
                    
                        <form action="{{ route('finalize.demande') }}" method="POST" class="flex flex-col items-center">
                            @csrf
                            <input type="hidden" name="partenaire_id" value="{{ $listing->id }}">
                            <button type="submit" class="block bg-laravel text-white mt-6 py-2 px-6 rounded-xl hover:opacity-80">
                                Choisir ce partenaire
                            </button>
                        </form>
                    
                    
                    
                        @php
    $delay = 0;
@endphp

<div class="mt-8 max-w-4xl mx-auto">
    <h3 class="text-2xl font-bold mb-4">Comments</h3>
    @forelse ($comments as $comment)
        <div class="comment bg-white p-4 rounded-lg shadow mb-4 border border-gray-200" data-animate="fadeInUp">
            <p class="text-gray-800 font-serif text-lg leading-relaxed mb-2">{{ $comment->commentaire }}</p>

            <div class="text-sm text-gray-600">
                — <strong>{{ $comment->client->nom ?? 'Anonymous' }}</strong>, 
                <span class="text-gray-500">{{ $comment->date_saisie }}</span>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-800">No comments found.</p>
    @endforelse
</div>


                        
                        
                        {{-- <a
                            href="{{$listing->website}}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        > --}}
                    </div>
                </div>
            </div>
        </x-card>
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add(entry.target.dataset.animate);
                observer.unobserve(entry.target); // Optional: Stop observing once the animation is triggered
            }
        });
    }, {
        threshold: 0.5 // Adjust if needed so the animation starts when half the item is visible
    });

    document.querySelectorAll('.comment').forEach(comment => {
        observer.observe(comment);
    });
});

    </script>
</x-layout>
