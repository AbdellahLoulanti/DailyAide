@props(['listing'])

<x-card>


  <div class="flex">
      <img
          class="hidden w-48 mr-6 md:block"
          src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no_image.png')}}" alt="" />
      <div>
          <h3 class="text-2xl">
              <a href="/partners-listing/{{$listing->id}}">{{$listing->nom}} {{$listing->prenom}}</a>
          </h3>
          <div class="text-xl font-bold mb-4">
              {{$listing->domaine_expertise}}
          </div>
          <x-listing-tags :tagsCsv="$listing->domaine_expertise"/>
          <div class="text-lg mt-4">
              <i class="fa-solid fa-location-dot"></i>
             {{$listing->region}}
          </div>
      </div>
  </div>
</x-card>